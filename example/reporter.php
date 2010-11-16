<?php

$host = "localhost";
$user = "root";
$pw = "1a1a1a";
$database = "blocker";

$db = mysql_connect($host, $user, $pw)
        or die("Cannot connect to mySQL.");

mysql_select_db($database, $db)
        or die("Cannot connect to database.");

//let's consider that we are blocking the person who 'accidentially' accesses this page

$ip = ip2long($_SERVER['REMOTE_ADDR']); //we are always using decimals for ips
$reporterip = ip2long($_SERVER['SERVER_ADDR']);

//now let's decide how new entries will be inserted. the simplest option is to
//add only ips which have not been there before. this will save us from floods with the same ips / comments.
//The alternative is to insert a comment for any new accident

$command = "SELECT * FROM ips WHERE ip=".mysql_real_escape_string($ip).")";
$result = mysql_query($command);
if (!$result) {
    $command = 'INSERT INTO ips(ip) values(' . mysql_real_escape_string($ip) . ')';
    $result = mysql_query($command, $db);
    $id = mysql_insert_id();
    $command = "INSERT INTO comments(ip_id,created,note,user_id,reporterip)
        values($id, now(),'direct hit at honeypot',21,$reporterip)";
    $result = mysql_query($command, $db);
}

?>
