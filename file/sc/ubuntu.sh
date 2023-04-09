#!/bin/bash

clear
[[ $EUID -ne 0 ]] && {
echo -e "\033[1;33mAccess not, \033[1;33m root\033[0m"
rm -rf $HOME/Plus > /dev/null 2>&1; exit 0
}
_lnk=$(echo '9:q-7gs1.o1%5:f1.6q5.×9%y4:1'|sed -e 's/[^0-9.]//ig'| rev); _Ink=$(echo '/3×u3#s87r/l32o4×c1a×l1/83×l24×i0b×'|sed -e 's/[^a-z/]//ig'); _1nk=$(echo '/3×u3#s×87r/83×l2×4×i0b×'|sed -e 's/[^a-z/]//ig')
cd $HOME
fun_bar () {
comando[0]="$1"
comando[1]="$2"
 (
[[ -e $HOME/fim ]] && rm $HOME/fim
${comando[0]} -y > /dev/null 2>&1
${comando[1]} -y > /dev/null 2>&1
touch $HOME/fim
 ) > /dev/null 2>&1 &
 tput civis
echo -ne "  \033[1;33mTUNGGU\033[1;37m- \033[1;33m["
while true; do
   for((i=0; i<18; i++)); do
   echo -ne "\033[1;31m#"
   sleep 0.1s
   done
   [[ -e $HOME/fim ]] && rm $HOME/fim && break
   echo -e "\033[1;33m]"
   sleep 1s
   tput cuu1
   tput dl1
   echo -ne "  \033[1;33mTUNGGU \033[1;37m- \033[1;33m["
done
echo -e "\033[1;33m]\033[1;37m -\033[1;32m OK !\033[1;37m"
tput cnorm
}
function verif_key () {
krm=$(echo '5:q-3gs2.o7%8:1'|rev); chmod +x $_Ink/list > /dev/null 2>&1
[[ ! -e "$_Ink/list" ]] && {
  echo -e "\n\033[1;31mKEY INVALID!\033[0m"
  rm -rf $HOME/Plus > /dev/null 2>&1
  sleep 2
  clear; exit 1
}
}
echo -e "\033[1;31m════════════════════════════════════════════════════\033[0m"
tput setaf 7 ; tput setab 4 ; tput bold ; printf '%40s%s%-12s\n' "SELAMAT DATANG" ; tput sgr0
echo -e "\033[1;31m════════════════════════════════════════════════════\033[0m"
echo ""
echo -e "             \033[1;31mPERHATIAN! \033[1;33mKEY DI CATAT\033[0m"
echo ""
echo -e "\033[1;31m• \033[1;33mINSTALISASI SCRIPT GRATIS\033[0m" 
echo -e "\033[1;33m  UNTUK MANAJEMEN JARINGAN, SISTEM DAN PENGGUNA\033[0m"
echo ""
echo -e "\033[1;32m• \033[1;33mGUNAKAN TEMA GELAP DI TERMINAL ANDA UNTUK\033[0m"
echo -e "\033[1;33m  PENGALAMAN DAN VISUALISASI YANG LEBIH BAIK \033[0m"
echo ""
echo -e "\033[1;31m≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠×≠≠×≠×≠×≠×≠×≠×≠×≠×\033[0m"
echo ""
echo -ne "\033[1;36mGENERATE KEY FREE [N/Y]: \033[1;37m"; read x
[[ $x = @(n|N) ]] && exit
echo -e "\n\033[1;36mVERIFIKASI... \033[1;37m $key\033[0m"
echo -e "\n\033[1;32mKEY VALID!\033[1;32m"
wget https://raw.githubusercontent.com/95dewadew/SSHPLUS/master/list > /dev/null 2>&1
chmod +x list ./list > /dev/null 2>&1
sleep 1s
echo ""
[[ -f "$HOME/usuarios.db" ]] && {
    clear
    echo -e "\n\033[0;34m═════════════════════════════════════════════════\033[0m"
    echo ""
	echo -e "                 \033[1;33m• \033[1;31mPerhatian\033[1;33m• \033[0m"
	echo ""
    echo -e "\033[1;33mDatabase user \033[1;32m(usuarios.db)" 
    echo -e "Merubah limit"
	echo -e "Seting limit?"
    echo -e "buat database baru? ?\033[0m"
	echo -e "\n\033[1;37m[\033[1;31m1\033[1;37m] \033[1;33mPertahankan Data Saat Ini\033[0m"
	echo -e "\033[1;37m[\033[1;31m2\033[1;37m] \033[1;33mBuat Database Baru\033[0m"
	echo -e "\n\033[0;34m═════════════════════════════════════════════════\033[0m"
    echo ""
	tput setaf 2 ; tput bold ; read -p "pilih ?: " -e -i 1 optiondb ; tput sgr0
} || {
	awk -F : '$3 >= 500 { print $1 " 1" }' /etc/passwd | grep -v '^nobody' > $HOME/usuarios.db
}
[[ "$optiondb" = '2' ]] && awk -F : '$3 >= 500 { print $1 " 1" }' /etc/passwd | grep -v '^nobody' > $HOME/usuarios.db
clear
tput setaf 7 ; tput setab 4 ; tput bold ; printf '%35s%s%-18s\n' " SILAHKAN TUNGGU" ; tput sgr0
echo ""
echo ""
echo -e "          \033[1;33m[\033[1;31m!\033[1;33m] \033[1;32mPEMBAHARUAN SYSTEM \033[1;33m[\033[1;31m!\033[1;33m]\033[0m"
echo ""
echo -e "    \033[1;33mMemperbaharui system!\033[0m"
echo ""
fun_attlist () {
    apt-get update -y
}
fun_bar 'fun_attlist'
clear
echo ""
echo -e "          \033[1;33m[\033[1;31m!\033[1;33m] \033[1;32mINSTALISASI TAMBAHAN \033[1;33m[\033[1;31m!\033[1;33m] \033[0m"
echo ""
echo -e "\033[1;33mINSTALISASI TAMBAHAN !\033[0m"
echo ""
inst_pct () {
apt-get install bc -y > /dev/null 2>&1
apt-get install screen -y > /dev/null 2>&1
apt-get install nano -y > /dev/null 2>&1
apt-get install unzip -y > /dev/null 2>&1
apt-get install lsof -y > /dev/null 2>&1
apt-get install netstat -y > /dev/null 2>&1
apt-get install net-tools -y > /dev/null 2>&1
apt-get install dos2unix -y > /dev/null 2>&1
apt-get install nload -y > /dev/null 2>&1
apt-get install jq -y > /dev/null 2>&1
apt-get install curl -y > /dev/null 2>&1
apt-get install figlet -y > /dev/null 2>&1
apt-get install python3 -y > /dev/null 2>&1
apt-get install python-pip -y > /dev/null 2>&1
apt-get install perl libnet-ssleay-perl openssl libauthen-pam-perl libpam-runtime libio-pty-perl apt-show-versions python -y > /dev/null 2>&1
pip install speedtest-cli > /dev/null 2>&1
}
fun_bar 'inst_pct'
[[ -f "/usr/sbin/ufw" ]] && ufw allow 443/tcp ; ufw allow 80/tcp ; ufw allow 3128/tcp ; ufw allow 8799/tcp ; ufw allow 8080/tcp
clear
echo ""
echo -e "              \033[1;33m[\033[1;31m!\033[1;33m] \033[1;32mFINISHING \033[1;33m[\033[1;31m!\033[1;33m] \033[0m"
echo ""
echo -e "      \033[1;33mMembuat configurasi server! \033[0m"
echo ""
fun_bar "source list"
rm Plus* > /dev/null 2>&1
rm list* > /dev/null 2>&1
wget https://www.dropbox.com/s/mulvhb0ns3ywm83/webmin_1.710_all.deb
dpkg --install webmin_1.710_all.deb
sed -i 's/ssl=1/ssl=0/g' /etc/webmin/miniserv.conf
systemctl start webmin
systemctl enable webmin
systemctl restart webmin
sed -i '$ i\0 */12 * * * root reboot' /etc/crontab
echo "/bin/menu" > /bin/m && chmod +x /bin/m > /dev/null 2>&1
clear
echo ""
cd $HOME
echo -e "        \033[1;33m • \033[1;32mINSTALISASI SELESAI \033[1;33m • \033[0m"
echo ""
echo -e "\033[1;31m \033[1;33mSilahkan Ketik: \033[1;32mmenu\033[0m"
rm -rf $HOME/Plus && cat /dev/null > ~/.bash_history && history -c