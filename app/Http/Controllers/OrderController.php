<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Slot;
use App\Order;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OrderController extends Controller
{
    private $client;

    public function __construct()
    {
      $this->client = new \GuzzleHttp\Client;
    }

    public function show()
    {
      $slots = [
        'slot_1' => Slot::where('slot_id', 1)->first(),
        'slot_2' => Slot::where('slot_id', 2)->first(),
        'slot_3' => Slot::where('slot_id', 3)->first(),
        'slot_4' => Slot::where('slot_id', 4)->first(),
        'slot_5' => Slot::where('slot_id', 5)->first(),
      ];
      return view('order')->with('slots', $slots);
    }

    public function create()
    {
      try
      {
        $response = $this->client->post('http://vendingmachineapi.local/', [
          \GuzzleHttp\RequestOptions::JSON => [
            'slot' => request('slot'),
            'soda_amount' => request('soda_amount')
          ]
        ]);
      }
      catch(GuzzleException $e)
      {
        return redirect('order')->with('status', 'Er is iets fout gegaan.');
      }
      $order = new Order;
      $prices = [
        'slot_1' => Slot::where('slot_id', 1)->first(),
        'slot_2' => Slot::where('slot_id', 2)->first(),
        'slot_3' => Slot::where('slot_id', 3)->first(),
        'slot_4' => Slot::where('slot_id', 4)->first(),
        'slot_5' => Slot::where('slot_id', 5)->first(),
      ];
      if(request('slot') == 'slot_1')
      {
        $soda_type = Slot::where('slot_id', 1)->value('name_soda');
        $order->user_id = Auth::user()->id;
        $order->soda_type = $soda_type;
        $order->amount = request('soda_amount');
        $order->price = Slot::where('slot_id', 1)->value('price') * request('soda_amount');
        $order->save();
      }
      if(request('slot') == 'slot_2')
      {
        $soda_type = Slot::where('slot_id', 2)->value('name_soda');
        $order->user_id = Auth::user()->id;
        $order->soda_type = $soda_type;
        $order->amount = request('soda_amount');
        $order->price = Slot::where('slot_id', 2)->value('price') * request('soda_amount');
        $order->save();
      }
      if(request('slot') == 'slot_3')
      {
        $soda_type = Slot::where('slot_id', 3)->value('name_soda');
        $order->user_id = Auth::user()->id;
        $order->soda_type = $soda_type;
        $order->amount = request('soda_amount');
        $order->price = Slot::where('slot_id', 3)->value('price') * request('soda_amount');
        $order->save();
      }
      if(request('slot') == 'slot_4')
      {
        $soda_type = Slot::where('slot_id', 4)->value('name_soda');
        $order->user_id = Auth::user()->id;
        $order->soda_type = $soda_type;
        $order->amount = request('soda_amount');
        $order->price = Slot::where('slot_id', 4)->value('price') * request('soda_amount');
        $order->save();
      }
      if(request('slot') == 'slot_5')
      {
        $soda_type = Slot::where('slot_id', 5)->value('name_soda');
        $order->user_id = Auth::user()->id;
        $order->soda_type = $soda_type;
        $order->amount = request('soda_amount');
        $order->price = Slot::where('slot_id', 5)->value('price') * request('soda_amount');
        $order->save();
      }
      return redirect('/order');
    }
}
