<?php

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;

class Login extends Controller
{

    public function render(): View
    {
        $this->view = 'login';
        return $this->view($this->view, $this->data);
    }
}
