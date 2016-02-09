<?php

namespace Cake\Controller;

use Cake\Routing\Router;
use Cake\Core\Configure;

class ErrorController extends Controller {

    public function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
        $this->viewPath = 'Error';
        $debug = Configure::read('debug');
        if ($debug != 1)
            $this->render('custom_error');
    }

}
