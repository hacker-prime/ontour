<?php
/** April 20,2023 - The code is inspired by and used inside the sections>customer>send_push_notification php file.I copied it over to ChatGPT and instructed it to do the following:"create an object oriented PHP class using called notifications with a function or method called email that uses the following code:"
 * 
 *  The Notifications class intends to use more than one way or mechanism to notify customers:
 *  1.Email
 *  2.Web Push Notifications
 *  3.WhatsApp.
 *
**/

class Notifications {

    public function email($email_parameters) {

        $error = '';

        if (empty($email_parameters['email']) || empty($email_parameters['email_subject']) || empty($email_parameters['email_template']) || empty($email_parameters['send_grid']) || empty($email_parameters['email_header']) || empty($email_parameters['email_image']) || empty($email_parameters['email_message']) || empty($email_parameters['autoload.php_path'])) { // check if all the required parameters are provided and if not, return an error message indicating that some parameters are missing.
            
            echo json_encode(                
                  array(
                        'error' => 'Missing required parameters.'
                  )
            );

            return;
            
        }

        $to = $email_parameters['email'];
        $email_subject = $email_parameters['email_subject'];
        $email_template = $email_parameters['email_template'];
        $send_grid_api_key = $email_parameters['send_grid'];
        $email_header = $email_parameters['email_header'];
        $email_image = $email_parameters['email_image'];
        $email_message = $email_parameters['email_message'];
        require_once($email_parameters['autoload.php_path']);// https://sendgrid.com/free-templates/detail/ecommerce-newsletter-email-template/

        $dynamic_content = array(// Define dynamic content for email template
            "email_header" => $email_header,
            "email_image" =>$email_image,
            "email_message" => $email_message
        );

        $email_body = file_get_contents($email_template);// Get the HTML email template from the specified file and replace placeholders with dynamic content
        foreach ($dynamic_content as $placeholder => $value) {
            $email_body = str_replace("{" . $placeholder . "}", $value, $email_body);
        }

        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("customerservice@phoenixprime.io", "Phoenix Prime");     // {"errors":[{"message":"The from address does not match a verified Sender Identity. Mail cannot be sent until this error is resolved. Visit https://sendgrid.com/docs/for-developers/sending-email/sender-identity/ to see the Sender Identity requirements","field":"from","help":null}]} https://stackoverflow.com/questions/64535636/sendgrid-getting-error-the-from-address-does-not-match-a-verified-sender-ident
        $email->setSubject($email_subject);
        $email->addTo($to);
        $email->addContent("text/html", $email_body);

        $sendgrid = new \SendGrid($send_grid_api_key);// https://www.w3schools.com/php/func_misc_define.asp
        try {
            $response = $sendgrid->send($email);
            $messages[] = $response->statusCode() . "\n";
            $messages[] = $response->headers();
            $messages[] = $response->body() . "\n";
        } catch (Exception $e) {
            // echo 'Caught exception: '. $e->getMessage() ."\n";
            $error = $e->getMessage(); 
        } 

        echo json_encode(
            array(
                'error' => $error,
                'messages' => $messages
            )
        );
    }

}
