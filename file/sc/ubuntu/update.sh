#!/bin/bash


apt install build-essential checkinstall zlib1g-dev -y

# openssl 1.1.1g
cd /usr/local/src/
wget https://www.openssl.org/source/openssl-1.1.1g.tar.gz
tar -zxf openssl-1.1.1g.tar.gz
cd openssl-1.1.1g
./config --prefix=/usr/local/ssl --openssldir=/usr/local/ssl shared zlib
make
make install

#configurasi file
cd /etc/ld.so.conf.d/
echo "/usr/local/ssl/lib" >> openssl-1.1.1g.conf
ldconfig -v

mv /usr/bin/c_rehash /usr/bin/c_rehash.backup
mv /usr/bin/openssl /usr/bin/openssl.backup

rm -r /etc/environment
echo 'PATH="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/usr/local/ssl/bin"' >> /etc/environment
cd
source /etc/environment
echo $PATH
which openssl
openssl version
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
rm -rf stunnel-5.56
rm -r stunnel-5.56.tar.gz
rm update.sh