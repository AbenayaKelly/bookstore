<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AdminController extends Controller
{
    public function deashbord(){
        return view('admin.dashbord');
    }
 
}
