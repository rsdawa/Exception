<?php
//自定义异常类

//年龄错误异常类
class AgeException extends Exception
{
    public function __construct($msg, $code = 0)
    {
        parent::__construct($msg, $code);
    }
}
class GetAgeException extends Exception
{
    public function __construct($msg, $code = 0)
    {
        parent::__construct($msg, $code);
    }
}
header('content-type:text/html;charset=utf8');
try {
    if (empty($_GET['age'])) {
        throw new GetAgeException('年龄参数为空！', 111); //抛出参数异常
    }
    $age = $_GET['age']; //获得一个年龄信息
    if ($age < 18 || $age > 30) {
        throw new AgeException('不符合参军年龄！', 999); //抛出年龄异常
    }
    echo "恭喜，您的年龄适合参军!";
}
//    catch (AgeException $e) {
//     //捕获年龄异常
//     echo "<br/>产生年龄异常!!!";
//     echo "</br>异常代号：" . $e->getCode();
//     echo "</br>异常信息：" . $e->getMessage();
// }
//    catch (GetAgeException $e) {
//     //捕获参数异常
//     echo "<br/>产生年龄参数异常!!!";
//     echo "</br>异常代号：" . $e->getCode();
//     echo "</br>异常信息：" . $e->getMessage();
// }

 catch (Exception $e) {
    //使用父类变量，可以捕获任何一个子类的异常
    if ($e->getCode() == 111) {
        echo "<br/>产生参数异常!!!";
    } else if ($e->getCode() == 999) {
        echo "<br/>产生年龄异常!!!";
    }

    echo "</br>异常代号：" . $e->getCode();
    echo "</br>异常信息：" . $e->getMessage();
}
