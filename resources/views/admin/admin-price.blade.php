@extends('layouts.page')

@section('content')

  @include('layouts.nav-admin')

  @guest
    <div class="alert alert-danger" role="alert">
      U moet administrator zijn om deze pagina te kunnen zien!
    </div>
  @else
    <h1>Prijzen</h1>

    <table class='table'>
      <tr>
        <th></th>
        <th>Prijs per blik</th>
        <th>Pas prijs aan</th>
      </tr>
      <form action='/admin/admin-price' method='POST'>
        {{ csrf_field() }}
      <tr>
        <td>{{ $slots['slot_1']->name_soda }}<br></td>
        <td>{{ '€' . number_format(($slots['slot_1']->price/100), 2, '.', ' ') }}</td>
        <td>
          € <input type='number' name='slot_1' min='0.00' step='0.01' />&nbsp;
        </td>
      </tr>
      <tr>
        <td>{{ $slots['slot_2']->name_soda }}<br></td>
        <td>{{ '€' . number_format(($slots['slot_2']->price/100), 2, '.', ' ') }}</td>
        <td>
          € <input type='number' name='slot_2' min='0.00' step='0.01' />&nbsp;
        </td>
      </tr>
      <tr>
        <td>{{ $slots['slot_3']->name_soda }}<br></td>
        <td>{{ '€' . number_format(($slots['slot_3']->price/100), 2, '.', ' ') }}</td>
        <td>
          € <input type='number' name='slot_3' min='0.00' step='0.01' />&nbsp;
        </td>
      </tr>
      <tr>
        <td>{{ $slots['slot_4']->name_soda }}<br></td>
        <td>{{ '€' . number_format(($slots['slot_4']->price/100), 2, '.', ' ') }}</td>
        <td>
          € <input type='number' name='slot_4' min='0.00' step='0.01' />&nbsp;
        </td>
      </tr>
      <tr>
        <td>{{ $slots['slot_5']->name_soda }}<br></td>
        <td>{{ '€' . number_format(($slots['slot_5']->price/100), 2, '.', ' ') }}</td>
        <td>
          € <input type='number' name='slot_5' min='0.00' step='0.01' />&nbsp;
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
            <button type='submit' class='btn btn-primary'>Pas aan</button>
          </form>
        </td>
      </tr>
    </table>

  @endguest

@endsection
