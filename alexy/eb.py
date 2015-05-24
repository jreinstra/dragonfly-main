import requests
from bs4 import BeautifulSoup
import codecs
import webbrowser


# Pretend to be an iPhone by changing the User-Agent header
headers = {
    'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3',
}

# Download EB article with fake User-Agent
r = requests.get("http://m.eb.com/topic/129392/community-ecology", headers=headers)

#print r.text
soup = BeautifulSoup(r.text)

f = codecs.open("eb.html", "w", "utf-8")

for this_div in soup.find_all("div", class_="article"):
	# Removes table of contents from page
	for tag in this_div.find_all('div', class_="toc"):
		tag.replaceWith("")

	# Removes images and other crap from page
	for tag in this_div.find_all('img'):
		tag.replaceWith("")
	for tag in this_div.find_all('div', class_="mag_image"):
		tag.replaceWith("")
	for tag in this_div.find_all('a'):
		tag.replaceWith("")
	for tag in this_div.find_all('span', class_="caption"):
		tag.replaceWith("")
	for tag in this_div.find_all('span', class_="italicize"):
		tag.replaceWith("")

	f.write(this_div.prettify())

f.close()
webbrowser.open_new("eb.html")