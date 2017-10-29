import mysql.connector
import json
def item_search(keyword,category):
	print(keyword)
	cnx = mysql.connector.connect(user='root', password='bensommer',
                              host='localhost',
                              database='locallending')
	cursor = cnx.cursor()

	query = ("SELECT item_name, description, owner_id, holder_id FROM `items` WHERE item_name LIKE '%{}%'".format(keyword))
	print(query)
	
	cursor.execute(query)

	#cnx.commit()
	results = []
	for (item_name, description, owner_id, holder_id) in cursor:
		item = {'item_name': item_name, 'description': description, 'owner_id': owner_id, 'holder_id': holder_id}
		print(item)
		results.append(item)
	#print(json.stringify(cursor.stored_results()))

	#cursor.close()
	cnx.close()
	return results
	#return cursor