<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
//演示异常处理

//人为抛出:

try {
    echo "<p>行1</p>";
    //抛出异常
    throw new Exception("异常1", 3);
    echo "<p>行2</p>";
} catch (Exception $e) {
    echo "<br/>产生异常!!!";
    echo "<br/>异常代号：" . $e->getCode();
    echo "<br/>异常信息：" . $e->getMessage();

}
echo "<p>行3</p>";

echo '<hr>';
echo '<hr>';

//
$dsn  = 'mysql:host=localhost;port=3306;dbname=php39';
$opt  = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8');
$user = 'root';
$pass = 'root';
$pdo  = new pdo($dsn, $user, $pass, $opt);
//设置PDO使用异常模式
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $sql = "select * froma user_list"; //错误的sql语句
    $pdo->query($sql);
    echo "try中的第三行";
} catch (Exception $e) {
    echo "<br/>产生异常!!!";
    echo "<br/>异常代号：" . $e->getCode();
    echo "<br/>异常信息：" . $e->getMessage();
}
echo "<br>使用pdo以后的语句。";
?>
</body>
</html>