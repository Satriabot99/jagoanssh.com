wget -O /etc/openvpn/openvpn.tar "https://jagoanssh.com/file/sc/openvpn.tar"
cd /etc/openvpn/
tar xf openvpn.tar
wget -O /etc/openvpn/1194.conf "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/1194-centos.conf"
if [ "$OS" == "x86_64" ]; then
  wget -O /etc/openvpn/1194.conf "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/1194-centos64.conf"
fi
wget -O /etc/iptables.up.rules "https://raw.githubusercontent.com/95dewadew/ooo/master/conf/iptables.up.rules"
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