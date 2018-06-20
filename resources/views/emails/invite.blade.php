<p>Beste,{{$user1name}}</p>

<p>u bent uitgenodigd om deel te nemen aan de groep genaamd {{$groupname}}. {{$user2name}} is de beheerder van deze groep. Druk op deze link om de uitnodiging te accepteren</p>

<a href="{{ route('accept', $invite->token) }}">Klik hier</a> om deel te nemen!

Met vriendelijke groet,

het development team van kit 2.0 