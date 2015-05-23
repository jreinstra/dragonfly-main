import requests
from bs4 import BeautifulSoup

# Pretend to be an iPhone by changing the User-Agent header
headers = {
    'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3',
}

# Download EB article with fake User-Agent
r = requests.get("http://m.eb.com/topic/129392/community-ecology", headers=headers)

#print r.text
soup = BeautifulSoup(r.text)

for this_div in soup.find_all("div", class_="article"):
	print(this_div.get_text().encode('ascii', 'ignore'))

