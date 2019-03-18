<?php 

$con=ftp_connect("ftp.meengineer.co.th"); 

if($con) 
{ 
    echo"connected"; 
} 
else 
{ 
    echo "disconnectd"; 
} 
                 
$con_login=ftp_login($con,"meengineer","OC7IuVdsGP");     

if($con_login) 
{ 
    echo "login"; 
} 

else 
{ 
    echo"not login"; 

} 


$contents=ftp_nlist($con,"public_html/foldername");  //working  
print_r($contents); 



$ret=ftp_nb_get($con,"c:\image.jpg","public_html/foldername/image.jpg",FTP_BINARY); //working 

while ($ret == FTP_MOREDATA) 
{ 
   
   // Do whatever you want 
   echo "."; 

   // Continue downloading... 
   $ret = ftp_nb_continue($con); 
} 

if ($ret != FTP_FINISHED) 
{ 
   echo "There was an error downloading the file..."; 
   exit(1); 
} 

if ($ret == FTP_FINISHED) 
{ 
    echo "downloaded"; 
} 

ftp_close($con); 

?>
