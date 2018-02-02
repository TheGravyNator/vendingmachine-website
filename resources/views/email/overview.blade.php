<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Overzicht Uitgaven 23G Frisdrankautomaat</title>
  </head>
  <body>
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
          <td>{{ $user->order['slot_1_orders'] + $user->order['slot_2_orders'] + $user->order['slot_3_orders'] + $user->order['slot_4_orders'] + $user->order['slot_5_orders'] }}</td>
          <td>{{ '€' . number_format($user->getTotalExpenses()/100, 2, '.', ' ')  }}</td>
        </tr>
	    @endforeach
    </table>
  </body>
</html>
