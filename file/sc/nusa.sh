#!/bin/bash


# initialisasi var
OS=`uname -p`;

# go to root
cd

# disable se linux
echo 0 > /selinux/enforce
sed -i 's/SELINUX=enforcing/SELINUX=disable/g'  /etc/sysconfig/selinux

# set locale
sed -i 's/AcceptEnv/#AcceptEnv/g' /etc/ssh/sshd_config
service sshd restart

# disable ipv6
echo 1 > /proc/sys/net/ipv6/conf/all/disable_ipv6
sed -i '$ i\echo 1 > /proc/sys/net/ipv6/conf/all/disable_ipv6' /etc/rc.local
sed -i '$ i\echo 1 > /proc/sys/net/ipv6/conf/all/disable_ipv6' /etc/rc.d/rc.local

# install wget and curl
yum -y install wget curl

# setting repo
wget http://dl.fedoraproject.org/pub/epel/6/i386/epel-release-6-8.noarch.rpm
wget http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
rpm -Uvh epel-release-6-8.noarch.rpm
rpm -Uvh remi-release-6.rpm

if [ "$OS" == "x86_64" ]; then
  wget https://raw.githubusercontent.com/95dewadew/ooo/master/app/rpmforge.rpm
  rpm -Uvh rpmforge.rpm
else
  wget https://raw.githubusercontent.com/95dewadew/ooo/master/app/rpmforge.rpm
  rpm -Uvh rpmforge.rpm
fi

sed -i 's/enabled = 1/enabled = 0/g' /etc/yum.repos.d/rpmforge.repo
sed -i -e "/^\[remi\]/,/^\[.*\]/ s|^\(enabled[ \t]*=[ \t]*0\\)|enabled=1|" /etc/yum.repos.d/remi.repo
rm -f *.rpm

# remove unused
yum -y remove sendmail;
yum -y remove httpd;
yum -y remove cyrus-sasl

# update
#yum -y update

# install webserver
yum -y install nginx php-fpm php-cli
service nginx restart
service php-fpm restart
chkconfig nginx on
chkconfig php-fpm on

# install essential package
yum -y install rrdtool screen iftop htop nmap bc nethogs openvpn vnstat ngrep mtr git zsh mrtg unrar rsyslog rkhunter mrtg net-snmp net-snmp-utils expect nano bind-utils
yum -y groupinstall 'Development Tools'
yum -y install cmake
yum -y --enablerepo=rpmforge install axel sslh ptunnel unrar

# matiin exim
service exim stop
chkconfig exim off


# install screenfetch
cd
wget https://raw.githubusercontent.com/95dewadew/ooo/master/app/screenfetch-dev
mv screenfetch-dev /usr/bin/screenfetch
chmod +x /usr/bin/screenfetch
echo "clear" >> .bash_profile
echo "screenfetch" >> .bash_profile

