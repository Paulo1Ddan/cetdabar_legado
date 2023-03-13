<?php 
    namespace Class;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    class Mailer{
        const USERNAME = "";
        const PASSWORD = "";
        const NAMEFROM = "Suporte Educacional CETDABAR";

        private $mail;

        public function __construct($toAddress, $toName, $subject, $message, $data = array())
        {
            $html = $message;

            $this->mail = new PHPMailer(true);
            try{

                $this->mail->isSMTP();
                $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $this->mail->CharSet = "UTF-8";
                $this->mail->Host = "smtp.gmail.com";
                $this->mail->SMTPAuth = true;
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $this->mail->Username = Mailer::USERNAME;
                $this->mail->Password = Mailer::PASSWORD;
                $this->mail->Port = 465;

                $this->mail->setFrom(Mailer::USERNAME, Mailer::NAMEFROM);
                $this->mail->addAddress($toAddress, $toName);

                $this->mail->Subject = $subject;
                $this->mail->Body = $html;
                $this->mail->AltBody = $html;

            }catch(\Exception $e){

            }
        }

        public function send()
        {
            $this->mail->send();
        }

    }

?>