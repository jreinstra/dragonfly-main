from google import search
import re
from eb import get_article_text

# This will search Google for Encyclopedia Britannica articles and store them in the database.

ids = []

for url in search("site:http://www.britannica.com/EBchecked/topic", stop=10):
    ids.append(re.search("\/topic\/\d*", url).group(0).replace("/topic/",""))

#print get_article_text(ids[0]).encode('ascii', 'ignore')