#!/bin/bash
# ダブルクリックでデスクトップ整理を今すぐ実行する。
launchctl kickstart "gui/$(id -u)/com.user.organize-desktop" && \
  echo "デスクトップの整理を実行しました。ログ: ~/Library/Logs/organize-desktop.log"
