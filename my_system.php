<?php
$app = require __DIR__ . '/bootstrap/instance.php';
$user = $app->resource->get->uri('app://self/user')->withQuery(['id' => 0])->eager->request();
//var_dump($user); exit;
?>

<!DOCTYPE html>
<head>
    <title>"<?php echo $user['name']; ?>" in my system</title>
</head>
<body>
<?php echo $user; ?>
</body>
</html>
