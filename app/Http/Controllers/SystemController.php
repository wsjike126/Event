<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * 后台入口方法
     */
    public function start()
    {
        return view('system.start');
    }
}
