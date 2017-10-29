import mysql.connector

def new_user(username, password, email):
	cnx = mysql.connector.connect(user='root', password='bensommer12',
	                              host='http://ww1.bensommer.net',
	                              database='locallending')

	cursor = cnx.cursor()

	query = ("INSERT INTO user (username, password, email) VALUES (%s, %s, %s)")
	cnx.commit()
	cursor.execute(query,(username,password,email))
	cnx.close()
	cursor.close()
