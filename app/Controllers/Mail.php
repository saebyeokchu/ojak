<?php
namespace App\Controllers;

use Google\Client;
use Google\Service\Gmail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/xampp/htdocs/vendor/autoload.php';


class Mail extends BaseController
{   
    public function send($user_id, $user_name, $subject, $body){
        // Load your credentials
        // $oauthCredentials = json_decode(file_get_contents('path_to_your_client_credentials.json'), true);
        // $clientID = $oauthCredentials['installed']['client_id'];
        // $clientSecret = $oauthCredentials['installed']['client_secret'];
        // $refreshToken = 'your_refresh_token'; // Get this from Google OAuth Playground or via API calls
 
        // PHPMailer setup
        $mail = new PHPMailer(true);
        log_message('info','mail-send-to'.$user_id.",".$user_name);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            // OAuth2 Authentication
            $mail->AuthType = 'XOAUTH2';

            // Create a new Google API Client instance
            $client = new \Google\Client();
            $client->setClientId('645634754500-ppd41tbicfft5mrvohq3of7p2ekmh1f5.apps.googleusercontent.com');
            $client->setClientSecret('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');
            $client->setAccessType('offline');
            $client->addScope('https://mail.google.com/');

            $client->setRedirectUri('http://localhost');
            $client->refreshToken('1//04hxXFz5XW12FCgYIARAAGAQSNwF-L9Irtfbod1g0ykMsVxMQi8eWptfrXisFZ9ft3ybS3Z2ezGpeH03XcGgK45FIeZtbxk87_bo');

            $accessToken = $client->getAccessToken();

            // Set the OAuth2 token
            $mail->setOAuth(
                new \PHPMailer\PHPMailer\OAuth([
                    'provider' => new \League\OAuth2\Client\Provider\GenericProvider([
                        'clientId' => '645634754500-ppd41tbicfft5mrvohq3of7p2ekmh1f5.apps.googleusercontent.com',
                        'clientSecret' =>'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',
                        'redirectUri' => 'http://localhost',
                        'urlAuthorize' => 'https://accounts.google.com/o/oauth2/auth',
                        'urlAccessToken' => 'https://oauth2.googleapis.com/token',
                        'urlResourceOwnerDetails' => 'https://www.googleapis.com/oauth2/v1/certs',
                    ]),
                    'clientId' => '645634754500-ppd41tbicfft5mrvohq3of7p2ekmh1f5.apps.googleusercontent.com',
                    'clientSecret' =>'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',
                    'refreshToken' => '1//04hxXFz5XW12FCgYIARAAGAQSNwF-L9Irtfbod1g0ykMsVxMQi8eWptfrXisFZ9ft3ybS3Z2ezGpeH03XcGgK45FIeZtbxk87_bo',
                    'userName' => 'sharezoom3@gmail.com',
                ])
            );

            
            // Recipients
            $mail->setFrom('sharezoom3@gmail.com', 'ojak');
            $mail->addAddress($user_id, $user_name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Send the email
            if($mail->send()){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            log_message('error',$e);
            return false;
        } }

}
