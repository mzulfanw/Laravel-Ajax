<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    // Method untuk menampilkan data dari database menggunakan Eloquent

    public function index()
    {
        $users = User::all();
        return view('CRUD.index', compact('users'));
    }

    // Method untuk store data atau insert data

    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        return response()->json([
            'success' => true
        ], 200);
    }


    // Method Update Data
    public function update(Request $request)
    {
        $users = User::find($request->id);


        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);

        $users->save();
    }


    // Method untuk hapus data yang diparsing dari parameter
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        // dd($users);
        $users->delete();

        return response()->json(
            ['success' => true]
        );
    }
}
