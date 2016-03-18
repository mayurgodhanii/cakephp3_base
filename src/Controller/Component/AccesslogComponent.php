<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

Class AccesslogComponent extends Component {

    public function logdata($login_user_id = "") {
        $action_name = $this->request->params['action'];
        if ($action_name != "logfile") {
            $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
            $SERVER_PROTOCOL = $_SERVER['SERVER_PROTOCOL'];
            $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
            $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
            $REQUEST_URI = $_SERVER['REQUEST_URI'];


            $log = array();

            $log[] = date('[D M d H:i:s Y]');
            $log[] = "[Access]";
            $log[] = "[client $REMOTE_ADDR]";
            if (!empty($login_user_id)) {
                $log[] = "[Login User ID $login_user_id]";
            }
            $log[] = '"' . "$REQUEST_METHOD $SERVER_PROTOCOL" . '"';
            $log[] = '"' . "$HTTP_USER_AGENT" . '"';
            $log[] = "URL :$REQUEST_URI";
            $log_string = implode(' ', $log);

            $myFile = "accesslog.log";
            if (file_exists($myFile)) {
                $fh = fopen($myFile, 'a');
                fwrite($fh, $log_string . "<br />");
            } else {
                $fh = fopen($myFile, 'w');
                fwrite($fh, $log_string . "<br />");
            }
            fclose($fh);
        }
        return true;
    }

}

//[Wed Mar 16 10:29:18.168788 2016] [:error] [pid 31231] [client 212.118.227.88:55170] PHP Notice:  Use of undefined constant REPORTS - assumed 'REPORTS' in /var/www/html/model/reports.php on line 12
