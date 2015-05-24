import requests
from bs4 import BeautifulSoup

def get_article_text(url):
	article_text = ""

	# Downloads website
	r = requests.get(url)

	# Beautify website
	soup = BeautifulSoup(r.text)

	# Search through soup for all paragraphs with the class = "story-body-text story-content"
	for this_div in soup.find_all("p", class_="story-body-text story-content"):
		# Adds paragraph to variable
		article_text += this_div.get_text() + '\n\n'

	return article_text