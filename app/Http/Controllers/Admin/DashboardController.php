<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function charts(){
        return view('admin.charts');
    }

    public function tables(){
        return view('admin.tables');
    }

}
