import time
from telegram import Update, ReplyKeyboardMarkup
from telegram.ext import Updater, MessageHandler, CallbackContext, Filters, CommandHandler

from database import SQLSession

sql_session = SQLSession()


def get_token():
    with open('token.txt') as f:
        token = f.read()
    if token[len(token) - 1] == '\n':
        return token[:len(token) - 1]
    return token


updater = Updater(get_token())

reply_keyboard = [['/subscribe']]
markup = ReplyKeyboardMarkup(reply_keyboard, one_time_keyboard=False, resize_keyboard=True)


def start(update, context):
    update.message.reply_text("Привет!", reply_markup=markup, )


def send_random_cat(update: Update, context: CallbackContext):
    # url = f'https://cataas.com/cat?t=${time.time()}'
    url = f'https://loremflickr.com/320/240/cat,kitty&t=${time.time()}'
    context.bot.send_photo(update.message.chat_id, url)


def send_error(update: Update, context: CallbackContext):
    context.bot.send_message(
        text="There is no such command", chat_id=update.message.chat_id)


def subscribe(update: Update, context: CallbackContext):
    if len(sql_session.exec(f"select * from telegram_data where telegram_id={update.message.chat_id}")) == 0:
        sql_session.exec(
            f"insert into telegram_data values ('{update.message.from_user.first_name}', {update.message.chat_id})")
        context.bot.send_message(
            text="Вы подписались!", chat_id=update.message.chat_id)
    else:
        context.bot.send_message(
            text="Вы уже подписаны!", chat_id=update.message.chat_id)


def main() -> None:
    updater.dispatcher.add_handler(CommandHandler("start", start))
    updater.dispatcher.add_handler(MessageHandler(
        Filters.regex(r"^cat"), send_random_cat))
    updater.dispatcher.add_handler(
        MessageHandler(Filters.regex(r"\d{5}"), send_error))
    updater.dispatcher.add_handler(
        MessageHandler(Filters.command("subscribe"), subscribe))
    updater.dispatcher.add_handler(
        MessageHandler(Filters.text, send_error)
    )
    updater.start_polling()
    print("Started")
    updater.idle()


if __name__ == "__main__":
    main()
