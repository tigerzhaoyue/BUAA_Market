<?php
	$database='db_shop';
	$conn=new mysqli('localhost','root');
	//mysqli_select_db("db_shop",$conn) ;
	//mysqli_query("set character set gb2312");
	//mysqli_query("set names gb2312");
	if($conn->connect_error)
		die($conn->connect_error);
	$conn->query("set character set gb2312");
	$conn->query("set names utf8");
	$conn->select_db($database);
?>