sed -i '/ "alterId": 233}/a { "id": "e2e1641d-ce04-42f5-93ef-7199f8afa7b5", ' /etc/v2ray/config.json


 sed -i 's;233};233},\n{\n"id": "b831381d-6324-4d53-ad4f-8cda48b30811",\n"Level": 2,\n"alterId": 233};g' /etc/v2ray/config.json >

sed -i 's/alterId": 233}/alterId": 233},/g' /etc/v2ray/config.json


sed -i '/ "e2e1641d-ce04-42f5-93ef-7199f8afa7b5",/a "alterId": 233} ' /etc/v2ray/config.json

sed -i '/ "level": 2,/a "alterId": 233}' /etc/v2ray/config.json

 level": 2, "alterId": 233 }'