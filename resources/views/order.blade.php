@extends('layouts.page')

@section('content')
  @guest
    <div class="alert alert-danger" role="alert">
      U moet ingelogd zijn om frisdrank te kunnen bestellen!
    </div>
  @else
    <form method='POST' action='/order'>
      {{ csrf_field() }}
      <h1>Bestel frisdrank</h1>
      @if (session('status'))
        <div class="alert alert-danger">
          {{ session('status') }}
        </div>
      @endif
      <div class="alert alert-warning" role="alert">
        Let op! Er geldt een limiet van 3 blikjes per bestelling, wegens ruimte in de opvangbak in de automaat!
      </div>
      <div class='form-group'>
        <label for='slot'>Soort frisdrank</label><br/>
        <select name='slot' style='width:auto;'>
          <option value='slot_1'>{{ $slots['slot_1']->name_soda . ' - ' . '€' . number_format($slots['slot_1']->price/100, 2, '.', ' ') }}</option>
          <option value='slot_2'>{{ $slots['slot_2']->name_soda . ' - ' . '€' . number_format($slots['slot_2']->price/100, 2, '.', ' ') }}</option>
          <option value='slot_3'>{{ $slots['slot_3']->name_soda . ' - ' . '€' . number_format($slots['slot_3']->price/100, 2, '.', ' ') }}</option>
          <option value='slot_4'>{{ $slots['slot_4']->name_soda . ' - ' . '€' . number_format($slots['slot_4']->price/100, 2, '.', ' ') }}</option>
          <option value='slot_5'>{{ $slots['slot_5']->name_soda . ' - ' . '€' . number_format($slots['slot_5']->price/100, 2, '.', ' ') }}</option>
        </select>
      </div>
      <div class='form-group'>
        <label for='soda_amount'>Aantal</label><br/>
        <select name='soda_amount'>
          <option value=1>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
        </select>
      </div>
      <div class='form-group'>
        <button type='submit' class='btn btn-primary'>Bestel</button>
      </div>
    </form>
  @endguest



@endsection
