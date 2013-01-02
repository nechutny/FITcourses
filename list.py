#!/usr/bin/env python
#
# Stazeni profilu absolovovanych predmetu
import urllib
import urllib2
import re
import os
from xml.dom.minidom import Document


def downloadYear(year):
    path="http://www.fit.vutbr.cz/study/course-l.php.cs?rok=" + year
    f=urllib.urlopen(path)
    list=f.read().split("\n") #replace("\n","").split("tr")
#    print list
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

for x in range(2003,2012):
    courses+=downloadYear(str(x))
    #courses+=downloadYear("2011")
#courses+=downloadYear("2011")

coursesList=dict()
# Nalezeni vsech predmetu
for y,i,c in courses:
    try:
        #if not c in coursesList:
        coursesList[c]+=[(y, i)]
    except KeyError:
        coursesList[c]=[(y, i)]

# Create the minidom document
doc = Document()
# Create the <courses> base element
xcourses = doc.createElement("courses")
doc.appendChild(xcourses)

print "<?php"
print "$courses=array();"
for l in coursesList:
    
    xcourse=doc.createElement("course")
    xcourse.setAttribute("name", l)
    print "$courses[\"%s\"]=array(" % l
    for y,i in coursesList[l]:
        print "array(%s, %s)," % (y,i)
        maincard = doc.createElement("data")
        maincard.setAttribute("year", y)
        maincard.setAttribute("id", i)
        xcourse.appendChild(maincard)
    print ");"
    #maincard = doc.createElement("card")
    #maincard.setAttribute("id", "main")
    #wml.appendChild(maincard)
    xcourses.appendChild(xcourse)
    #print l
    
# Print our newly created XML
#print doc.toprettyxml(indent="  ")
