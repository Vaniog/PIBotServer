import time
import json
from telegram import Bot

chat_id = [1264063325, 870732774, 5100400358, 1352366907]
# chat_id = [870732774]


def get_token():
    with open('token.txt') as f:
        token = f.read()
    if token[len(token) - 1] == '\n':
        return token[:len(token) - 1]
    return token


bot = Bot(get_token())
with open("data.json") as f:
    data = json.load(f)


def send_random_cat():
    url = f'https://cataas.com/cat?t=${time.time()}'
    data['pressed'] += 1
    for id_iter in chat_id:
        bot.send_photo(id_iter, url)
        data['photos_send'] += 1


def main() -> None:
    send_random_cat()
    with open('data.json', 'w') as f:
        json.dump(data, f)


if __name__ == "__main__":
    main()
