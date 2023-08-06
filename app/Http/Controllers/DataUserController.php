<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataUserController extends Controller
{
    public function index()
    {
        $users = DataUser::all();
        $roles = Role::all();
        return view('user.data_user', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create_data_user', compact('roles'));
    }

    public function edit($id)
    {
        $user = DataUser::findOrFail($id);
        $roles = Role::all();
        return view('user.edit_data_user', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_gender' => 'required|in:male,female,other',
            'user_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id' => 'required|exists:roles,id',
            'user_token' => 'required|max:255',
        ]);
    
        // Cek apakah ada file gambar yang diunggah, lalu simpan gambar tersebut di direktori public/photos
        $user_photo_path = null;
        if ($request->hasFile('user_photo')) {
            $user_photo = $request->file('user_photo');
            $user_photo_path = $user_photo->store('photos', 'public');
        }
    
        // Create a new DataUser instance and set its properties
        $user = new DataUser();
        $user->user_name = $request->input('user_name');
        $user->user_email = $request->input('user_email');
        $user->user_gender = $request->input('user_gender');
        $user->user_photo = $user_photo_path;
        $user->role_id = $request->input('role_id');
        $user->user_token = $request->input('user_token');
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'Data User berhasil ditambahkan');
    }
    
    

    public function update(Request $request, $id)
    {
        $user = DataUser::findOrFail($id);

        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_gender' => 'required|in:male,female,other',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Update data user berdasarkan input dari form
        $user->user_name = $request->input('user_name');
        $user->user_email = $request->input('user_email');
        $user->user_gender = $request->input('user_gender');
        $user->role_id = $request->input('role_id');

        // Simpan perubahan data user
        $user->save();

        return redirect()->route('user.index')->with('success', 'Data User berhasil diperbarui');
    }

    public function show($id)
    {
        $user = DataUser::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User not found');
        }
        return view('user.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = DataUser::findOrFail($id);

        // Hapus foto pengguna jika ada
        if ($user->user_photo) {
            Storage::delete('public/' . $user->user_photo);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data User berhasil dihapus');
    }
    // Fungsi lainnya (update, destroy) tidak perlu diubah karena sudah menggunakan model "DataUser"
}
