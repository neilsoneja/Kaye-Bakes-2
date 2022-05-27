# upload an image and search for it
# display the best match and its location
# also display 9 similar images

# python3 search.py -u uploads/img.jpg
# python3 search.py -u uploads/img.jpg -i index.csv

# -u = path to the image you want to upload
# -i = path to the csv index containing all feature vectors

from colordescriptor import ColorDescriptor
from searcher import Searcher
from imutils import build_montages
import argparse
import cv2
import csv

ap = argparse.ArgumentParser()
ap.add_argument("-i", "--index", type=str, default="index.csv")
ap.add_argument("-u", "--upload", required = True)
ap.add_argument("-an", "--annotate",  type=str, default="cake_annotated.csv")
args = vars(ap.parse_args())

cd = ColorDescriptor((8, 12, 3))
upload = cv2.imread(args["upload"])
features = cd.describe(upload)
searcher = Searcher(args["index"])
results = searcher.search(features)


print("Total searched images = ", len(results)) 


#reading csv file
imageAnnotate = {}
file = open(args["annotate"]) 
csvreader = csv.reader(file)
header = next(csvreader)
for row in csvreader:
    l = imageAnnotate.get(row[0], [])
    l.extend([row[1],row[2],row[3]])
    imageAnnotate[row[0]] = l
file.close()

#true positive, false positive
tp=0
fp=0

#query image description
inDesc= imageAnnotate.get(args["upload"])

#number of top images displayed
top=10

#counter
cnt=1

locs = []
similars = []
for (score, resultID) in results:
	print(resultID)
	result = cv2.imread(resultID)
	if cnt<= top:
			cv2.imshow("top "+str(cnt), result)
			key=cv2.waitKey(0)
			cnt+=1
	similars.append(result)
	locs.append(resultID)
	print(resultID, " / ", score)
	resultID=resultID[8:]
	resDesc= imageAnnotate.get(resultID)
	if inDesc[0] == resDesc[0] or inDesc[1] == resDesc[1] or inDesc[2] == resDesc[2]:
		tp += 1
	else:
		fp +=1


print ("TP = ", tp , "\nFP = ", fp)
print("Accuracy = ", tp , "/(",tp,"+",fp,") = ", tp/(tp+fp),"\n\n\n" )




