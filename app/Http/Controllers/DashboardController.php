<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Server;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $serverCount = Server::count();
        $vendorCount = Vendor::count();
        $userCount = User::count();

        return view('dashboard', compact('serverCount', 'vendorCount', 'userCount'));
    }
}
