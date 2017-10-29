import mysql.connector

def new_item(item_name,description,category,owner, holder, owner_id='1'):
	cnx = mysql.connector.connect(user='root', password='bensommer',
                              host='127.0.0.1',
                              database='locallending')
	cursor = cnx.cursor()

	add_item = ("INSERT INTO items "
               "(item_name,description, category,owner_username,holder_username, owner_id)"
               "VALUES (%s, %s, %s, %s, %s, %s)")

	item_data = (item_name,description,category, owner, holder)

	cursor.execute(add_item, item_data)

	cnx.commit()

	cursor.close()
	cnx.close()
