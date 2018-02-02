<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Slot;
use App\Mail\SendOverview;

class AdminController extends Controller
{

  public function show()
  {
    return view('admin.admin');
  }

  public function showOverview()
  {
    if(Auth::check() && Auth::user()->admin == 1)
    {
      $users = Auth::user()->paginate(10);
      return view('admin.admin-overview')->with('users', $users);
    }
    return view('admin.admin-overview');
  }

  public function removeOverview()
  {
    $orders = Auth::user()->order()->delete();
    return redirect('/admin/admin-overview');
  }

  public function showRights()
  {
    if(Auth::check() && Auth::user()->admin == 1)
    {
      $users = Auth::user()->paginate(10);
      return view('admin.admin-rights')->with('users', $users);
    }
    return view('admin.admin-rights');
  }

  public function grantRights()
  {
    if(Auth::check() && Auth::user()->admin == 1)
    {
      $user = Auth::user()->where('id', intval(request('user-id')))->first();
      if($user->admin == 1)
      {
        $user->admin = 0;
        $user->save();
      }
      else
      {
        $user->admin = 1;
        $user->save();
      }
      return redirect('/admin/admin-rights');
    }
    return view('admin.admin-rights');
  }

  public function showPrice()
  {
    $slots = [
      'slot_1' => Slot::where('slot_id', 1)->first(),
      'slot_2' => Slot::where('slot_id', 2)->first(),
      'slot_3' => Slot::where('slot_id', 3)->first(),
      'slot_4' => Slot::where('slot_id', 4)->first(),
      'slot_5' => Slot::where('slot_id', 5)->first(),
    ];
    return view('admin.admin-price')->with('slots', $slots);
  }

  public function changePrice()
  {
    $slot = null;
    if(request('slot_1') !== null)
    {
      $slot = Slot::where('slot_id', 1)->first();
      $slot->price = request('slot_1')*100;
      $slot->save();
    }
    if(request('slot_2') !== null)
    {
      $slot = Slot::where('slot_id', 2)->first();
      $slot->price = request('slot_2')*100;
      $slot->save();
    }
    if(request('slot_3') !== null)
    {
      $slot = Slot::where('slot_id', 3)->first();
      $slot->price = request('slot_3')*100;
      $slot->save();
    }
    if(request('slot_4') !== null)
    {
      $slot = Slot::where('slot_id', 4)->first();
      $slot->price = request('slot_4')*100;
      $slot->save();
    }
    if(request('slot_5') !== null)
    {
      $slot = Slot::where('slot_id', 5)->first();
      $slot->price = request('slot_5')*100;
      $slot->save();
    }
    return redirect('/admin/admin-price');
  }

  public function mailOverview()
  {
    $users = Auth::user()->all();
    \Mail::to(Auth::user())->send(new SendOverview($users));
    return redirect('/admin/admin-overview');
  }

  public function showSodaTypes()
  {
    $slots = [
      'slot_1' => Slot::where('slot_id', 1)->value('name_soda'),
      'slot_2' => Slot::where('slot_id', 2)->value('name_soda'),
      'slot_3' => Slot::where('slot_id', 3)->value('name_soda'),
      'slot_4' => Slot::where('slot_id', 4)->value('name_soda'),
      'slot_5' => Slot::where('slot_id', 5)->value('name_soda')
    ];
    return view('admin.admin-sodatype')->with('slots', $slots);
  }

  public function changeSodaTypes()
  {
    $slot = null;
    if(request('slot_1') !== null)
    {
      $slot = Slot::where('slot_id', 1)->first();
      $slot->name_soda = request('slot_1');
      $slot->save();
    }
    if(request('slot_2') !== null)
    {
      $slot = Slot::where('slot_id', 2)->first();
      $slot->name_soda = request('slot_2');
      $slot->save();
    }
    if(request('slot_3') !== null)
    {
      $slot = Slot::where('slot_id', 3)->first();
      $slot->name_soda = request('slot_3');
      $slot->save();
    }
    if(request('slot_4') !== null)
    {
      $slot = Slot::where('slot_id', 4)->first();
      $slot->name_soda = request('slot_4');
      $slot->save();
    }
    if(request('slot_5') !== null)
    {
      $slot = Slot::where('slot_id', 5)->first();
      $slot->name_soda = request('slot_5');
      $slot->save();
    }
    return redirect('/admin/admin-sodatype');
  }
}
