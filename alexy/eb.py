import requests
from bs4 import BeautifulSoup
import re

def get_article_text(id):
	# Pretend to be an iPhone by changing the User-Agent header
	headers = {
	    'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3',
	}

	# Download EB article with fake User-Agent
	r = requests.get("http://m.eb.com/topic/" + str(id), headers=headers)

	# Beautify website
	soup = BeautifulSoup(r.text)

	for this_div in soup.find_all("div", class_="article"):
		# Removes table of contents from page
		for tag in this_div.find_all('div', class_="toc"):
			tag.replaceWith("")

		# Removes images and other crap from page
		for tag in this_div.find_all('img'):
			tag.replaceWith("")
		for tag in this_div.find_all('div', class_="mag_image"):
			tag.replaceWith("")
		for tag in this_div.find_all('a', href=re.compile("/assembly/.*")):
			tag.replaceWith("")
		for tag in this_div.find_all('span', class_="caption"):
			tag.replaceWith("")
		for tag in this_div.find_all('span', class_="italicize"):
			tag.replaceWith("")
		for tag in this_div.find_all('p', style="text-indent:0"):
			tag.replaceWith("")
		for tag in this_div.find_all('h1'):
			tag.replaceWith(tag.get_text() + ", ")

		# If we find 'Authors of this article:', assume the article is finished and trim everything after that
		raw_text = this_div.get_text()
		last_start = raw_text.find("Authors of this article:") 
		if not last_start == -1:
			super_raw_text = raw_text[:(len(raw_text) - last_start)* -1]
		else:
			super_raw_text = raw_text
		return super_raw_text

