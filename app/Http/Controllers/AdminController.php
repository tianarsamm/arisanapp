<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArisanGroup;
use App\Models\ArisanMember;
use App\Models\Payment;
use App\Models\Winner;

class AdminController extends Controller
{
    public function index()
    {
        $groupCount = ArisanGroup::count();
        $memberCount = ArisanMember::count();
        $totalPayments = Payment::sum('amount');
        $winnerCount = Winner::count();

        return view('admin.dashboard', compact('groupCount', 'memberCount', 'totalPayments', 'winnerCount'));
    }
}
