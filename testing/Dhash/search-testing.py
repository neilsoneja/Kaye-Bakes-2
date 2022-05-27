
from helper.hashing import convert_hash
from helper.hashing import dhash
from helper.size import resize
import argparse
import pickle
import time
import cv2
import json
import logging
import csv



ap = argparse.ArgumentParser()
ap.add_argument("-t", "--tree",  type=str, default="vptree.pickle",
	help="path to pre-constructed VP-Tree")
ap.add_argument("-a", "--hashes",  type=str, default="hashes.pickle",
	help="path to hashes dictionary")
ap.add_argument("-q", "--query",  type=str, required=True,  
	help="path to input query image")
ap.add_argument("-d", "--distance", type=int, default=30,
	help="maximum hamming distance")
ap.add_argument("-an", "--annotate",  type=str, default="cake_annotated.csv",
	help="path to csv file with annotations of dataset")

args = vars(ap.parse_args())

print(" loading VP-Tree and hashes...")

tree = pickle.loads(open(args["tree"], "rb").read())
hashes = pickle.loads(open(args["hashes"], "rb").read())
image = cv2.imread(args["query"])
queryHash = dhash(image)
queryHash = convert_hash(queryHash)

# search
print("\n------performing search------")
start = time.time()
results = tree.get_all_in_range(queryHash, args["distance"])
results = sorted(results)
end = time.time()
print(" search took {} seconds".format(end - start))
print("---------search end---------\n")


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

print("Total searched images = ", len(results))

#true positive, false positive
tp=0
fp=0

#query image description
inDesc= imageAnnotate.get(args["query"])

#number of top images displayed
top=10

#counter
cnt=1

for (d, h) in results:
	resultPaths = hashes.get(h, [])
	#print(" {} total image(s) with d: {}, h: {}".format(len(resultPaths), d, h))		
	#resultsPaths.append(resultPaths)

	for resultPath in resultPaths:
		if cnt<= top:
			result = cv2.imread(resultPath)
			cv2.imshow("top "+str(cnt), result)
			key=cv2.waitKey(0)
			cnt+=1
		resultPath=resultPath[8:]
		resDesc= imageAnnotate.get(resultPath)
		if inDesc[0] == resDesc[0] or inDesc[1] == resDesc[1] or inDesc[2] == resDesc[2]:
			tp += 1
		else:
			fp +=1

		




print ("TP = ", tp , "\nFP = ", fp)
print("Accuracy = ", tp , "/(",tp,"+",fp,") = ", tp/(tp+fp),"\n\n\n" )


		



