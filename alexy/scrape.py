from google import search
import re
from eb import get_article_text
import requests
from bs4 import BeautifulSoup

def number_of_results(query):
	# Queries Google
	r = requests.get("http://www.google.com/search?hl=en&q=" + query + "&btnG=Google+Search")
	
	# Beautify website
	soup = BeautifulSoup(r.text)

	for this_div in soup.find_all("div", id="resultStats"):
		# Isolates number of results "About 100,000,000 results"
		return int(this_div.get_text().replace("About ","").replace(" results","").replace(",",""))

# This will search Google for Encyclopedia Britannica articles and store them in the database.

for url in search("site:http://www.britannica.com/EBchecked/topic", start=460, pause=10):
	id = re.search("\/topic\/\d*", url).group(0).replace("/topic/","")
	print id
	with open("ids.csv", "a") as myfile:
 		myfile.write(id + ",")

#print get_article_text(ids[0]).encode('ascii', 'ignore')