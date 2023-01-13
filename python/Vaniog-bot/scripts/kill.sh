kill $(ps ax | grep 'bot.py' | grep -v grep | awk '{print $1}')
