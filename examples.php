<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Password Hash</h1>
  <?php
  echo '<h2>MD5</h2>';
  echo md5('abc'), '<br>';
  echo md5('abc'), '<br>';
  echo md5('abc'), '<hr>';


  echo '<h2>sha1</h2>';
  echo sha1('abc'), '<br>';
  echo sha1('abc'), '<br>';
  echo sha1('abc'), '<hr>';

  echo '<h2>BCRYPT</h2>';
  echo password_hash('123456', PASSWORD_BCRYPT), '<br>';
  echo password_hash('aA1234', PASSWORD_BCRYPT), '<br>';
  echo password_hash('abc', PASSWORD_BCRYPT), '<hr>';

  $password = '123456';
  $hash = password_hash($password, PASSWORD_BCRYPT);
  echo $hash, '<br>';
  var_dump(password_verify($password, $hash));
  var_dump(password_verify('abc', $hash));

  ?>

  <h2>Server</h2>
  <pre>
  <?php
  var_dump($_SERVER);
  ?>
  </pre>
  <a
    href="https://www.php.net/manual/en/reserved.variables.server">https://www.php.net/manual/en/reserved.variables.server</a>

  <h2>Cookies</h2>
  <?php
  setcookie('cake', 'tastey', time() + 60 * 1);
  echo '<pre>';
  var_dump($_COOKIE);
  echo '</pre>';

  if (isset($_COOKIE['number_of_visits'])) {
    setcookie('number_of_visits', $_COOKIE['number_of_visits'] + 1);
  } else {
    setcookie('number_of_visits', '1');
  }
  echo "Number of Visits: {$_COOKIE['number_of_visits']}";

  ?>

</body>

</html>