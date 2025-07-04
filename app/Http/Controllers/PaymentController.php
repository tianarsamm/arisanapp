<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArisanMember;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $memberships = auth()->user()->arisanMemberships()->with('group')->get();
        return view('iuran.index', compact('memberships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'arisan_member_id' => 'required|exists:arisan_members,id',
            'month' => 'required|numeric',
            'year' => 'required|numeric',
            'amount' => 'required|numeric',
            'proof' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('proof')?->store('proofs', 'public');

        Payment::create([
            'arisan_member_id' => $request->arisan_member_id,
            'month' => $request->month,
            'year' => $request->year,
            'amount' => $request->amount,
            'proof' => $path,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Pembayaran berhasil disimpan, menunggu konfirmasi.');
    }
}
