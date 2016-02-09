<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Network\Email\Email;

Class MailerComponent extends Component {

    public $components = array('Session', 'Email');

    public function sendMail($to, $subject, $message, $from = null, $attachments = null, $emailCofig = 'default', $emailtemplate = 'default', $format = 'html', $replyto = null, $cc = null, $bcc = null) {

        if (empty($from)) {
            $from = Configure::read('FROM_EMAIL_ADDRESS');
            $from_name = Configure::read('SITE_NAME');
        }


        $email = new Email('default');

        $email->emailFormat($format);
        if (isset($from_name))
            $email->from(array($from => $from_name));
        else
            $email->from($from);

        $email->to($to);
        $email->cc($cc);
        $email->bcc($bcc);
        $email->replyTo($replyto);
        $email->subject($subject);
        $email->template($emailtemplate, 'default');
//        if ($_SERVER['SERVER_NAME'] == 'localhost') {
//            $email->transport('gmail');
//        }

        if (!empty($attachments)) {
            $email->attachments($attachments);
        }

        if ($email->send($message)) {
            return true;
        } else {
            return false;
        }
    }

}
