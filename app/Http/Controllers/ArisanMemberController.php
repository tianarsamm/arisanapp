<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArisanMember;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\ArisanGroup;

class ArisanMemberController extends Controller
{
    public function join($id)
    {
        $user = Auth::user();

        // Cek apakah sudah gabung
        $alreadyJoined = ArisanMember::where('user_id', $user->id)
            ->where('arisan_group_id', $id)
            ->exists();

        if ($alreadyJoined) {
            return redirect()->route('arisan.index')->with('error', 'Kamu sudah tergabung di grup ini.');
        }

        ArisanMember::create([
            'user_id' => Auth::id(),
            'arisan_group_id' => $id,
            'join_date' => Carbon::now(), // tambahkan ini
        ]);

        return redirect()->route('arisan.index')->with('success', 'Berhasil gabung ke grup arisan!');
    }

        public function myGroups()
    {
        $user = auth()->user();

        // Ambil semua grup yang sudah diikuti user
        $memberships = $user->arisanMemberships()->with('group')->get();

        return view('arisan.my', compact('memberships'));
    }
}
