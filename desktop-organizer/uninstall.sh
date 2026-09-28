#!/bin/bash
# install.sh で登録した LaunchAgent を解除する（移動済みのファイルはそのまま）。

LABEL="com.user.organize-desktop"
PLIST="$HOME/Library/LaunchAgents/$LABEL.plist"

launchctl bootout "gui/$(id -u)" "$PLIST" 2>/dev/null
rm -f "$PLIST" "$HOME/Library/Scripts/organize-desktop.sh" "$HOME/Applications/デスクトップを整理.command"
rm -rf "$HOME/Applications/デスクトップを整理.app"
echo "解除しました。"
