from google import search
for url in search('"Breaking Code" WordPress blog', stop=20):
    print(url)
    