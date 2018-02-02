@extends('layouts.page')

@section('content')

  @include('layouts.nav-admin')

  @guest
    <div class="alert alert-danger" role="alert">
      U moet administrator zijn om deze pagina te kunnen zien!
    </div>
  @else

    <h1>Rechten van alle medewerkers</h1>

    <table class='table'>
      <tr>
        <th></th>
        <th>Administrator</th>
        <th>Pas rechten aan</th>
      </tr>
      @foreach ( $users as $user )
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->admin == 1 ? 'Ja' : 'Nee' }}</td>
          @if($user == Auth::user())
            <td>Je kan je eigen rechten niet ontnemen.</td>
          @else
          <td>
            <form method='POST' action='/admin/admin-rights'>
              {{ csrf_field() }}
              <input type='hidden' name='user-id' value='{{ $user->id }}' />
              <button type='submit' class='btn btn-primary'>{{ $user->admin == 1 ? 'Ontneem' : 'Verleen' }}</button>
            </form>
          </td>
          @endif
        </tr>
	    @endforeach
    </table>
    {{ $users->links() }}

  @endguest


@endsection