# install webserver
cd
wget -O /etc/nginx/nginx.conf "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/nginx.conf"
sed -i 's/www-data/nginx/g' /etc/nginx/nginx.conf
mkdir -p /home/vps/public_html
echo "<pre><center><img src="http://jagoanssh.com/favicon.png" data-original-height="120" data-original-width="120" height="320" width="320" /></a></center><br><center><font color="red" size="50"> SETUP BY: JUCKY VENGEANCE</b></font></center><center><br><font color="blue" size="50"> WA: 083898587500</b></font></center></pre>" > /home/vps/public_html/index.html
echo "<?php phpinfo(); ?>" > /home/vps/public_html/info.php
rm /etc/nginx/conf.d/*
wget -O /etc/nginx/conf.d/vps.conf "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/vps.conf"
sed -i 's/apache/nginx/g' /etc/php-fpm.d/www.conf
chmod -R +rx /home/vps
service php-fpm restart
service nginx restart

# install openvpn
wget -O /etc/openvpn/openvpn.tar "https://jagoanssh.com/file/sc/openvpn.tar"
cd /etc/openvpn/
tar xf openvpn.tar
wget -O /etc/openvpn/1194.conf "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/1194-centos.conf"
if [ "$OS" == "x86_64" ]; then
  wget -O /etc/openvpn/1194.conf "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/1194-centos64.conf"
fi
wget -O /etc/iptables.up.rules "http://jagoanssh.com/file/sc/iptables.up.rules"
sed -i '$ i\iptables-restore < /etc/iptables.up.rules' /etc/rc.local
sed -i '$ i\iptables-restore < /etc/iptables.up.rules' /etc/rc.d/rc.local
MYIP=`curl icanhazip.com`;
MYIP2="s/xxxxxxxxx/$MYIP/g";
sed -i $MYIP2 /etc/iptables.up.rules;
sed -i 's/venet0/eth0/g' /etc/iptables.up.rules
iptables-restore < /etc/iptables.up.rules
sysctl -w net.ipv4.ip_forward=1
sed -i 's/net.ipv4.ip_forward = 0/net.ipv4.ip_forward = 1/g' /etc/sysctl.conf
service openvpn restart
chkconfig openvpn on
cd

#Create OpenVPN Config
mkdir -p /home/vps/public_html
cat > /home/vps/public_html/1194-client.ovpn <<-END

# create client openvpn
client
dev tun
proto tcp
remote $MYIP 1194  
nobind
tun-mtu 1500
tun-mtu-extra 32
mssfix 1450
persist-key
persist-tun
auth-user-pass
comp-lzo
verb 3
END
echo '<ca>' >> /home/vps/public_html/1194-client.ovpn
cat /etc/openvpn/keys/ca.crt >> /home/vps/public_html/1194-client.ovpn
echo '</ca>' >> /home/vps/public_html/1194-client.ovpn

cp client.tar /home/vps/public_html/
cp 1194-client.ovpn /home/vps/public_html/

# install badvpn
cd
wget -O /usr/bin/badvpn-udpgw "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/badvpn-udpgw"
if [ "$OS" == "x86_64" ]; then
  wget -O /usr/bin/badvpn-udpgw "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/badvpn-udpgw64"
fi
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7000' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7100' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7200' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7300' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7400' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7500' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7600' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7700' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7800' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7900' /etc/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7000' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7100' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7200' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7300' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7400' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7500' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7600' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7700' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7800' /etc/rc.d/rc.local
sed -i '$ i\screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7900' /etc/rc.d/rc.local
chmod +x /usr/bin/badvpn-udpgw
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7000
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7100
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7200
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7300
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7400
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7500
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7600
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7700
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7800
screen -AmdS badvpn badvpn-udpgw --listen-addr 127.0.0.1:7900


# setting port ssh
cd
sed -i '/Port 22/a Port 143' /etc/ssh/sshd_config
sed -i '/Port 143/a Banner /etc/banner.net' /etc/ssh/sshd_config
sed -i 's/#Port 22/Port  22/g' /etc/ssh/sshd_config
service sshd restart
chkconfig sshd on

# install dropbear
yum -y install dropbear
echo "OPTIONS=\"-b /etc/banner.net -p 80 -p 777\"" > /etc/sysconfig/dropbear
echo "/bin/false" >> /etc/shells
wget -O /etc/banner.net "http://jagoanssh.com/file/sc/banner.net"
service dropbear restart
chkconfig dropbear on


# install fail2ban
cd
yum -y install fail2ban
service fail2ban restart
chkconfig fail2ban on

# install squid
yum -y install squid
wget -O /etc/squid/squid.conf "http://jagoanssh.com/file/sc/squid"
sed -i $MYIP2 /etc/squid/squid.conf;
service squid restart
chkconfig squid on

# install webmin
cd
wget http://prdownloads.sourceforge.net/webadmin/webmin-1.710-1.noarch.rpm
rpm -U webmin-1.710-1.noarch.rpm
rm webmin-1.710-1.noarch.rpm
service webmin restart
chkconfig webmin on



# downlaod script
cd /usr/bin
wget -O speedtest "https://raw.githubusercontent.com/95dewadew/ooo/master/speedtest_cli.py"
wget -O bench "https://raw.githubusercontent.com/95dewadew/ooo/master/bench-network.sh"
wget -O mem "https://raw.githubusercontent.com/95dewadew/ooo/master/ps_mem.py"
wget -O userlog "https://raw.githubusercontent.com/95dewadew/ooo/master/login.sh"
wget -O userlogin "https://raw.githubusercontent.com/95dewadew/ooo/master/user-login.sh"
wget -O userexpire "https://raw.githubusercontent.com/95dewadew/ooo/master/autoexpire.sh"
wget -O renew "https://raw.githubusercontent.com/95dewadew/ooo/master/user-renew.sh"
wget -O userlist "https://raw.githubusercontent.com/95dewadew/ooo/master/user-list.sh"
wget -O hapus "https://raw.githubusercontent.com/95dewadew/ooo/master/user-del.sh"
echo "cat log-install.txt" | tee info
echo "python /usr/bin/speedtest.py --share" | tee speedtest
wget -O speedtest "https://raw.githubusercontent.com/95dewadew/ooo/master/speedtest_cli.py"
wget -O user-add "https://raw.githubusercontent.com/95dewadew/ooo/master/uus"
wget -O delete-user-expire "https://raw.githubusercontent.com/bestsshme/centos/master/delete-user-expire"
wget -O user-limit "https://raw.githubusercontent.com/bestsshme/centos/master/user-limit"
wget -O banned-user "https://raw.githubusercontent.com/bestsshme/centos/master/banned-user"
wget -O menu "https://raw.githubusercontent.com/95dewadew/ooo/master/mm"
wget -O tls "https://raw.githubusercontent.com/95dewadew/ooo/master/sl.sh"

# sett permission
chmod +x userlogin
chmod +x userlog
chmod +x userexpire
chmod +x renew
chmod +x userlist
chmod +x speedtest
chmod +x speedtest_cli.py
chmod +x bench
chmod +x mem
chmod +x hapus
chmod +x banned-user
chmod +x delete-user-expire
chmod +x user-limit
chmod +x user-add
chmod +x menu
chmod +x tls

# cron
cd
service crond start
chkconfig crond on
service crond stop
echo "0 */12 * * * root /usr/bin/userexpire" > /etc/cron.d/user-expire

