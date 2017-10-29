import mysql.connector

def new_user(username, password, email):
	cnx = mysql.connector.connect(user='root', password='bensommer',
	                              host='localhost',
	                              database='locallending')

	cursor = cnx.cursor()

	query = ("INSERT INTO users (username, password, email, average_rating, total_rating_count) VALUES (%s, %s, %s, 0, 0)")
	cnx.commit()
	cursor.execute(query,(username,password,email))
	cnx.close()
	cursor.close()
