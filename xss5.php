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
  <div id="app"></div>
  <script>
  var res = Vue.compile('<div><h1>{{ title }}</h1><?=$user["user_name"]; ?> さんのプロフィール<br><a href="/xss5.php?id=2">demo</a></div>')
  
  new Vue({
    el: '#app',
    render: res.render,
    data: {
      title: 'Vue.js XSSサンプル 5'
    }
  })
  </script>
</body>
</html>
