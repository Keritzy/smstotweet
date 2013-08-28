<?php
//Tweet a SMS
$username = "username";
$password = "password";
$dbname = "databasename";
$tablename = "twitter";
$hostname = "localhost"; 

//##################### POST settings & MYSQL Connections #############

//POST, this is the code that receives new texts
$sender = $_REQUEST['sender'];
$content = $_REQUEST['content'];
$inNumber = $_REQUEST['inNumber'];
$email = $_REQUEST['email'];
$credits = $_REQUEST['credits'];
$keyword = "Tweet";
//establish a connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL". mysql_error());

//select a database to work with
$selected = mysql_select_db($dbname,$dbhandle) 
  or die(mysql_error());
   
// inserts POST'd text messages from txtlocal api
$insertsms = mysql_query("INSERT INTO ".$tablename." (sender,content,inNumber,email,credits) VALUES ('".$sender."', '".$content."', '".$inNumber."', '".$email."', '".$credits."')");

// Remove keyword from data base
mysql_query ("UPDATE ".$tablename." SET `content` = REPLACE(`content`, '".$keyword."', '')");



//Grab the new update from the database with the removed keyword
$newtweet = mysql_query ("SELECT * FROM ".$tablename." WHERE `content` IS NOT NULL AND `messagesent` = 0 LIMIT 1");
$row = mysql_fetch_row($newtweet);

//Twitter Connection
require_once("twitteroauth/twitteroauth.php");
$consumer_key = 'xxxxxxxxxxxxxxx';  
$consumer_secret = 'xxxxxxxxxxxxxxxxxxxx';
$access_token = 'xxxxxxxxxxxxxxxxxxxxxxxx';
$access_token_secret = 'xxxxxxxxxxxxxxxxxxxxx';
$connection = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
                  

// Post Update
$tweetcontent = $connection->post('statuses/update', array('status' => $row[2]));

// set as sent in the data base
mysql_query("UPDATE ".$tablename." SET messagesent = '1' WHERE id = ".$row[0]."")//updates 'messagesent' to show it has been sent out.
or die(mysql_error());

//Remove Blank space if any one navigates to the page with no post data
mysql_query ("DELETE FROM ".$tablename." WHERE 'sender' = 0")
or die(mysql_error());

  
?>