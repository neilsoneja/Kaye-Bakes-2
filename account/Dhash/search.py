
from helper.hashing import convert_hash
from helper.hashing import dhash
from helper.size import resize
import argparse
import pickle
import time
import cv2
import json
import logging

logging.basicConfig(filename='search.log', encoding='utf-8', level=logging.INFO, filemode='w')

try:
	logging.info("---------search start---------")


	ap = argparse.ArgumentParser()
	ap.add_argument("-t", "--tree",  type=str, default="vptree.pickle",
		help="path to pre-constructed VP-Tree")
	ap.add_argument("-a", "--hashes",  type=str, default="hashes.pickle",
		help="path to hashes dictionary")
	ap.add_argument("-q", "--query",  type=str, required=True,  
		help="path to input query image")
	ap.add_argument("-d", "--distance", type=int, default=30,
		help="maximum hamming distance")
	args = vars(ap.parse_args())

	logging.info(" loading VP-Tree and hashes...")
	
	tree = pickle.loads(open(args["tree"], "rb").read())
	hashes = pickle.loads(open(args["hashes"], "rb").read())

	image = cv2.imread(args["query"])

	queryHash = dhash(image)
	queryHash = convert_hash(queryHash)

	# search
	logging.info(" performing search...")
	start = time.time()
	results = tree.get_all_in_range(queryHash, args["distance"])
	results = sorted(results)
	end = time.time()
	logging.info(" search took {} seconds".format(end - start))
	logging.info("---------search end---------")

	#resultsPaths = []
	
	for (d, h) in results:
		resultPaths = hashes.get(h, [])
		logging.info(" {} total image(s) with d: {}, h: {}".format(
			len(resultPaths), d, h))
			
		#resultsPaths.append(resultPaths)
		for resultPath in resultPaths:
			resultSplit=resultPath.split("@")
			resultPath=resultSplit[1]
			resultPath=resultPath[1:]
			print (resultPath)

	

except Exception as e:

    logging.critical(e, exc_info=True) 
