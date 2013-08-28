SMS to Tweet
==========

SMS to Tweet  - For no reason i can think of I made this script so that i can text a tweet.

It's a script i've made for my raspberry pi.

Any one willing to donate some funds please do to txt3rob@gmail.com I want a raspi-cam for a new project.

Email me txt3rob@gmail.com if you want some help.

Database Setup
--------------

Insert the following code to PhpMyAdmin

```
CREATE TABLE `texts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender` decimal(12,0) DEFAULT NULL,
  `content` varchar(612) DEFAULT NULL,
  `inNumber` decimal(12,0) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `forward` int(1) DEFAULT '0',
  `messagesent` int(1) DEFAULT '0',
  `datereceived` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

```````

tweetsms.php
--------

You need the following feilds to suit your setup and you need to create a twitter application via http://dev.twitter.com
to get the consumer key etc.
```
$username = "username";
$password = "password";
$dbname = "databasename";
$tablename = "twitter";
$hostname = "localhost"; 

$consumer_key = 'xxxxxxxxxxxxxxx';  
$consumer_secret = 'xxxxxxxxxxxxxxxxxxxx';
$access_token = 'xxxxxxxxxxxxxxxxxxxxxxxx';
$access_token_secret = 'xxxxxxxxxxxxxxxxxxxxx'
```

SMS Setup
-----------
Configuring TextLocal to Post…

If you aint got an account go to 
```
http://www.txtlocal.co.uk/?tlrx=149130
```
you need to tell text local where to POST too. Its a simple setup process:

Login to textlocal dashboard

Select ‘inboxes’

Select the inbox you wish to use and press ‘settings’

Find the heading ‘Forward incoming messages to a URL’

Enter the URL of your script.

Save!


Thanks for some code snippets:
--------------
Abraham Williams  http://abrah.am

Matt Gooch - http://mattgooch.com/
