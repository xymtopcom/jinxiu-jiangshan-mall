<?php
$servername = "47.93.138.14";
$username = "jxjs";
$password = "123456";
$dbname = "jxjs";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

