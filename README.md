# vue-xss

Vue.jsでXSSが入りそうな箇所を勉強しました。
新しいのを見つけたら追加していきます。

## 試した環境

- OS：Windows 10
- Vue.js：2.5.17
- PHP：7.2.8
  - ビルトインウェブサーバーを利用してます。
  - `php -S localhost:8080`

## 各ソースの説明

### xss1.html

- `v-html`

### xss2.html

- `v-bind`

### xss3.php

- PHP側（サーバーサイドレンダリング）のケース
- mustache記法

### xss4.php

- PHP側（サーバーサイドレンダリング）のケース
- `domProps > innerHtml`

### xss5.php

- PHP側（サーバーサイドレンダリング）のケース
- Vue.compile

