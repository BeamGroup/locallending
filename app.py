from flask import Flask, render_template, jsonify, request, url_for, redirect
from list_user_transactions import list_user_transactions
from new_item import new_item
from new_user import new_user
from rating import rate
from search_item import item_search
from password_validate import password_validate

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/login')
def login():
    view = 'login'
    return render_template('signup.html', view=view)

@app.route('/login', methods=['POST'])
def login_post():
    user = request.form['username']
    password = request.form['password']
    logged_in = password_validate(user, password)
    if (logged_in):
        return redirect(url_for(search, user=user))
    else:
        return redirect(url_for(search, user='user'))

@app.route('/signup')
def signup():
    view = 'signup'
    return render_template('signup.html', view=view)

@app.route('/signup', methods=['POST'])
def signup_post():
    user = request.form['username']
    password = request.form['password']
    email = request.form['email']
    new_user(user, password, email)
    return render_template('redirectToSearch.html')

@app.route('/search')
def search():
    return render_template('search.html')

@app.route('/search', methods=['POST'])
def search_post():
    query = request.form['query']
    category = request.form['cat']
    results = item_search(query, category)
    print(results)
    return redirect(url_for(results, results=results))

@app.route('/results')
def results():
    return render_template('results.html')

@app.route('/elements')
def elements():
    return render_template('elements.html')

@app.route('/new_item')
def new_item_get():
    return render_template('new_item.html')

@app.route('/new_item', methods=['POST'])
def submit_item_post():
    user = request.form['item-name']
    password = request.form['description']
    email = request.form['owner-id']
    new_item(user, password, email)
    return render_template('redirectToSearch.html')
