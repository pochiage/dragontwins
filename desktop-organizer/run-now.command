#!/bin/bash
# ダブルクリックでデスクトップ整理を今すぐ実行し、結果（ログ）を表示する。
LOG="$HOME/Library/Logs/organize-desktop.log"

launchctl kickstart "gui/$(id -u)/com.user.organize-desktop" || exit 1
sleep 3

echo "----- 実行結果（ログの最後の部分） -----"
if [ -f "$LOG" ]; then
  tail -n 15 "$LOG"
else
  echo "ログがありません。スクリプトが起動できていない可能性があります。"
fi
