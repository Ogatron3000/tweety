<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $users = auth()->user()->notFollowing();

        return view('explore', compact('users'));
    }
}
