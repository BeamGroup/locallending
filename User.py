from flask_login import UserMixin

class User(UserMixin):
  def __init__(self, user='', password='', email=''):
    super()
    self.first_name = ''
    self.last_name = ''
    self.username = user
    self.email = email
    self.password = password
    self.rating = 0
    self.ratings_count = 0
    self.is_logged_in = False
    self.is_active = False