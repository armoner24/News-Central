import urllib2
from bs4 import BeautifulSoup
url="https://news.google.com/topics/CAAqJggKIiBDQkFTRWdvSUwyMHZNRGx1YlY4U0FtVnVHZ0pKVGlnQVAB?hl=en-IN&gl=IN&ceid=IN%3Aen"
page=urllib2.urlopen(url)
soup=BeautifulSoup(page, 'html.parser')
headlines=[]
null=0
material=soup.find_all("span")
for content in material:
	headline=content
	string=str(content)
	if ('aria-hidden=') and ('class=') not in string:
		for news in headline:
			try:
				headlines.append(news)
			except:
				UnicodeEncodeError,UnicodeDecodeError,UnicodeTranslateError
file=open("news.txt", "w")
count=1
for headline in headlines:
	try:
		headline=headline.encode("utf-8")
		file.write(str(count)+'. '+headline+'\n')
	except:
		UnicodeEncodeError,UnicodeDecodeError,UnicodeTranslateError
	count+=1
file.close()





