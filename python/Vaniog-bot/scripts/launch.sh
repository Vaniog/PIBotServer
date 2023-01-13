#!/bin/bash

git pull
./scripts/kill.sh
python bot.py &
