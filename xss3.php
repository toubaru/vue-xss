<?php
$name = $_GET['name'] ?? "default";
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
  </head>
<body>
  <div id="app">
    <h1>{{ title }}</h1>
    <div>
      PHP側（サーバーサイドレンダリング）で mustache記法 で出力した時のXSSです
      demoをclickするとXSSが発動します。
    </div>
    <p v-pre>ようこそ <?=htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?> さん（安全な出力？）</p>
    <p>ようこそ <?=htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?> さん（XSS脆弱性あり）</p>
    <p><a href="/xss3.php?name={{%20alert(1)%20}}">demo（本番用の vue.min.js のみで発動）</a></p>
    <p><a href="/xss3.php?name={{%20constructor.constructor(&quot;alert(2)&quot;)()%20}}">demo（本番用の vue.min.js, 開発用の vue.js どちらでも発動）</a></p>
  </div>
  <script>
      new Vue({
        el: '#app',
        data: {
          title: 'Vue.js XSSサンプル 3',
          msg: 'test'
        }
      })
  </script>
</body>
</html>
