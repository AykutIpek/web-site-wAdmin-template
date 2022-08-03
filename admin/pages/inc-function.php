<?php
//VT bağlan
header("Content-Type: text/html; charset=utf-8");
//error_reporting(0);
setlocale(LC_ALL, 'tr_TR.UTF-8','tr_TR','tr','turkish');
$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";
try {
    $db = new PDO("mysql:host=$mysqlsunucu;dbname=deneme;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Bağlantı başarılı"; 
    }
catch(PDOException $e)
    {
    echo "Bağlantı hatası: " . $e->getMessage();
    }
$db -> exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");

define("_URL", "http://localhost:8080/udemy/");
?>