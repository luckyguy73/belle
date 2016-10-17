@if($user->social->count() > 1) 

    <p>You have linked the following accounts with us:</p>
    <ul>
        
        @foreach($user->social as $social)
        <li>
            {{ config("social.services.{$social->service}.name") }}
        </li>
        @endforeach
    </ul>
@endif
