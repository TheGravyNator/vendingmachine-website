@extends('layouts.page')

@section('content')

  @guest
    <div class="alert alert-danger" role="alert">
      U moet ingelogd zijn om alle uitgaven te kunnen zien!
    </div>
  @else
    <h1>Alle Uitgaven</h1>
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
  @endguest


@endsection
