@extends('layouts.page')

@section('content')

  @guest
    <div class="alert alert-danger" role="alert">
      U moet ingelogd zijn om uw uitgaven te kunnen zien!
    </div>
  @else

    <h1>Mijn Uitgaven</h1>

    <div class="alert alert-info" role="alert">
      Het uitgavenoverzicht wordt elke maand vernieuwd.
    </div>

    <table class='table'>
      <tr>
        <th>Soort frisdrank</th>
        <th>Aantal blikken</th>
        <th>Totale prijs</th>
        <th>Datum bestelling</th>
      </tr>
      @foreach ($orders as $order)
        <tr>
          <td>{{ $order->soda_type }}</td>
          <td>{{ $order->amount }}</td>
          <td>{{ '€' . number_format($order->price/100, 2, '.', ' ') }}</td>
          <td>{{ Carbon\Carbon::parse($order['created_at'])->format('d-m-Y') }}</td>
        </tr>
      @endforeach
    </table>
    {{ $orders->links() }}<br>

    <div class="alert alert-info" role="alert">
      Momenteel worden uw gegevens <b>{{ Auth::user()->optin ? 'wel' : 'niet' }}</b> in het algemene overzicht weergegeven.
    </div>

    <form action='/opt-in' method='POST'>
      {{ csrf_field() }}
      <div class='form-group'>
        <label for='opt-in'>Uitgaven weergeven in algemeen overzicht?</label>
        <select name='opt-in'>
          <option disabled selected value>Voorkeur</option>
          <option value=1>Ja</option>
          <option value=0>Nee</option>
        </select><br><br>
        <button type='submit' class='btn btn-primary'>Verzend</button>
      </div>
    </form>
  @endguest

@endsection
