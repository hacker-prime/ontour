<?php

require 'vendor/autoload.php';


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
// $SENDGRID_API_KEY = getenv("SENDGRID_API_KEY");
$SENDGRID_API_KEY = $_ENV['SENDGRID_API_KEY'];
// echo $SENDGRID_API_KEY;

// Initialize an empty array to store error messages
$messages = [];

if (isset($_POST['airport_form'])) {

    try{
            // echo "The airport form was selected";
            
        // https://stackoverflow.com/questions/3706855/send-email-with-a-template-using-php
        $variables = array();

        $variables['first_name'] = $firstName;

        $variables['last_name'] = $lastName;

        $variables['email'] = $email;

        $variables['number'] = $phone;

        $variables['pick_up_date'] = $pickUpDate;

        $variables['pick_up_location'] = $pickUpLocation;

        $variables['drop_off_location'] = $dropOffLocation;

        $variables['number_of_persons'] = $numPersons;

        // $variables['pieces_of_luggage'] = $piecesLuggage;

        $template = file_get_contents("email-template.php");

        foreach($variables as $key => $value){

            $template = str_replace('{{ '.$key.' }}', $value, $template); // https://stackoverflow.com/questions/36239143/php-use-name-to-echo-in-html

        }

        // Inspired by phoenixprime.io>sections>customer>email_notification.php


        // your sendgrid api key

        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("customerservice@phoenixprime.io", "On Tour");     // {"errors":[{"message":"The from address does not match a verified Sender Identity. Mail cannot be sent until this error is resolved. Visit https://sendgrid.com/docs/for-developers/sending-email/sender-identity/ to see the Sender Identity requirements","field":"from","help":null}]} https://stackoverflow.com/questions/64535636/sendgrid-getting-error-the-from-address-does-not-match-a-verified-sender-ident
        $email->setSubject("New Airport Request");
        // https://stackoverflow.com/questions/43618340/sendgrid-php-send-to-multiple-recipients
        // https://github.com/sendgrid/sendgrid-php/blob/main/USE_CASES.md#send-an-email-to-a-single-recipient
        $tos = [
            "reservations.ontour@gmail.com" => "Management",
            "shaynhacker@gmail.com" => "Tech Support"
        ];

        $email->addTos($tos);
        $email->addContent("text/html", $template);

        $sendgrid = new \SendGrid($SENDGRID_API_KEY);// https://www.w3schools.com/php/func_misc_define.asp
        try {

            $response = $sendgrid->send($email);

            $messages[] = $response->statusCode() . "\n";
            $messages[] = $response->headers();
            $messages[] = $response->body() . "\n";
            // var_dump($messages);
            $submit_status = "<div class='submit_status'>Your request submission was successful!</div>";
            $myfile = fopen("output.txt", "w") or die("Unable to open file!");
            // https://stackoverflow.com/questions/4260590/how-to-convert-an-array-to-a-string-in-php
            fwrite($myfile, json_encode($messages));
            fclose($myfile);

        } catch (Exception $e) {

            $myfile = fopen("output.txt", "w") or die("Unable to open file!");
            fwrite($myfile, $e->getMessage());
            fclose($myfile);
            // $messages[] = 'Caught exception: '. $e->getMessage() ."\n";
            // echo 'Caught exception: '. $e->getMessage() ."\n";
        }    

    }catch (Exception $e) {
        // Handle exceptions by logging the error message
        $messages[] = 'Airport form submission failed: ' . $e->getMessage();
    }

} 


if(isset($_POST['tour_form'])) {

    try{
        // echo "The tour form was selected";

        
            // echo "The airport form was selected";
            
        // https://stackoverflow.com/questions/3706855/send-email-with-a-template-using-php
        $variables = array();

        $variables['first_name'] = $firstName;

        $variables['last_name'] = $lastName;

        $variables['email'] = $email;

        $variables['number'] = $phone;

        $variables['tour'] = $tour;

        $variables['hotel'] = $hotel;

        $variables['service_type'] = $service_type;

        $variables['num-persons'] = $numPersons;

        // $variables['pieces_of_luggage'] = $piecesLuggage;

        $template = file_get_contents("email-template-2.php");

        foreach($variables as $key => $value){

            $template = str_replace('{{ '.$key.' }}', $value, $template); // https://stackoverflow.com/questions/36239143/php-use-name-to-echo-in-html

        }

        // Inspired by phoenixprime.io>sections>customer>email_notification.php


        // your sendgrid api key

        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("customerservice@phoenixprime.io", "On Tour");     // {"errors":[{"message":"The from address does not match a verified Sender Identity. Mail cannot be sent until this error is resolved. Visit https://sendgrid.com/docs/for-developers/sending-email/sender-identity/ to see the Sender Identity requirements","field":"from","help":null}]} https://stackoverflow.com/questions/64535636/sendgrid-getting-error-the-from-address-does-not-match-a-verified-sender-ident
        $email->setSubject("New Tour Request");
        // https://stackoverflow.com/questions/43618340/sendgrid-php-send-to-multiple-recipients
        // https://github.com/sendgrid/sendgrid-php/blob/main/USE_CASES.md#send-an-email-to-a-single-recipient
        $tos = [
            "reservations.ontour@gmail.com" => "Management",
            "shaynhacker@gmail.com" => "Tech Support"
        ];

        $email->addTos($tos);
        $email->addContent("text/html", $template);

        $sendgrid = new \SendGrid($SENDGRID_API_KEY);// https://www.w3schools.com/php/func_misc_define.asp
        try {

            $response = $sendgrid->send($email);

            $messages[] = $response->statusCode() . "\n";
            $messages[] = $response->headers();
            $messages[] = $response->body() . "\n";
            // var_dump($messages);
            $submit_status = "<div class='submit_status'>Your request submission was successful!</div>";
            $myfile = fopen("output.txt", "w") or die("Unable to open file!");
            // https://stackoverflow.com/questions/4260590/how-to-convert-an-array-to-a-string-in-php
            fwrite($myfile, json_encode($messages));
            fclose($myfile);

        } catch (Exception $e) {

            $myfile = fopen("output.txt", "w") or die("Unable to open file!");
            fwrite($myfile, $e->getMessage());
            fclose($myfile);
            // $messages[] = 'Caught exception: '. $e->getMessage() ."\n";
            // echo 'Caught exception: '. $e->getMessage() ."\n";
        } 
      
    } catch (Exception $e) {
        // Handle exceptions by logging the error message
        $messages[] = 'Tour form submission failed: ' . $e->getMessage();
    } 

}


// Save error messages to a log file
$logfile = "error.log";
file_put_contents($logfile, implode("\n", $messages), FILE_APPEND);


?>