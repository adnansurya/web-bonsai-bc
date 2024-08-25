<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\b;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.seller.index' ,[
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>'required|max:255',
            'wa_number' =>'required|max:255',
            'email' =>'required|max:255',
            'password' => 'required|min:8|max:255',
            'is_seller' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect('/dashboard/user')->with('success', 'Data Seller Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.seller.edit', [
            'seller' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' =>'required|max:255',
            'wa_number' =>'required|max:255',
            'email' =>'required|max:255',
            'password' => 'required|min:8|max:255',
            'is_seller' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::where('id',$user->id)->update($validated);

        return redirect('/dashboard/user')->with('success-edit', 'Data Seller Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/user')->with('delete', 'Data Seller Berhasil Dihapus!');
    }
}
