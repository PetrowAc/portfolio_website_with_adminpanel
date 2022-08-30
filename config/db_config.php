<?php
    $db = mysqli_connect('localhost:3306','root','jelszo','dbname'); 
    $db->set_charset('utf8');
    $db->query("SET collation_connection = utf8_czech_ci");
?>