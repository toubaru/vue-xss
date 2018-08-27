<?php
$users = array(
  "1" => array("user_name"=>"default"),
  "2" => array("user_name"=>'<img src=. onerror=alert(1)>'),
);

$id = $_GET['id'] ?? "1";
if(!isset($users[$id])) {
  $id = "1";
}

$user = $users[$id];

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
      demoをclickするとXSSが発動します。<br>
      createElement でテンプレートを描画する際に、domProps で innerHTML にタグ文字を渡すと、v-htmlと同様にHTMLをそのまま出力できる。<br>
      どうやったら自然に脆弱性が入るのか謎。<br>
      <a href="https://jp.vuejs.org/v2/guide/render-function.html#%E3%83%87%E3%83%BC%E3%82%BF%E3%82%AA%E3%83%96%E3%82%B8%E3%82%A7%E3%82%AF%E3%83%88%E8%A9%B3%E8%A7%A3" target="_blank">参考</a>

    </div>
    <my-conponent>Hello world!</my-conponent>
    <p><a href="/xss4.php?id=2">demo</a></p>
  </div>
  <script>
    const props = JSON.parse('{"domProps": { "innerHTML": "<?=$user["user_name"] ?> さんのプロフィール" }}')
    let myConponent = Vue.component('my-conponent', {
      render: function (createElement) {
        return createElement(
          'h1', props
        )
      },
    })
    new Vue({
      el: '#app',
      data: {
        title: 'Vue.js XSSサンプル 4'
      },
      components: {
        'my-conponent': myConponent
      }
    })
  </script>
</body>
</html>
