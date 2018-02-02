@extends('layouts.page')

@section('content')

  @include('layouts.nav-admin')

  @guest
    <div class="alert alert-danger" role="alert">
      U moet administrator zijn om deze pagina te kunnen zien!
    </div>
  @else
    <h1>Uitgaven van alle medewerkers</h1>

    <table class='table'>
      <tr>
        <th></th>
        <th>Aantal blikken</th>
        <th>Totale prijs</th>
      </tr>
      @foreach ( $users as $user )
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->getTotalCans() }}</td>
          <td>{{ '€' . number_format($user->getTotalExpenses()/100, 2, '.', ' ')  }}</td>
        </tr>
	    @endforeach
    </table>
    {{ $users->links() }}
    <form action='/admin/admin-overview' method='POST'>
      {{ csrf_field() }}
      <button type='submit' class='btn btn-primary'>Mail overzicht</button>
    </form><br>
  @endguest

@endsection