#auto reboot 8 jam
wget -O /root/reboot_otomatis.sh "https://raw.githubusercontent.com/bestsshme/centos/master/rrbt"
chmod +x /root/reboot_otomatis.sh
echo "0 */08 * * * root /root/reboot_otomatis.sh" > /etc/cron.d/reboot_otomatis
service crond restart
service crond start
chkconfig crond on

# set time GMT +7
ln -fs /usr/share/zoneinfo/Asia/Jakarta /etc/localtime

# finalisasi
chown -R nginx:nginx /home/vps/public_html
service nginx start
service php-fpm start
service vnstat restart
service openvpn restart
service sshd restart
service dropbear restart
service fail2ban restart
service squid restart
service webmin restart
service crond start
chkconfig crond on

# info
echo "echo -e "\e[1;33;44m[      script by: JAGOANSSH.COM        ]\e[0m"  | tee -a log-install.txt
echo " #-----------------------------------------------------# "  | tee -a log-install.txt
echo " #                INSTALISASI SELESAI                  # "  | tee -a log-install.txt
echo " #                VPS SIAP DI GUNAKAN                  # "  | tee -a log-install.txt
echo " #              SCRIPT BY JUCKYVENGEANCE               # "  | tee -a log-install.txt
echo " #                                                     # "  | tee -a log-install.txt
echo " #              CENTOS 6 32 BIT & 64 BIT               # "  | tee -a log-install.txt
echo " #=====================================================# "  | tee -a log-install.txt
echo ""  | tee -a log-install.txt
echo "------------------- INFORMASI VPS ----------------------"  | tee -a log-install.txt
echo "--------------------------------------------------------"  | tee -a log-install.txt
echo "Host/Ip  : $MYIP"  | tee -a log-install.txt
echo "SSL /TLS : 443"  | tee -a log-install.txt
echo "OpenSSH  : 22, 143"  | tee -a log-install.txt
echo "Dropbear : 80, 777"  | tee -a log-install.txt
echo "Squid    : 8080, 3128"  | tee -a log-install.txt
echo "OpenVPN  : http://$MYIP:81/1194-client.ovpn)"  | tee -a log-install.txt
echo "Badvpn   : 7300"  | tee -a log-install.txt
echo "Webmin   : http://$MYIP:10000/"  | tee -a log-install.txt
echo "Timezone : Asia/Jakarta"  | tee -a log-install.txt
echo "Fail2Ban : [on]"  | tee -a log-install.txt
echo "IPv6     : [off]"  | tee -a log-install.txt
echo ""  | tee -a log-install.txt

echo "=========================================================="  | tee -a log-install.txt
echo "---------------- Setup By: Jucky vengeance ---------------"  | tee -a log-install.txt

rm aws.sh