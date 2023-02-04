import time
from database import SQLSession
from telegram import Bot


def get_token():
    with open('token.txt') as f:
        token = f.read()
    if token[len(token) - 1] == '\n':
        return token[:len(token) - 1]
    return token


sql_session = SQLSession()
bot = Bot(get_token())

chat_id = sql_session.exec("select * from telegram_data")


def send_random_cat():
    # url = f'https://cataas.com/cat?t=${time.time()}'
    url = f'https://loremflickr.com/320/240/cat,kitty&t=${time.time()}'
    sql_session.exec(
        r"update count set count=count+1 where name='ping';")
    for id_iter in chat_id:
        bot.send_photo(id_iter[0], url)
        sql_session.exec(
            r"update count set count=count+1 where name='photos_send';")


def main() -> None:
    send_random_cat()


if __name__ == "__main__":
    main()
