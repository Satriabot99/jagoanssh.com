#!/bin/bash
#limit user max 3 login sshd

PARAM=$1
echo -n > /tmp/pid2
ps ax|grep sshd > /tmp/pid
cat /tmp/pid | grep -i 'sshd -p' > /tmp/pids
cat /var/log/secure |  grep -i "Accepted password for" > /tmp/sks
perl -pi -e 's/Accepted password for//g' /tmp/sks
perl -pi -e 's/sshd//g' /tmp/sks

cat /tmp/pid | while read line;do
set -- $line
p=$1
var=`cat /tmp/sks | grep -i $1`
set -- $var
l=$6
if [ "$6" != '' ]
then
echo "$p $l" | cat - /tmp/pid2 > /tmp/temp && mv /tmp/temp /tmp/pid2
fi
done
	echo -n > /tmp/user1
	echo -n > /tmp/user2
    echo -n > /tmp/user3
	cat /tmp/pid2 | while read line;do
		set -- $line
		p=$1
		u=$2
		cat /tmp/user1 | grep -i $u > /dev/null
		if [ $? = 1 ]; then
			echo $line >> /tmp/user1
		else
		cat /tmp/user2 | grep -i $u > /dev/null
		if [ $? = 1 ]; then
		echo $line >> /tmp/user2
        else
		cat /tmp/user3 | grep -i $u > /dev/null
		if [ $? = 1 ]; then
		echo $line >> /tmp/user3
		else
		kill $p
		echo "kill $p user $u"
		fi
		fi
		fi
	done
	rm -f /tmp/pid
	rm -f /tmp/pid2
	rm -f /tmp/pids
	rm -f /tmp/sks
	rm -f /tmp/user1
	rm -f /tmp/user2
	rm -f /tmp/user3
	exit 0