from time import sleep
import requests
import json

def reg20gb(auth):
    url = 'https://trxpackages.api.axis.co.id/package/user/claim' #package/buy/v2
    reqhead = {
        "x-app-version": "7.1.1",
        "Authorization": auth,
        "Content-Type": "application/x-www-form-urlencoded",
        "Content-Length": "130",
        "Host": "trxpackages.api.axis.co.id",
        "Connection": "close",
        "Accept-Encoding": "gzip, deflate",
        "User-Agent": "okhttp/3.14.4"}
    reqpay = 'content=eyJyZXB1cmNoYXNlIjpmYWxzZSwic2VydmljZV90eXBlIjoiQU5OSVZFUlNBUlkiLCJzb2NjZCI6Ik1hc3RlciIsInNlcnZpY2VfaWQiOiIzMjEzODg1In0%3D'

    try:
        r = requests.post(url, data=reqpay, headers=reqhead).text
        result = r
        return result
    except:pass


auth =  input("Masukan Kode Auth: ")
print(reg20gb(auth))