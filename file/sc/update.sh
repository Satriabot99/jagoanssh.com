#!/bin/bash


# initialisasi var
OS=`uname -p`;

#persiapan
yum groupinstall "Development Tools" -y
sudo yum install perl-core zlib-devel -y
yum -y install glibc-devel kernel-headers kernel-devel gcc gcc-c++ autoconf automake make

cd

# openssl 1.1.1g
wget https://www.openssl.org/source/openssl-1.1.1g.tar.gz
tar -zxf openssl-1.1.1g.tar.gz
cd openssl-1.1.1g
./config
make
make install

#configurasi file
sudo ln -s /usr/local/lib/libssl.so.1.1 /usr/lib/
sudo ln -s /usr/local/lib/libcrypto.so.1.1 /usr/lib/

sudo ln -s /usr/local/bin/openssl /usr/bin/openssl_latest
echo "/usr/local/lib64" > /etc/ld.so.conf.d/openssl.conf
#stunnel 5.56
cd
wget https://www.stunnel.org/downloads/stunnel-5.56.tar.gz
tar -zxf stunnel-5.56.tar.gz
cd stunnel-5.56
./configure
make
make install

#hapus folder
cd
rm -rf openssl-1.1.1g
rm -rf stunnel-5.56



wget -O /etc/stunnel/stunnel.pem "https://raw.githubusercontent.com/95dewadew/ooo/master/cert.pm" && chmod +x /etc/stunnel/stunnel.pem && service stunnel restart


wget -O /usr/bin/tendang "https://raw.githubusercontent.com/95dewadew/ooo/master/tendang" && chmod +x /usr/bin/tendang

wget -O /usr/bin/tendang2 "https://raw.githubusercontent.com/95dewadew/ooo/master/tendang2" && chmod +x /usr/bin/tendang2


sed -i '$ i\* * * * * root /usr/bin/user-limit 2' /etc/crontab
sed -i '$ i\* * * * * root sleep 10; /usr/bin/user-limit 2' /etc/crontab
sed -i '$ i\* * * * * root sleep 20; /usr/bin/user-limit 2' /etc/crontab
sed -i '$ i\* * * * * root sleep 30; /usr/bin/user-limit 2' /etc/crontab
sed -i '$ i\* * * * * root sleep 40; /usr/bin/user-limit 2' /etc/crontab
sed -i '$ i\* * * * * root sleep 50; /usr/bin/user-limit 2' /etc/crontab

sed -i '$ i\2 */12 * * * root /etc/rc.d/rc.local' /etc/crontab

sed -i '$ i\* * * * * root /usr/bin/tendang2' /etc/crontab
sed -i '$ i\* * * * * root sleep 30; /usr/bin/tendang2' /etc/crontab


* * * * * root /usr/bin/user-limit 2
*/5 * * * * root /usr/sbin/vnstat.cron
0 */12 * * * root /usr/bin/userexpire
0 */12 * * * root /usr/bin/delete-user-expire

* * * * * root /usr/bin/user-limit 2
* * * * * root sleep 30; /usr/bin/user-limit 2
* * * * * root service dropbear restart
* * * * * root sleep 30; service dropbear restart
