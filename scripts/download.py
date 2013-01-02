#!/usr/bin/env python
#
# Stazeni vsech obrazku roku do slozky
import urllib
import urllib2
import re
import os

path = "https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id="

def downloadYear(year):
    """ Stazeni celeho roku """
    path = "http://www.fit.vutbr.cz/study/course-l.php.cs?rok=" + year
    f = urllib.urlopen(path)
    list = f.read().split("\n") #replace("\n","").split("tr")
    courses = []
    # nalezeni seznamu predmetu
    for line in list:
        m = re.search(r"<a\s*href=\"[^\"0-9]*([0-9]+)\".*<b>(.*)</b>",line, re.DOTALL)
        if m:
            courses += [(year, m.group(1),m.group(2))]
        else:
            pass
    return courses

def download(url, local):
    """Copy the contents of a file from a given URL
    to a local file.
    """
    webFile = urllib.urlopen(url)
    localFile = open(local, 'w')
    localFile.write(webFile.read())
    webFile.close()
    localFile.close()

year=raw_input("Zadejte rok pro stazeni: ")

# Vytvoreni slozky pro rok
try:
    os.mkdir(year)
except:
    pass


courses = []
courses += downloadYear(year)

coursesList = dict()
# Nalezeni vsech predmetu
for y, i, c in courses:
    print "Stahuji predmet %s" % c
    download(path + i, "%s/%s.png" % (y, c))
    
