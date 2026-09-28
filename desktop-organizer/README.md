# デスクトップ自動整理（Mac）

毎週決まった日時に、デスクトップ上のファイル・フォルダをすべて指定フォルダへ移動します。
移動先に同じ名前のものが既にある場合は、上書きせずデスクトップに残します。

## セットアップ

1. このフォルダ（`desktop-organizer`）を Mac にダウンロードする
2. ターミナルでこのフォルダに移動し、移動先フォルダを指定して実行する

   ```bash
   ./install.sh "$HOME/Documents/DesktopArchive"
   ```

3. **フルディスクアクセスを許可する**（これをしないとデスクトップを読めません）
   システム設定 → プライバシーとセキュリティ → フルディスクアクセス → `+` →
   `Cmd+Shift+G` で `/bin/bash` を入力して追加し、オンにする

4. 動作確認（すぐに1回実行する）

   ```bash
   launchctl kickstart gui/$(id -u)/com.user.organize-desktop
   ```

## 設定

- 実行日時：`install.sh` 冒頭の `WEEKDAY` / `HOUR` / `MINUTE`（初期値は毎週月曜 9:00）。変更したら `install.sh` を再実行してください
- Mac がスリープ中だった場合は、起動したときに実行されます
- ログ：`~/Library/Logs/organize-desktop.log`（移動・スキップしたファイルが記録されます）

## 解除

```bash
./uninstall.sh
```
