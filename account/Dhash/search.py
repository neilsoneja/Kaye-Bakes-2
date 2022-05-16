#! C:\\Users\\Neil\\AppData\\Local\\Microsoft\\WindowsApps\\PythonSoftwareFoundation.Python.3.10_qbz5n2kfra8p0\\python.exe
from helper.hashing import convert_hash
from helper.hashing import dhash
from helper.size import resize
import argparse
import pickle
import time
import cv2
import json

f = open("output.txt", "a")

ap = argparse.ArgumentParser()
ap.add_argument("-t", "--tree",  type=str, default="vptree.pickle",
	help="path to pre-constructed VP-Tree")
ap.add_argument("-a", "--hashes",  type=str, default="hashes.pickle",
	help="path to hashes dictionary")
ap.add_argument("-q", "--query",  type=str, 
	help="path to input query image")
ap.add_argument("-d", "--distance", type=int, default=20,
	help="maximum hamming distance")
args = vars(ap.parse_args())

print(" loading VP-Tree and hashes...")
tree = pickle.loads(open(args["tree"], "rb").read())
hashes = pickle.loads(open(args["hashes"], "rb").read())

#image = cv2.imread(args["query"])
path = r'C:\Users\Drive\Documents\GitHub\Kaye-Bakes-2\account\Dhash\query2.jpg'
image = cv2.imread(path)

#image=resize(image)
#cv2.imshow("Query", image)

queryHash = dhash(image)
queryHash = convert_hash(queryHash)

# search
print(" performing search...")
start = time.time()
results = tree.get_all_in_range(queryHash, args["distance"])
results = sorted(results)
end = time.time()
print(" search took {} seconds".format(end - start))

print (results)

