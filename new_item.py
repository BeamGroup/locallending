import mysql.connector

def new_item(item_name,description,owner_id):
	cnx = mysql.connector.connect(user='root', password='bensommer12',
                              host='127.0.0.1',
                              database='locallending')
	cursor = cnx.cursor()

	add_item = ("INSERT INTO items "
               "(item_name, description,owner_id,holder_id )"
               "VALUES (%s, %s, %s, %s)")

	item_data = (item_name,description,owner_id,owner_id)

	cursor.execute(add_item, item_data)

	cnx.commit()

	cursor.close()
	cnx.close()