from eb import get_article_text
import pyprind
import codecs
import urllib

f = open("the ids.txt", "r")
ids = f.read().split("\n")
f.close()

print str(len(ids)) + " article IDs loaded"

f = codecs.open("articles.csv", "w", "utf-8")


for i in pyprind.prog_bar(range(len(ids))):
	f.write(ids[i] + ',"' + urllib.quote(get_article_text(ids[i]).encode('utf8')) + '"')
	f.write("\n")
	pass

f.close()