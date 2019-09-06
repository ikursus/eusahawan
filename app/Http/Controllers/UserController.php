<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    public function index()
    {
        // Query ke table users dan dapatkan SEMUA data
        $senarai_users = DB::table('users')
        // ->where('email','siti@gmail')
        // ->orWhere('name', 'abu')
        // ->orderBy('id', 'desc')
        //->get();
        ->paginate(3);
    
        return view('users.template_senarai', compact('senarai_users'));
    }




    public function create() {
        return view('users.template_add_user');
    }

    
    
    
    public function simpan(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed'
        ]);

        // Kita terima data
        $data = $request->only(['name', 'email', 'phone', 'status']);
        // Encrypt password user
        $data['password'] = bcrypt($request->input('password'));

        // Simpan data ke dalam database
        DB::table('users')->insert($data);
        // Setelah selesai, redirect ke halaman senarai users
        return redirect('users');
    }

    public function edit($id)
    {
        // Dapatkan data user berdasarkan ID
        $user = DB::table('users')->where('id', $id)->first();

        // Bagi respon papar template borang edit user beserta rekod $user
        return view('users.template_edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Kita terima data
        $data = $request->only(['name', 'email', 'phone', 'status']);
        // Semak adakah ruangan password tidak kosong? 
        // Jika ya, maka update password baru
        if(!empty($request->input('password')))
        {
            $data['password'] = bcrypt($request->input('password'));
        }

        // Update data ke dalam table users
        DB::table('users')->where('id', $id)->update($data);
        // Redirect ke halaman sebelum
        return redirect()->back();
    }
}
