<?php
//错误转异常示例

//声明错误发生后的处理函数
set_error_handler('MyErrorHandler');
//定义错误处理函数
function MyErrorHandler($errCode, $errMsg, $errFile, $errLine)
{
    throw new ErrorException($errMsg, $errCode, $severity = 2, $errFile, $errLine); //第三个参数为错误级别，用错误代号代替
}
header('content-type:text/html;charset=utf8');
try {
    echo $v1; //未定义变量
} catch (Exception $e) {
    echo "<br>错误号:" . $e->getCode();
    echo "<br>错误信息:" . $e->getMessage();
    echo "<br>所在文件:" . $e->getFile();
    echo "<br>行数:" . $e->getLine();
    echo "<br>错误级别:" . $e->getSeverity();
}
