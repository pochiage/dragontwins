#!/bin/bash
# 毎週デスクトップを整理する LaunchAgent を登録する。
#
# 使い方: ./install.sh [移動先フォルダ]
#   例: ./install.sh "$HOME/Documents/DesktopArchive"
#
# 実行日時は下の WEEKDAY / HOUR / MINUTE で変更できる。
#   WEEKDAY: 0=日 1=月 2=火 3=水 4=木 5=金 6=土

WEEKDAY=1
HOUR=9
MINUTE=0

set -e

DEST="${1:-$HOME/Documents/DesktopArchive}"
LABEL="com.user.organize-desktop"
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
INSTALLED_SCRIPT="$HOME/Library/Scripts/organize-desktop.sh"
PLIST="$HOME/Library/LaunchAgents/$LABEL.plist"

mkdir -p "$HOME/Library/Scripts" "$HOME/Library/LaunchAgents" "$DEST"
cp "$SCRIPT_DIR/organize-desktop.sh" "$INSTALLED_SCRIPT"
chmod +x "$INSTALLED_SCRIPT"

cat > "$PLIST" <<PLIST
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
  <key>Label</key>
  <string>$LABEL</string>
  <key>ProgramArguments</key>
  <array>
    <string>/bin/bash</string>
    <string>$INSTALLED_SCRIPT</string>
    <string>$DEST</string>
  </array>
  <key>StartCalendarInterval</key>
  <dict>
    <key>Weekday</key>
    <integer>$WEEKDAY</integer>
    <key>Hour</key>
    <integer>$HOUR</integer>
    <key>Minute</key>
    <integer>$MINUTE</integer>
  </dict>
</dict>
</plist>
PLIST

# 既に登録済みなら一度外してから登録し直す
launchctl bootout "gui/$(id -u)" "$PLIST" 2>/dev/null || true
launchctl bootstrap "gui/$(id -u)" "$PLIST"

echo "登録しました。"
echo "  移動先: $DEST"
echo "  実行日時: 毎週 曜日=$WEEKDAY $(printf '%02d:%02d' "$HOUR" "$MINUTE")"
echo "  ログ: $HOME/Library/Logs/organize-desktop.log"
echo "今すぐ試すには: launchctl kickstart gui/$(id -u)/$LABEL"
