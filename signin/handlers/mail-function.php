<?php


require("../vendor/phpmailer/src/PHPMailer.php");
require("../vendor/phpmailer/src/Exception.php");
require("../vendor/phpmailer/src/SMTP.php");


$message = "";


function sendOTP($email,$otp,$firstName,$lastName,$role) {             

            // $mail = new PHPMailer(true);Fatal error: Uncaught Error: Class "PHPMailer" not found in D:\xampp\htdocs\phoenixprime.io\sections\includes\handlers\mail-function.php:25 Stack trace: #0 D:\xampp\htdocs\phoenixprime.io\sections\includes\handlers\register-handler.php(63): sendOTP('shaynhacker@gma...', 442742, 'Shayn', Object(mysqli)) #1 D:\xampp\htdocs\phoenixprime.io\sections\index.php(12): include('D:\\xampp\\htdocs...') #2 {main} thrown in D:\xampp\htdocs\phoenixprime.io\sections\includes\handlers\mail-function.php on line 25
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            try {
                //Send using SMTP
                $mail->isSMTP();                                            
                //Set the SMTP server to send through                 
                $mail->Host       = 'smtp.hostinger.com '; 
                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above   
                $mail->Port       = 587; 
                //Enable SMTP authentication                                   
                $mail->SMTPAuth   = true;       
                //SMTP username                                
                $mail->Username   = 'customerservice@phoenixprime.io';    
                //SMTP password                 
                $mail->Password   = 'Plusultra!876';                               
                $mail->setFrom('customerservice@phoenixprime.io', 'Phoenix Prime');
                $mail->addAddress($email);               
                $mail->addReplyTo('customerservice@phoenixprime.io', 'Reply');


                //Content
                $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetpassword.php?code=$code";
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'One Time Password';
                $mail->Body    = "

                    
                                  <center>
                                    <div style='background-color:#ffffff'>
                                      <table align='center' style='Margin:0 auto;width:100%;max-width:600px;border-spacing:0;font-family:sans-serif;color:#4a4a4a'>
                                        
                                        <tbody>
                                              <tr>
                                                <td style='padding:0'>
                                                  <table width='100%' style='border-spacing:0;border-spacing:0'>
                                                    <tbody><tr><td style='padding:0;padding:10px;text-align:center'>
                                                      <a href='https://thephynix.com/' style='text-decoration:none;color:#388cda;font-size:16px' target='_blank' >
                                                        <img src='https://i.ibb.co/HrbvDhq/phynix-logo-removebg-preview.png' width='180'  title='logo' style='border:0' class='CToWUd'>
                                                      </a>
                                                    </td>
                                                  </tr></tbody></table>
                                                </td>
                                              </tr>

                                              

                                              <table width='660' border='0' cellpadding='0' cellspacing='0' align='center' bgcolor='#fba511' style='width:100%;background-color:#ff4444;max-width:660px'>
                                              <tbody>
                                                <tr>
                                                  <td width='100%' style='padding-top:45px'>
                                                    <table border='0' cellpadding='0' cellspacing='0' align='center' width='100%'>
                                                      <tbody>
                                                        <tr>
                                                          <td rowspan='3' width='10%'>&nbsp;</td>
                                                          <td align='center' style='text-align:center'>
                                                            <table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>
                                                              <tbody>
                                                                <tr>
                                                                  <td style='font-weight:600;font-size:40px;line-height:42px;color:#ffffff;text-align:center'><a style='text-decoration:none;color:#ffffff' target='_blank' >Welcome $firstName $lastName </a></td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </td>
                                                          <td rowspan='3' width='10%'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td align='center' style='text-align:center'>
                                                            <table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>
                                                              <tbody>
                                                                <tr>
                                                                  <td style='padding:20px 0px 0px 0px;width:100%;font-size:18px;line-height:22px;color:#ffffff;text-align:center'><a style='text-decoration:none;color:#ffffff' target='_blank' >Thank you for choosing Phoenix for your transportation and delivery needs.</a></td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </td>
                                                        </tr>
                                                        <table width='100%' border='0' cellpadding='0' cellspacing='0' style='display:block;line-height:1.5px' bgcolor='#ff4444'>
                                                          <tbody>
                                                            <tr>
                                                              <td class='m_4748469324539747250hidden'></td>
                                                              <td class='m_4748469324539747250hidden'>&nbsp;</td>
                                                              <td class='m_4748469324539747250hidden'></td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table width='100%' border='0' cellpadding='0' cellspacing='0' style='display:block;line-height:1.5px' bgcolor='#ff4444'>
                                                        <tbody>
                                                          <tr>
                                                            <td class='m_4748469324539747250hidden'></td>
                                                            <td class='m_4748469324539747250hidden'>&nbsp;</td>
                                                            <td class='m_4748469324539747250hidden'></td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                      <table width='100%' border='0' cellpadding='0' cellspacing='0' style='display:block;line-height:1.5px' bgcolor='#ff4444'>
                                                      <tbody>
                                                        <tr>
                                                          <td class='m_4748469324539747250hidden'></td>
                                                          <td class='m_4748469324539747250hidden'>&nbsp;</td>
                                                          <td class='m_4748469324539747250hidden'></td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                        <tr>
                                                          <td align='center' style='padding:0px 0px 0px 0px;text-align:center'>
                                                            <table align='center' width='100%' border='0' cellspacing='0' cellpadding='0' style='text-align:center;table-layout:fixed'>
                                                              <tbody>
                                                                <tr>
                                                                  <td align='center' style='text-align:center;padding:30px 0px 50px 0px'>
                                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='text-align:center;table-layout:auto'>
                                                                      <tbody>
                                                                        <tr>
                                                                          <td align='center' style='text-align:center'>
                                                                          </td>
                                                                        </tr>
                                                                      </tbody>
                                                                    </table>
                                                                  </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                  </td>
                                                </tr>
                                              </tbody>
                                              </table>

                                              
                                              
                                              <tr>
                                                <td style='padding:0'>
                                                  <a href='https://redesign.bluedotinsights.com/' style='text-decoration:none;color:#388cda;font-size:16px' target='_blank'>
                                                    <img src='https://i.ibb.co/TbyZPpV/High-five-pana.png' alt='Banner' width='600' style='border:0;max-width:100%;background-color: #fff;' class='CToWUd'>
                                                  </a>
                                                </td>
                                              </tr>
                                              


                                                <tbody style='background-color:#ff4444'>
                                                  <tr>
                                                    <td width='100%' style='padding-top:45px'>
                                                      <table border='0' cellpadding='0' cellspacing='0' align='center' width='100%'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='padding:0;' rowspan='3' width='10%'>&nbsp;</td>
                                                            <td align='center' style='text-align:center;padding-top:0'>
                                                              <table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>
                                                                <tbody>
                                                                  <tr>
                                                                  <td style='font-weight:600;font-size:40px;line-height:42px;color:#ffffff;text-align:center'><a style='text-decoration:none;color:#ffffff;padding:0' target='_blank' >One Time Password</a></td>
                                                                  </tr>
                                                                </tbody>
                                                              </table>
                                                            </td>
                                                            <td rowspan='3' width='10%'>&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td align='center' style='text-align:center'>
                                                              <table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>
                                                                <tbody>
                                                              
                                                                  <tr>
                                                                    <td style='padding:20px 0px 0px 0px;width:100%;font-size:18px;line-height:22px;color:#ffffff;text-align:center'><a style='text-decoration:none;color:#ffffff' target='_blank' >Please use the code below to login</a></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td style='padding:20px 0px 0px 0px;width:100%;font-size:18px;line-height:22px;color:#ffffff;text-align:center'><a href='http://localhost/phoenixprime.io/sections/includes/handlers/otp-login.php?otp=$otp&role=$role' style='text-decoration:underline;color:#ffffff' target='_blank' >$otp</a></td>
                                                                  </tr>
                                                                </tbody>
                                                              </table>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>

                                              
                                              
                                              <tr>
                                                <td style='padding:0'>
                                                  <table width='100%' style='border-spacing:0;border-spacing:0'>
                                                    <tbody><tr>
                                                      <td style='padding:0;background-color:#ff4444;text-align:center'>
                                                        <p style='font-size:18px;color:#ffffff;Margin-bottom:13px'>
                                                          Connect with us 
                                                      </p>
                                                        
                                                        <a href='https://www.instagram.com/phynix876/' style='text-decoration:none;color:#388cda;font-size:16px'>
                                                          <img src='https://ci5.googleusercontent.com/proxy/vGoWsCsNbvBa7GjoNvg2wIfABYGzUNY3lGW0UR0bD4hGoCYNWKvtexwn_LupSdBfhJQu4CSIrhDQc9Oujj6T=s0-d-e1-ft#https://i.ibb.co/JHnWjnn/white-instagram.png' alt='Facebook' width='30' style='border:0' class='CToWUd'>
                                                        </a>
                                                        
                                                      </td>
                                                    </tr>
                                                  </tbody></table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td style='padding:0;background-color:#efefef'>
                                                  <table width='100%' style='border-spacing:0;background-color: #405BFF;
                                                  border-spacing: 0;
                                                  color: white;'>
                                                    <tbody>
                                                      <tr>
                                                        <td style='padding:0;text-align:center;padding-bottom:10px;background-color: #ff4444;'>
                                                          <a style='text-decoration:none;color:#388cda;font-size:16px'>
                                                            <img src='https://ci4.googleusercontent.com/proxy/JfNL7QELs-K5m0zi_Lbz0H6FhHl19Lh0TP4X3peLv9M4VFixlSt--vBh=s0-d-e1-ft#http://img/w3newbie.png' alt='' width='160' style='border:0' class='CToWUd'>
                                                          </a>
                                                          <p style='font-size:16px;Margin-top:18px;Margin-bottom:10px'>
                                                            Phynix     
                                                        </p>
                                                          <p style='font-size:16px;Margin-bottom:10px;color:white;'>
                                                              Montego Bay,Jamaica
                                                          </p>
                                                          <p>
                                                            <a href='mailto:customerservice@thephynix.com' style='text-decoration:none;color:#fff;font-size:16px' target='_blank'>
                                                              customerservice@thephynix.com
                                                            </a>
                                                          </p>
                                                        </td>
                                                      </tr>                                   
                                                  </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                        
                                        </tbody>
                                      </table>
                                    </div>
                                  </center>  
                                
                                 ";
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $message = 'Reset password link has been sent to your email';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            // exit();
}



function newRegistration($email,$firstName,$role,$lastName) {          

  // $mail = new PHPMailer(true);Fatal error: Uncaught Error: Class "PHPMailer" not found in D:\xampp\htdocs\phoenixprime.io\sections\includes\handlers\mail-function.php:25 Stack trace: #0 D:\xampp\htdocs\phoenixprime.io\sections\includes\handlers\register-handler.php(63): sendOTP('shaynhacker@gma...', 442742, 'Shayn', Object(mysqli)) #1 D:\xampp\htdocs\phoenixprime.io\sections\index.php(12): include('D:\\xampp\\htdocs...') #2 {main} thrown in D:\xampp\htdocs\phoenixprime.io\sections\includes\handlers\mail-function.php on line 25
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  try {
      //Server settings
      // $mail->SMTPDebug = 2; 
      $mail->isSMTP();                                            //Send using SMTP
      // https://support.flockmail.com/hc/en-us/articles/900000063683-Configure-FlockMail-on-Gmail
      $mail->Host       = 'smtp.flockmail.com';                     //Set the SMTP server to send through
      $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'customerservice@thephynix.com';                     //SMTP username
      $mail->Password   = 'thephoenixneverdies_eternal_immortal_8';                               //SMTP password
      // $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

      //Recipients
      // https://www.hostinger.com/tutorials/send-emails-using-php-mail
      // https://stackoverflow.com/questions/1022472/sender-address-rejected
      $mail->setFrom('customerservice@thephynix.com', 'Phynix');
      $mail->addAddress($email);
      $mail->addCC('customerservice@thephynix.com');               
      $mail->addReplyTo('no-reply@thephynix.com', 'No reply');

      //Content
      $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetpassword.php?code=$code";
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'New Registration';
      $mail->Body    = "

          
                        <center>
                          <div style='background-color:#ffffff'>
                            <table align='center' style='Margin:0 auto;width:100%;max-width:600px;border-spacing:0;font-family:sans-serif;color:#4a4a4a'>
                              
                              <tbody>
                                    <tr>
                                      <td style='padding:0'>
                                        <table width='100%' style='border-spacing:0;border-spacing:0'>
                                          <tbody><tr><td style='padding:0;padding:10px;text-align:center'>
                                            <a href='https://thephynix.com/' style='text-decoration:none;color:#388cda;font-size:16px' target='_blank' >
                                              <img src='https://i.ibb.co/HrbvDhq/phynix-logo-removebg-preview.png' width='180'  title='logo' style='border:0' class='CToWUd'>
                                            </a>
                                          </td>
                                        </tr></tbody></table>
                                      </td>
                                    </tr>

                                    

                                    <table width='660' border='0' cellpadding='0' cellspacing='0' align='center' bgcolor='#fba511' style='width:100%;background-color:#ff4444;max-width:660px'>
                                    <tbody>
                                      <tr>
                                        <td width='100%' style='padding-top:45px'>
                                          <table border='0' cellpadding='0' cellspacing='0' align='center' width='100%'>
                                            <tbody>
                                              <tr>
                                                <td rowspan='3' width='10%'>&nbsp;</td>
                                                <td align='center' style='text-align:center'>
                                                  <table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>
                                                    <tbody>
                                                      <tr>
                                                        <td style='font-weight:600;font-size:40px;line-height:42px;color:#ffffff;text-align:center'><a style='text-decoration:none;color:#ffffff' target='_blank' >New Registration</a></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                                <td rowspan='3' width='10%'>&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align='center' style='text-align:center'>
                                                  <table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>
                                                    <tbody>
                                                      <tr>
                                                        <td style='padding:20px 0px 0px 0px;width:100%;font-size:18px;line-height:22px;color:#ffffff;text-align:center'><a style='text-decoration:none;color:#ffffff' target='_blank' >Name: $firstName $lastName </a></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                              <table width='100%' border='0' cellpadding='0' cellspacing='0' style='display:block;line-height:1.5px' bgcolor='#ff4444'>
                                                <tbody>
                                                  <tr>
                                                    <td class='m_4748469324539747250hidden'></td>
                                                    <td class='m_4748469324539747250hidden'>&nbsp;</td>
                                                    <td class='m_4748469324539747250hidden'></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                              <table width='100%' border='0' cellpadding='0' cellspacing='0' style='display:block;line-height:1.5px' bgcolor='#ff4444'>
                                              <tbody>
                                                <tr>
                                                  <td class='m_4748469324539747250hidden'></td>
                                                  <td class='m_4748469324539747250hidden'>&nbsp;</td>
                                                  <td class='m_4748469324539747250hidden'></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <table width='100%' border='0' cellpadding='0' cellspacing='0' style='display:block;line-height:1.5px' bgcolor='#ff4444'>
                                            <tbody>
                                              <tr>
                                                <td class='m_4748469324539747250hidden'></td>
                                                <td class='m_4748469324539747250hidden'>&nbsp;</td>
                                                <td class='m_4748469324539747250hidden'></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                              <tr>
                                                <td align='center' style='padding:0px 0px 0px 0px;text-align:center'>
                                                  <table align='center' width='100%' border='0' cellspacing='0' cellpadding='0' style='text-align:center;table-layout:fixed'>
                                                    <tbody>
                                                      <tr>
                                                        <td align='center' style='text-align:center;padding:30px 0px 50px 0px'>
                                                          <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='text-align:center;table-layout:auto'>
                                                            <tbody>
                                                              <tr>
                                                                <td align='center' style='text-align:center'>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                    </table>

                                    
                                    
                                    <tr>
                                      <td style='padding:0'>
                                        <a href='https://redesign.bluedotinsights.com/' style='text-decoration:none;color:#388cda;font-size:16px' target='_blank'>
                                          <img src='https://i.ibb.co/TbyZPpV/High-five-pana.png' alt='Banner' width='600' style='border:0;max-width:100%;background-color: #fff;' class='CToWUd'>
                                        </a>
                                      </td>
                                    </tr>                                

                              </tbody>
                            </table>
                          </div>
                        </center>  
                      
                       ";
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      $message = 'Reset password link has been sent to your email';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  // exit();





}


?>