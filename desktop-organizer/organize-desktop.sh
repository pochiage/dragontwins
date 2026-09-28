#!/bin/bash
# デスクトップ上のファイル・フォルダをすべて指定フォルダへ移動する。
# 移動先に同じ名前のものが既にある場合は、上書きせずデスクトップに残す。
#
# 使い方: organize-desktop.sh [移動先フォルダ]
#   引数を省略した場合は ~/Documents/DesktopArchive に移動する。

DESKTOP="$HOME/Desktop"
DEST="${1:-$HOME/Documents/DesktopArchive}"
LOG="$HOME/Library/Logs/organize-desktop.log"

mkdir -p "$(dirname "$LOG")" "$DEST" || exit 1

log() {
  echo "$(date '+%Y-%m-%d %H:%M:%S') $*" >> "$LOG"
}

if ! ls "$DESKTOP" > /dev/null 2>&1; then
  log "エラー: $DESKTOP を読めません（フルディスクアクセスの許可を確認してください）"
  exit 1
fi

moved=0
skipped=0

log "開始: $DESKTOP -> $DEST"

# 隠しファイル（.DS_Store や .localized など）は対象外
for item in "$DESKTOP"/*; do
  [ -e "$item" ] || continue
  name="$(basename "$item")"

  # 移動先フォルダ自体がデスクトップにある場合は動かさない
  if [ "$item" -ef "$DEST" ]; then
    continue
  fi

  if [ -e "$DEST/$name" ]; then
    log "スキップ（同名あり）: $name"
    skipped=$((skipped + 1))
    continue
  fi

  if mv -n "$item" "$DEST/"; then
    log "移動: $name"
    moved=$((moved + 1))
  else
    log "失敗: $name"
  fi
done

log "完了: 移動 ${moved} 件 / スキップ ${skipped} 件"
