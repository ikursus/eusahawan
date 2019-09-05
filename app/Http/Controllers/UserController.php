<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $senarai_users = [
            ['id' => 1, 'name' => 'Ali', 'email' => 'ali@gmail.com', 'status' => 'active'],
            ['id' => 2, 'name' => 'Abu', 'email' => 'abu@gmail.com', 'status' => 'banned'],
            ['id' => 3, 'name' => 'Ah Leong', 'email' => 'ahleong@gmail.com', 'status' => 'active'],
        ];
    
        return view('users.template_senarai', compact('senarai_users'));
    }

    public function create() {
        return 'Ini adalah halaman borang tambah user baru';
    }

    public function edit($id) {
        return 'Ini adalah halaman borang edit user bernombor ID: ' .$id;
    }
}
