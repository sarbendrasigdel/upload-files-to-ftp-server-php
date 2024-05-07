
<?php

if(isset($_FILES['file']))

{
    


$file_arr = $_FILES['file'];
    
$ftp_server = "192.168.1.143";
$ftp_user = "user";
$ftp_password = "admin";

$ftp_conn = ftp_connect($ftp_server) or die("could not connect to the server");

if($ftp_conn)
{
    echo "connection successfull!!". "<br/>" ;
}

$login = ftp_login($ftp_conn, $ftp_user, $ftp_password);

 

    $local_file = $file_arr['tmp_name'];
    $server_file = $file_arr['name'];
   
     if(ftp_put($ftp_conn,$server_file ,$local_file,FTP_BINARY))
     {
         echo  "File uploaded successfully!"."<br/>" ;
        }
        
        else{
            
            echo "file upload failed!" ." <br/>" ;
        }
    
    

ftp_close($ftp_conn);








}







?>