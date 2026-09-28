#!/bin/bash

# Raycast のスクリプトコマンド。「デスクトップを整理.app」を起動する。
# @raycast.schemaVersion 1
# @raycast.title デスクトップを整理
# @raycast.mode silent
# @raycast.icon 🗂️
# @raycast.packageName Desktop Organizer
# @raycast.description デスクトップのファイルを 書類 > Desktop の今月のフォルダへ移動する

open "$HOME/Applications/デスクトップを整理.app"
