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
        <th>Soort</th>
        <th>Pas soort aan</th>
      </tr>
      <form action='/admin/admin-sodatype' method='POST'>
        {{ csrf_field() }}
      <tr>
        <td>Positie 1<br></td>
        <td>{{ $slots['slot_1'] }}</td>
        <td>
          <input type='text' name='slot_1'/>
        </td>
      </tr>
      <tr>
        <td>Positie 2<br></td>
        <td>{{ $slots['slot_2'] }}</td>
        <td>
          <input type='text' name='slot_2'/>
        </td>
      </tr>
      <tr>
        <td>Positie 3<br></td>
        <td>{{ $slots['slot_3'] }}</td>
        <td>
          <input type='text' name='slot_3'/>
        </td>
      </tr>
      <tr>
        <td>Positie 4<br></td>
        <td>{{ $slots['slot_4'] }}</td>
        <td>
          <input type='text' name='slot_4'/>
        </td>
      </tr>
      <tr>
        <td>Positie 5<br></td>
        <td>{{ $slots['slot_5'] }}</td>
        <td>
          <input type='text' name='slot_5'/>
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
