#bin/bash
if [ -e "/var/lib/premium-script" ]; then
		echo "continue..."
		clear
	else
		mkdir /var/lib/premium-script;
fi
read -p "Masukkan Username : " username
grep -E "^$username" /etc/ppp/chap-secrets >/dev/null
if [ $? -eq 0 ]; then
echo "Username sudah ada di VPS anda"
exit 0
else
read -p "Masukkan Password : " password
read -p "Masukkan Lama Masa Aktif Account(Hari): " masa_aktif

today=`date +%s`
masa_aktif_detik=$(( $masa_aktif * 86400 ))
saat_expired=$(($today + $masa_aktif_detik))
tanggal_expired=$(date -u --date="1970-01-01 $saat_expired sec GMT" +%Y/%m/%d)
tanggal_expired_display=$(date -u --date="1970-01-01 $saat_expired sec GMT" '+%d %B %Y')
clear
echo "Connecting to jagoanssh.com..."
sleep 0.5
echo "Creating Account..."
sleep 0.2
echo "Generating Host..."
sleep 0.2
echo "Creating Your New Username: $username"
sleep 0.2
echo "Creating Password for $username"
sleep 0.3
MYIP=$(wget -qO- ipv4.icanhazip.com)
echo "$username	*	$password	*" >> /etc/ppp/chap-secrets
echo "$username *   $password   *  $saat_expired"  >> /var/lib/premium-script/data-user-pptp
  clear
  echo ""
  echo " =============== SUCCESS =============== "
  echo "      Detail Account Yang Telah Dibuat   "
  echo "-----------------------------------------"
  echo "   Host            : $MYIP"
  echo "   Username        : $username"
  echo "   Password        : $password"
  echo "   Expired         : $tanggal_expired_display"
  echo "-----------------------------------------"
  echo " "
fi