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
        return view('users.template_add_user');
    }

    public function simpan(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        $data = $request->all();

        return $data;
    }

    public function edit($id) {
        return view('users.template_edit_user');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('name');

        return $data;
    }
}
