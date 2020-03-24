<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get All Contact
     */
    public function index()
    {
        if(isset($_GET['search'])) {
            $users = User::where('nama', 'like', $_GET['search'])->get();
        } else {
            $users = User::all();
        }
        return response()->json([
            'status' => true,
            'data' => $users
        ]);
    }

    /**
     * Update Contact
     */
    public function update(Request $request)
    {
        User::where('id', $request->id)->update($request->all());
        $users = User::all();
        return response()->json([
            'status' => true,
            'message' => "Berhasil Update Kontak!",
            'data' => $users
        ]);
    }
}
