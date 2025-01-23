<?php
namespace App\Controllers;

use Google\Client;
use Google\Service\Gmail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require '/xampp/htdocs/vendor/autoload.php';
require '/opt/bitnami/apache/htdocs/ojak/vendor/autoload.php';


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
            $client->setClientId(env('MAIL_CLINET_ID'));
            $client->setClientSecret(env('MAIL_CLINET_PW'));
            $client->setAccessType('offline');
            $client->setApprovalPrompt('force');
            $client->addScope('https://mail.google.com/');

            // $client->setRedirectUri('http://localhost');
            $client->setRedirectUri('https://ojak.co.kr');
            $client->refreshToken(env('MAIL_REFRESH_TOKEN'));

            $accessToken = $client->getAccessToken();

            // Set the OAuth2 token
            $mail->setOAuth(
                new \PHPMailer\PHPMailer\OAuth([
                    'provider' => new \League\OAuth2\Client\Provider\GenericProvider([
                        'clientId' => env('MAIL_CLINET_ID'),
                        'clientSecret' =>env('MAIL_CLINET_PW'),
                        // 'redirectUri' => 'http://localhost',
                        'redirectUri' => 'https://ojak.co.kr',
                        'urlAuthorize' => 'https://accounts.google.com/o/oauth2/auth',
                        'urlAccessToken' => 'https://oauth2.googleapis.com/token',
                        'urlResourceOwnerDetails' => 'https://www.googleapis.com/oauth2/v1/certs',
                    ]),
                    'clientId' => env('MAIL_CLINET_ID'),
                    'clientSecret' =>env('MAIL_CLINET_PW'),
                    'refreshToken' => env('MAIL_REFRESH_TOKEN'),
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