<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bmet;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function AdminDashboard()
    {
        $totalBmet = Bmet::count();
        return view('admin.dashboard', compact('totalBmet'));
    }

}