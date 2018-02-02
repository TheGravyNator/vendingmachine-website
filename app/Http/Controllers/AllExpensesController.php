<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Slot;

class AllExpensesController extends Controller
{
    public function show()
    {
      if(Auth::check())
      {
        $users = Auth::user()->where('optin', 1)->paginate(10);
        return view('all-expenses')->with('users', $users);
      }
      return view('all-expenses');
    }
}
