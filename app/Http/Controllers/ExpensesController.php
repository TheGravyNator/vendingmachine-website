<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Slot;

class ExpensesController extends Controller
{
    public function show()
    {
      if(Auth::check())
      {
        $orders = Auth::user()->order()->orderBy('created_at', 'desc')->paginate(10);
        return view('expenses')->with('orders', $orders);
      }
      return view('expenses');
    }

    public function optin()
    {
      $user = Auth::user();
      if(intval(request('opt-in')))
      {
        $user->optin = 1;
        $user->save();
      }
      else
      {
        $user->optin = 0;
        $user->save();
      }
      return redirect('/expenses');
    }
}
