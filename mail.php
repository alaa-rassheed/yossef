<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message1 = $_POST['message'];
    
    $to_email = 'info.founderm@gmail.com';
    
    $data = array(
        'Name'=>$name,
        'Phone'=>$phone,
        'Email'=>$email,
        'Message'=>$message1,
        'Date'=>date('Y/m/d'),
    );
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://sheetdb.io/api/v1/92tj5jsz1wk40',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>http_build_query($data),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    ////// send Email//////
    $subject = 'Lorem Ipsum ';
    $message = "Lorem Ipsum is simply dummy text of the printing and typesetting  \n";
    $message .= "Name: $name \n";
    $message .= "Phone: $phone \n";
    $message .= "Email: $Email \n";
    $headers = "From: $email";
    $headers .= 'Cc: info.founderm@gmail.com' . "\r\n";
    mail($to_email,$subject,$message,$headers,'-f info.founderm@gmail.com');
    
    header('Location:success.html');
?>


