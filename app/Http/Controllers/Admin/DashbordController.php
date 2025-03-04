<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.admin', ['user' => $user]);
    }
    public function profile()
    {
        return 'pagina profilo back office';
    }
}
