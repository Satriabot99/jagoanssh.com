#!/bin/bash
tput setaf 7 ; tput setab 4 ; tput bold ; printf '%35s%s%-18s\n' " AUTO INSTALL SSTP SERVER" ; tput sgr0
echo ""
echo ""
echo -e "          \033[1;33m[\033[1;31m!\033[1;33m] \033[1;32mPEMBAHARUAN SYSTEM \033[1;33m[\033[1;31m!\033[1;33m]\033[0m"
echo ""
echo -e "    \033[1;33mMemperbaharui system!\033[0m"
echo ""
fun_attlist () {
    apt-get update -y
}
clear
echo ""
echo -e "          \033[1;33m[\033[1;31m!\033[1;33m] \033[1;32mINSTALISASI TAMBAHAN \033[1;33m[\033[1;31m!\033[1;33m] \033[0m"
echo ""
echo -e "\033[1;33mINSTALISASI TAMBAHAN !\033[0m"
echo ""
inst_pct () {
apt-get upgrade -y > /dev/null 2>&1
apt-get install python3 > /dev/null 2>&1
apt-get install -y python3-pip > /dev/null 2>&1
apt-get install ppp -y > /dev/null 2>&1
apt-get install lsof -y > /dev/null 2>&1
apt-get install netstat -y > /dev/null 2>&1
apt-get install net-tools -y > /dev/null 2>&1
apt-get install dos2unix -y > /dev/null 2>&1
apt-get install nload -y > /dev/null 2>&1
apt-get install jq -y > /dev/null 2>&1
apt-get install curl -y > /dev/null 2>&1
apt-get install figlet -y > /dev/null 2>&1
pip3 install sstp-server > /dev/null 2>&1
pip3 install git+https://github.com/95dewadew/vps-stpvpn.git > /dev/null 2>&1
apt-get install perl libnet-ssleay-perl openssl libauthen-pam-perl libpam-runtime libio-pty-perl apt-show-versions python -y > /dev/null 2>&1
pip install speedtest-cli > /dev/null 2>&1
}
#install python pip ppp
#apt-get install python3 > /dev/null 2>&1
#apt-get install -y python3-pip > /dev/null 2>&1
#apt-get install ppp > /dev/null 2>&1

#install pip sstp server
#pip3 install sstp-server > /dev/null 2>&1
#pip3 install git+https://github.com/95dewadew/vps-stpvpn.git > /dev/null 2>&1

#seting ppp
cat > /etc/ppp/options.sstpd <<-END
name sstpd
refuse-pap
refuse-chap
refuse-mschap
require-mschap-v2
nologfd
nodefaultroute
ms-dns 8.8.8.8
ms-dns 8.8.4.4
END

#add user
echo "jagoanssh sstpd jagoanssh	*" >> /etc/ppp/chap-secrets > /dev/null 2>&1

#seting service
cat > /etc/sstpd.ini <<-END
[DEFAULT]
# 1 to 50. Default 20, debug 10, verbose 5
;log_level = 20

# OpenSSL cipher suite. See ciphers(1).
;cipher = EECDH+AESGCM:EDH+AESGCM:AES256+EECDH:AES256+EDH

# Path to pppd
;pppd = /usr/bin/pppd

# pppd config file path
;pppd_config = /etc/ppp/options.sstpd

# SSTP port
listen = 0.0.0.0
listen_port = 443

# PEM-format certificate with key.
pem_cert = /root/cert.pem
pem_key = /root/cert.pem

# Address of server side on ppp.
local = 192.168.10.1

# If RADIUS is used to mangle IP pool, comment it out.
remote = 192.168.10.0/24
END

#seting firewall
sysctl -w net.ipv4.ip_forward=1 > /dev/null 2>&1
sed -i 's/net.ipv4.ip_forward = 0/net.ipv4.ip_forward = 1/g' /etc/sysctl.conf > /dev/null 2>&1

iptables -I INPUT -p tcp --dport 443 -m state --state NEW -j ACCEPT > /dev/null 2>&1
iptables -I INPUT -p gre -j ACCEPT > /dev/null 2>&1
iptables -t nat -I POSTROUTING -o eth0 -j MASQUERADE > /dev/null 2>&1
iptables -I FORWARD -p tcp --tcp-flags SYN,RST SYN -s 192.168.10.0/24 -j TCPMSS  --clamp-mss-to-pmtu > /dev/null 2>&1

#service auto run on boot

cat > /etc/systemd/system/sstpd.service <<-END
[Unit]
Description=SSTP VPN server
After=network.target

[Service]
Type=simple
ExecStart=/usr/local/bin/sstpd -f /etc/sstpd.ini
ExecStartPost=/sbin/iptables -I INPUT -p tcp --dport 443 -m state --state NEW -j ACCEPT
ExecStartPost=/sbin/iptables -I INPUT -p gre -j ACCEPT
ExecStartPost=/sbin/iptables -I POSTROUTING -t nat -o eth0 -j MASQUERADE
ExecStartPost=/sbin/iptables -I FORWARD -p tcp --tcp-flags SYN,RST SYN -s 192.168.10.0/24 -j TCPMSS  --clamp-mss-to-pmtu
ExecStopPost=/sbin/iptables -D INPUT -p tcp --dport 443 -m state --state NEW -j ACCEPT
ExecStopPost=/sbin/iptables -D INPUT -p gre -j ACCEPT
ExecStopPost=/sbin/iptables -D POSTROUTING -t nat -o eth0 -j MASQUERADE
ExecStopPost=/sbin/iptables -D FORWARD -p tcp --tcp-flags SYN,RST SYN -s 192.168.10.0/24 -j TCPMSS  --clamp-mss-to-pmtu
Restart=on-failure
RestartSec=30

[Install]
WantedBy=multi-user.target
END

#restart service
wget -O /usr/bin/sstp https://raw.githubusercontent.com/95dewadew/SSHPLUS/master/pp/add-pp > /dev/null 2>&1
chmod +x /usr/bin/sstp > /dev/null 2>&1
wget -O /root/cert.pem https://raw.githubusercontent.com/95dewadew/ooo/master/cert.pm > /dev/null 2>&1
wget -O /usr/bin/sstp-user https://raw.githubusercontent.com/95dewadew/SSHPLUS/master/pp/all-pp > /dev/null 2>&1
chmod +x /usr/bin/sstp-user > /dev/null 2>&1
wget -O /usr/bin/sstp-expired https://raw.githubusercontent.com/95dewadew/SSHPLUS/master/pp/exp-pp > /dev/null 2>&1
chmod +x /usr/bin/sstp-expired > /dev/null 2>&1
wget -O /usr/bin/sstp-delete https://raw.githubusercontent.com/95dewadew/SSHPLUS/master/pp/del-pp > /dev/null 2>&1
chmod +x /usr/bin/sstp-delete > /dev/null 2>&1
systemctl enable sstpd.service > /dev/null 2>&1
systemctl start sstpd.service > /dev/null 2>&1
systemctl restart sstpd.service > /dev/null 2>&1
clear
echo ""
cd
echo -e "        \033[1;33m • \033[1;32mINSTALISASI SELESAI \033[1;33m • \033[0m"
echo ""
echo -e "\033[1;31m \033[1;33mSilahkan Ketik: \033[1;32msstp unutk membuat akun\033[0m"
rm -rf sstp.sh && cat /dev/null > ~/.bash_history && history -c
rm -rf sstp.sh