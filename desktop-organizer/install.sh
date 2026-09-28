#!/bin/bash
# 毎週デスクトップを整理するアプリと LaunchAgent を登録する（管理者権限は不要）。
#
# 使い方: bash install.sh [移動先フォルダ]
#   例: bash install.sh "$HOME/Documents/Desktop"
#
# 実行日時は下の WEEKDAY / HOUR / MINUTE で変更できる。
#   WEEKDAY: 0=日 1=月 2=火 3=水 4=木 5=金 6=土
#
# 整理は ~/Applications/デスクトップを整理.app が行う。初回実行時に macOS が
# 「デスクトップ」「書類」フォルダへのアクセス許可を求めるので「許可」を押す。

WEEKDAY=1
HOUR=9
MINUTE=0

set -e

DEST="${1:-$HOME/Documents/Desktop}"
LABEL="com.user.organize-desktop"
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
INSTALLED_SCRIPT="$HOME/Library/Scripts/organize-desktop.sh"
PLIST="$HOME/Library/LaunchAgents/$LABEL.plist"
APP="$HOME/Applications/デスクトップを整理.app"

mkdir -p "$HOME/Library/Scripts" "$HOME/Library/LaunchAgents" "$HOME/Applications" "$DEST"
cp "$SCRIPT_DIR/organize-desktop.sh" "$INSTALLED_SCRIPT"
chmod +x "$INSTALLED_SCRIPT"

# 旧バージョンの手動実行ファイルを削除
rm -f "$HOME/Applications/デスクトップを整理.command"

# 整理スクリプトを呼び出すアプリを作る。アプリ経由にすることで、フルディスク
# アクセス（管理者権限が必要）ではなく、フォルダごとのアクセス許可で動かせる。
rm -rf "$APP"
osacompile -o "$APP" <<APPLESCRIPT
try
  set result to do shell script "/bin/bash " & quoted form of "$INSTALLED_SCRIPT" & " " & quoted form of "$DEST"
  -- 自作アプリの通知は macOS に表示されないことがあるため、10 秒で閉じるダイアログで結果を出す
  set answer to display dialog result buttons {"フォルダを開く", "OK"} default button "OK" giving up after 10 with title "デスクトップを整理"
  if button returned of answer is "フォルダを開く" then
    do shell script "open " & quoted form of "$DEST"
  end if
on error errMsg
  display dialog "デスクトップの整理に失敗しました。" & return & return & errMsg buttons {"OK"} default button 1 with icon caution with title "デスクトップを整理"
end try
APPLESCRIPT

cat > "$PLIST" <<PLIST
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
  <key>Label</key>
  <string>$LABEL</string>
  <key>ProgramArguments</key>
  <array>
    <string>/usr/bin/open</string>
    <string>-g</string>
    <string>$APP</string>
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
echo "手動で実行するには: $APP をダブルクリック"
echo "※ 初回はアクセス許可のダイアログが出るので「許可」を押してください。"
