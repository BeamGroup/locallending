from flask import Flask, render_template, jsonify, request
from list_user_transactions import list_user_transactions
from new_item import new_item
from new_user import new_user
from rating import rate
from search_item import item_search

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/login')
def login():
    view = 'login'
    return render_template('signup.html', view=view)

@app.route('/search', methods=['POST'])
def signup_post():
    user = request.form['username']
    password = request.form['password']
    email = request.form['email']
    new_user(user, password, email)
    return

@app.route('/signup')
def signup():
    view = 'signup'
    return render_template('signup.html', view=view)

@app.route('/search')
def search():
    return render_template('search.html')

@app.route('/results')
def results():
    return render_template('results.html')