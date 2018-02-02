@extends('layouts.page')

@section('content')

  @include('layouts.nav-admin')

  @guest
    
    <div class="alert alert-danger" role="alert">
      U moet administrator zijn om deze pagina te kunnen zien!
    </div>

  @else

    <h1>Administratie panel</h1>

    <div class="alert alert-info" role="alert">
      Op deze pagina kunt u het frisdrankautomaat gebruik modereren. Er is een overzicht van de uitgaven van alle medewerkers en een lijst met gebruikers, waarmee u administrator rechten kan verlenen.
    </div>

  @endguest


@endsection
