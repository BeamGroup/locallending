import mysql.connector

def password_validate(username, password):
	cnx = mysql.connector.connect(user='root', password='bensommer',
	                              host='localhost',
	                              database='locallending')

	cursor = cnx.cursor()

	query = ("SELECT username, password FROM users WHERE username = %s")
	cursor.execute(query,(username,))
	cnx.commit()
	for (username_in_DB, password_in_DB) in cursor:
		cursor.close()
		cnx.close()
		if username == username_in_DB:
			if password == password_in_DB:
				return True
		return False