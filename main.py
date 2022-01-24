from crypt import methods
import pandas as pd
import mysql.connector
from flask import Flask, render_template, request
from flaskext.mysql import MySQL

app = Flask(__name__)
mysql = MySQL()

app.config['MYSQL_DATABASE_HOST'] = '34.130.124.228'
app.config['MYSQL_DATABASE_USER'] = 'root'
app.config['MYSQL_DATABASE_PASSWORD'] = 'BEdrJMM5qhPK9wiD'
app.config['MYSQL_DATABASE_DB'] = 'inventory'

mysql.init_app(app)


@app.route("/", methods=['GET', 'POST'])
def create_app():

    if request.method == 'GET':
        conn = mysql.connect()
        cursor = conn.cursor()

        cursor.execute("Select * from inventoryList")
        data = cursor.fetchall()
        return render_template('index.html', results=data)



if __name__ == "__main__":
    app.run(debug=True)

    # #### Establish Connetion ####

    # cnx = mysql.connector.connect(user='root', password='BEdrJMM5qhPK9wiD', host='34.130.124.228', database='inventory')
    # print
    # cursor = cnx.cursor()

    # #### Connetion Established ####

    # #### Execute query ####

    # query1 = ("select * from inventoryList")
    # cursor.execute(query1)


    # #### Create dataframe from resultant table ####
    # frame = pd.DataFrame(cursor.fetchall())

    # print(frame.head())