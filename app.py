from flask import Flask
from flask import render_template

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/login')
def login():
    view = 'login'
    return render_template('signup.html', view=view)

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