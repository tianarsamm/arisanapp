<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArisanGroup;

class ArisanGroupController extends Controller
{
    public function index()
    {
        $groups = ArisanGroup::where('status', 'open')->get();
        return view('arisan.index', compact('groups'));
    }
}
