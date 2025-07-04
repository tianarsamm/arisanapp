<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArisanGroup;
use App\Models\ArisanMember;
use App\Models\Winner;

class WinnerController extends Controller
{
    public function index()
    {
        $groups = ArisanGroup::with('winners')->get();
        return view('winners.index', compact('groups'));
    }

    public function undi($groupId)
    {
        $group = ArisanGroup::findOrFail($groupId);

        $round = Winner::where('arisan_group_id', $groupId)->count() + 1;

        $sudahMenang = Winner::where('arisan_group_id', $groupId)->pluck('arisan_member_id');
        $eligibleMembers = ArisanMember::where('arisan_group_id', $groupId)
            ->whereNotIn('id', $sudahMenang)
            ->inRandomOrder()
            ->first();

        if (!$eligibleMembers) {
            return redirect()->back()->with('error', 'Semua anggota sudah menang.');
        }

        Winner::create([
            'arisan_group_id' => $groupId,
            'arisan_member_id' => $eligibleMembers->id,
            'round_number' => $round,
            'draw_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Pemenang putaran ke-' . $round . ' berhasil diundi.');
    }
}
