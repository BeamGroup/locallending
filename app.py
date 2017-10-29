from flask import Flask, render_template, request, url_for, redirect
from list_user_transactions import list_user_transactions
from new_item import new_item
from new_user import new_user
from rating import rate
from search_item import item_search
from password_validate import password_validate
import MySQLdb

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/dashboard')
def dashboard():
    return render_template('dashboard.html')

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
        return redirect(url_for("dashboard"))
    else:
        return render_template('signup.html', view='login', login='failed')

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
    return redirect( url_for("dashboard", user=user) )

@app.route('/search')
def search():
    return render_template('search.html')

@app.route('/results', methods=['POST'])
def results_post():
    query = request.form['query']
    category = request.form['cat']
    result = item_search(query, category)
    return render_template('results.html', results = result)

@app.route('/results')
def results_view():
    print(results)
    return render_template('results.html', results = results)

@app.route('/elements')
def elements():
    return render_template('elements.html')

@app.route('/new_item')
def new_item_get():
    return render_template('new_item.html')

@app.route('/new_item_request', methods=['POST'])
def submit_item_post():
    item = request.form['item-title']
    description = request.form['item-description']
    category = request.form['item-category']
    owner_id = '1'
    new_item(item, description, category, owner_id)
    return redirect( url_for("search") )

@app.route('/trade')
def trade():
    user = request.args.get('user', default='achen8', type = str)
    return render_template('trade.html', user=user)
