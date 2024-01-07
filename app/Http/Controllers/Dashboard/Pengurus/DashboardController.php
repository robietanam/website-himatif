<?php

namespace App\Http\Controllers\Dashboard\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.pengurus.index');
    }
}
