<?php
 // FTP server details
$ftpHost   = 'ftp.meengineer.co.th';
$ftpUsername = 'meengineer';
$ftpPassword = OC7IuVdsGP

// open an FTP connection
$connId = ftp_connect($ftpHost) or die("Couldn't connect to $ftpHost");

// try to login
if(@ftp_login($connId, $ftpUsername, $ftpPassword)){
    echo "Connected as $ftpUsername@$ftpHost";
}else{
    echo "Couldn't connect as $ftpUsername";
}

// close the connection
ftp_close($connId);
?>
