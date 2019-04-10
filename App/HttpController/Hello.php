<?php

namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;

class Hello extends Controller
{
    function index()
    {
        $this->response()->write('Hello easySwoole!');
    }
}
