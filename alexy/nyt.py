import requests
from bs4 import BeautifulSoup
import codecs

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

# f = codecs.open("nyt_text.txt", "w", "utf-8")
# f.write(get_article_text("http://www.nytimes.com/2015/05/24/world/europe/ireland-gay-marriage-referendum.html?hp&action=click&pgtype=Homepage&module=span-ab-top-region&region=top-news&WT.nav=top-news"))
# f.close()
