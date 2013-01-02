#!/usr/bin/env python
#
# Stazeni profilu absolovovanych predmetu, data jsou exportovana do pole pro PHP
import urllib
import urllib2
import re
import os


def downloadYear(year):
    """ Stazeni celeho roku """
    path="http://www.fit.vutbr.cz/study/course-l.php.cs?rok=" + year
    f=urllib.urlopen(path)
    list=f.read().split("\n") #replace("\n","").split("tr")
    courses=[]
    # nalezeni seznamu predmetu
    for line in list:
        #m=re.search(r"<a href=\"[^\"0-9]*([0-9]+)\".*<b>([A-Z]+[0-9]*)</b>",line, re.DOTALL)
        m=re.search(r"<a\s*href=\"[^\"0-9]*([0-9]+)\".*<b>(.*)</b>",line, re.DOTALL)
        if m:
            courses += [(year, m.group(1),m.group(2))]
        else:
            pass
#            print line
    return courses

courses=[]

for x in range(2003,2013):
    courses+=downloadYear(str(x))

coursesList=dict()
# Nalezeni vsech predmetu
for y,i,c in courses:
    try:
        coursesList[c]+=[(y, i)]
    except KeyError:
        coursesList[c]=[(y, i)]

print "<?php"
print "$courses=array();"
for l in coursesList:
    print "$courses[\"%s\"]=array(" % l
    for y,i in coursesList[l]:
        print "array(%s, %s)," % (y,i)
    print ");"
    
