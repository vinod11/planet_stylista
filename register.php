<!DOCTYPE html> 
<html>
<head>
	<title>Thank you!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="TSW WebCoder">
</head>
<body>
    <div class="part-five part-four" id="Get-Started" style="display: flex; align-items: center; justify-content: center; background-size: auto !important;">
   
        
       <p> Congratulations!
<span style="color:green;">Your Registration is Successful for "The Planet Stylista 2022" Season 1 

Have a great journey ahead with AD Production House Mumbai.
<br>
For more information contact us on 9284105033</span>
</p>

    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        setTimeout(function () {
            window.location.replace("index.html"); //will redirect to main page (index.html)
        }, 10000); //will call the function after 10 secs.
        
    </script>   
</body>
</html>






<?php
if(isset($_POST['submit'])){ 


$to = "info@adproductionhouse.com";
$subject = "New Registration";
$txt = '';
$email=$_REQUEST["email"];
$headers = "From:$email \r\n";
$headers .= "Cc:$email \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";



$txt.='<tr><td>Country</td><td>'.$_REQUEST["country"].'</td></tr>';
$txt.='<tr><td>Full Name</td><td>'.$_REQUEST["full_name"].'</td></tr>';
$txt.='<tr><td>Email</td><td>'.$_REQUEST["email"].'</td></tr>';
$txt.='<tr><td>Phone</td><td>'.$_REQUEST["phone"].'</td></tr>';
$txt.='<tr><td>Address</td><td>'.$_REQUEST["address"].'</td></tr>';
$txt.='<tr><td>Pin</td><td>'.$_REQUEST["pin"].'</td></tr>';
$txt.='<tr><td>Gender</td><td>'.$_REQUEST["gender"].'</td></tr>';
$txt.='<tr><td>DOB</td><td>'.$_REQUEST["dob"].'</td></tr>';
$txt.='<tr><td>Maritial Status</td><td>'.$_REQUEST["maritial_status"].'</td></tr>';
$txt.='<tr><td>Hobby</td><td>'.$_REQUEST["hobby"].'</td></tr>';
$txt.='<tr><td>Height</td><td>'.$_REQUEST["height"].'</td></tr>';
$txt.='<tr><td>Weight</td><td>'.$_REQUEST["weight"].'</td></tr>';
$txt.='<tr><td>Shoe Size</td><td>'.$_REQUEST["shoe_size"].'</td></tr>';
$txt.='<tr><td>Eye Color</td><td>'.$_REQUEST["eye_color"].'</td></tr>';
$txt.='<tr><td>Hair Color</td><td>'.$_REQUEST["hair_color"].'</td></tr>';
$txt.='<tr><td>Vital Size</td><td>'.$_REQUEST["vital_size"].'</td></tr>';
$txt.='<tr><td>Description</td><td>'.$_REQUEST["self_description"].'</td></tr>';
$txt.='<tr><td>Selfie</td><td>'.upload_file("selfie").'</td></tr>';
$txt.='<tr><td>Full Pic</td><td>'.upload_file("full_pic").'</td></tr>';
$txt.='<tr><td>Payment Screenshot</td><td>'.upload_file("payment_proof").'</td></tr>';



$txt='<table border="1">'.$txt.'</table>';
mail($to,$subject,$txt,$headers);


}





function upload_file($fileid){

$uniqueid=uniqid();

    $fileUniqueName=uniqid();
    $uploadTo = "uploads/"; 
    $allowFileType = array('jpg','png','jpeg','gif','pdf','doc');
    $fileName = $_FILES[$fileid]['name'];
    $tempPath=$_FILES[$fileid]["tmp_name"];


    $basename = basename($fileName);
    $originalPath = $uploadTo.$uniqueid.$basename; 
    $fileType = pathinfo($originalPath, PATHINFO_EXTENSION); 

    if(!empty($fileName)){ 
    
       if(in_array($fileType, $allowFileType)){ 

         // Upload file to server 
         if(move_uploaded_file($tempPath,$originalPath)){ 
             
             
                if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
  
            return $url.$originalPath;

           // write here sql query to store image name in database
          
          }else{ 
            $error = 'File Not uploaded ! try again';
          } 
      }else{
         return $fileType." file type not allowed";
      }
   }else{  
    return "Please Select a file";
   }       

}


?>