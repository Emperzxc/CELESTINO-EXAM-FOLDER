<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return 'Hello From controller';
    }

    public function show($id, $message){
        $data = array(
            'name' => 'Michael Jeffrey Celestino',
            'address' => 'Imus, Cavite',
            'email' => 'michael@example.com',
            'phone' => '123-456-7890',
            'occupation' => 'Software Developer'
        );

        return view('user')
            ->with('data' , $data)
            ->with('id' , $id)
            ->with('message' , $message);
    }
}
