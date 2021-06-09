<?php
	$host = 'sql113.epizy.com';
    $dbname = 'epiz_27717215_w448';
    $username = 'epiz_27717215';
    $password = 'Internet2020';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>