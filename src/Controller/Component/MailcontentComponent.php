<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

Class MailcontentComponent extends Component {

    public $components = array('Mailer');

    public function emailChat($data) {
        $message = "";

        $message.='<tr>';
        $message.='<td valign="top" align="left" style="padding:30px 10px 10px 10px;font-family:Helvetica,Helvetica neue,Arial,Verdana,sans-serif;color:#333333;font-size:14px;line-height:22px;text-align:left;font-weight:bolder"> Hi ' . $data['this_user'] . ',</td>';
        $message.='</tr> ';

        $message.='<tr>';
        $message.="<td valign='top' align='left' style='padding:10px 10px 10px 10px;font-family:Helvetica,Helvetica neue,Arial,Verdana,sans-serif;color:#333333;font-size:14px;line-height:20px;text-align:left;font-weight:none'>Your conversation with " . $data['chat_user'] . " about <i>\"" . $data['question'] . "\"</i> is attached as <b>\"" . $data['file_name'] . "\"</b> file to this email.";
        $message.='</td>';
        $message.='</tr>';

        $message.='<tr>';
        $message.='<td valign="top" align="left" style="padding:10px 10px 10px 10px;font-family:Helvetica,Helvetica neue,Arial,Verdana,sans-serif;color:#333333;font-size:14px;line-height:20px;text-align:left;font-weight:none">Regards,</td>';
        $message.='</tr>';

        $message.='<tr>';
        $message.='<td valign="top" align="left" style="padding:10px 10px 10px 10px;font-family:Helvetica,Helvetica neue,Arial,Verdana,sans-serif;color:#333333;font-size:14px;line-height:20px;text-align:left;font-weight:none">' . Configure::read('SITE_TEAM') . '</td>';
        $message.='</tr>';

        $to = $data['to'];
        $subject = $data['subject'];
        $emailtemplate = "newtemplete";
        $attachments = WWW_ROOT . $data['file_url'];

        return $this->Mailer->sendMail($to, $subject, $message, null, $attachments, $emailCofig = 'gmail', $emailtemplate);
    }

    public function forgotPasswordMail($data) {
        $to = $data['to'];
        $subject = $data['subject'];
        $random_password = $data['random_password'];
        $SiteTeam = Configure::read('SITE_TEAM');

        $body = "<p>Hello </p>";
        $body .= "<p>We heard that you lost your password. Sorry about that!</p>";
        $body .= "<p>Please login using this password and change your password.</p>";
        $body .= "<p>Your new password is: " . $random_password . "</p>";
        $body .= "<p>Thank you <br/> " . $SiteTeam . "</p>";



        return $this->Mailer->sendMail($to, $subject, $body, null, null);
    }

}
