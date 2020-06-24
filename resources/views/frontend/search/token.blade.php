@foreach($tokens as $token)

टोकन आईडी : {{ $token->id }}

काम : {{ $token->department_name }}

पालो मिति : {{ $token->date }}

समय: {{ $token->pretty_time_slot }}

-------------------------
@endforeach