from getpass import getpass
from mysql.connector import connect, Error


class SQLSession:
    def get_pass(self):
        with open('../../sql/sql_password.txt') as f:
            token = f.read()
        return token

    def __init__(self) -> None:
        password = self.get_pass()
        self.connection = connect(
            host="localhost",
            user='root',
            password=password,
            database='web_database')
        self.cursor = self.connection.cursor()

    def exec(self, command):
        self.cursor.execute(command)
        to_return = self.cursor.fetchall().copy();
        self.cursor.close()
        self.connection.commit()
        self.connection.reconnect()
        self.cursor = self.connection.cursor()
        return to_return
