<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    public function edit($id)
    {
        return view('admin.profile.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update($id)
    {
        $user = User::find($id);
        if (request('nama')) $user->nama = request('nama');
        if (request('no_hp')) $user->no_hp = request('no_hp');
        if (request('username')) $user->username = request('username');
        if (request('email')) $user->email = request('email');
        if (request('password')) $user->password = request('password');
        $user->save();

        if (request('foto')) $user->handleUploadFoto();

        return redirect('admin/profile')->with('success', 'Data Berhasil Diedit');
    }
}
