import time
from telegram import Update
from telegram.ext import Updater, MessageHandler, CallbackContext, Filters


def get_token():
    with open('token.txt') as f:
        token = f.read()
    if token[len(token) - 1] == '\n':
        return token[:len(token) - 1]
    return token

updater = Updater(get_token())


def send_random_cat(update: Update, context: CallbackContext):
    url = f'https://cataas.com/cat?t=${time.time()}'
    context.bot.send_photo(update.message.chat_id, url)


def send_error(update: Update, context: CallbackContext):
    context.bot.send_message(text="There is no such command", chat_id=update.message.chat_id)


def main() -> None:
    updater.dispatcher.add_handler(MessageHandler(Filters.regex(r"^cat"), send_random_cat))
    updater.dispatcher.add_handler(MessageHandler(Filters.update.message, send_error))
    updater.start_polling()
    print("Started")
    updater.idle()


if __name__ == "__main__":
    main()
