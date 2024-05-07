
<?php

if(isset($_FILES['file']))

{
    


$file_arr = $_FILES['file'];
    
$ftp_server = "serverName";
$ftp_user = "username";
$ftp_password = "password";

$ftp_conn = ftp_connect($ftp_server) or die("could not connect to the server");

if($ftp_conn)
{
    echo "connection successfull!! \n";
}

$login = ftp_login($ftp_conn, $ftp_user, $ftp_password);

// $local_file = $file_tmp_name;
// // $fp = fopen($local_file,"r");
// $server_file = $file_name;

foreach($file_arr['name']as $key => $value){
 

    $local_file = $file_arr['tmp_name'][ $key ];
    $server_file = $value;
   
     if(ftp_put($ftp_conn,$server_file ,$local_file,FTP_BINARY))
     {
         echo  $server_file." uploaded successfully!";
        }
        
        else{
            
            echo "file upload failed!";
        }
    }
    

ftp_close($ftp_conn);








}







?>