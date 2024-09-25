import requests

url = ""

cookies = {
    'hdntl': 'exp=1727352523~acl=/*~id=09fbd6f8aa0f4e8c977df1202df0045a~data=hdntl,rqId=61230aea-8a1b-4486-aeb2-f80f9063e89e.1~hmac=062e733836d6c795352c43c105efef9486407b56daf57f611970fa78373c058d'
}

headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0',
}

response = requests.get(url, cookies=cookies, headers=headers)

if response.status_code == 200:
    print("Success!")
    print(response.text) 
else:
    print(f"Failed! Status code: {response.status_code}")
