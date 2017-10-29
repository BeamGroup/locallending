import mysql.connector

def rate(userID, rating_from_user):

	cnx = mysql.connector.connect(user='root', password='bensommer12',
	                              host='http://ww1.bensommer.net',
	                              database='locallending')

	cursor = cnx.cursor()

	query = ("SELECT user_id, average_rating, total_rating_count FROM users WHERE user_id = %s;")
	cursor.execute(query,(userID))
	cnx.commit()
	total_rating_count = 0
	average_rating = 0

	for (user_id, average_rating, total_rating_count) in cursor:
		if(total_rating_count > 0):
			average_rating = float(average_rating)
			total_rating_count = int(total_rating_count)
			total_rating = average_rating * total_rating_count
			total_rating += rating_from_user
			total_rating_count += 1
			average_rating = total_rating / total_rating_count
		else:
			average_rating = rating_from_user
			total_rating_count = 1

	average_rating = round(average_rating,2)

	query = ("UPDATE users SET average_rating = %s, total_rating_count = %s WHERE user_id = %s")
	cursor.execute(query,(average_rating,total_rating_count,user_id))
	cnx.commit()
	cnx.close()
