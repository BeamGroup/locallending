import mysql.connector

def item_search(keyword,category):
	cnx = mysql.connector.connect(user='root', password='bensommer12',
                              host='127.0.0.1',
                              database='locallending')
	cursor = cnx.cursor()

	query = ("SELECT id, item_name FROM items "
         "WHERE UPPER(item_name) LIKE UPPER(\%%s\%) OR UPPER(description) LIKE UPPER(\%%s\%) OR category LIKE \%%s\%")


	cursor.execute(query, (keyword,keyword,category))

	cnx.commit()

	cursor.close()
	cnx.close()