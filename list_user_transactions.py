import mysql.connector

def list_user_transactions(username, user_id):
	cnx = mysql.connector.connect(user='root', password='bensommer12',
                              host='127.0.0.1',
                              database='locallending')
	cursor = cnx.cursor()

	query = ("SELECT item_name, owner_username, borrower_username, transaction_status FROM transactions "
         "WHERE  owner_username = %s OR borrower_username = %s")


	cursor.execute(query, (username,username))

	cnx.commit()

	cursor.close()
	cnx.close()