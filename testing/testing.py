import csv
import argparse
from imutils import paths
import cv2

ap = argparse.ArgumentParser()
ap.add_argument("-d", "--dataset",  type=str, default="testing/dataset",
	help="path to dataset directory")
ap.add_argument("-a", "--annotate",  type=str, default="testing/cake_annotated.csv",
	help="path to csv file with annotations of dataset")
ap.add_argument("-q", "--query",  type=str, default="query.jpg",
	help="query image")
args = vars(ap.parse_args())

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

print(imageAnnotate)
