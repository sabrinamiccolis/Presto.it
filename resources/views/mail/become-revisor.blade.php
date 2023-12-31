<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('ui.presto' ) }}</title>
    <style>
    .button-mail {
        background-color: #9fe93f;
        padding: 5px;
        border-radius: 9999px;
        color: #1f2426;
        text-align: center;
        text-transform: uppercase;
        text-decoration: none;
    }
    .button-mail:hover {
        background-color: #defb06;
    }
    </style>
</head>
<body>
    <div>
        <h1>{{ __('ui.userRevisorRequest') }}</h1>
        <h3>{{ __('ui.userData') }}</h3>
        <p>{{ __('ui.name') . ':' }} {{ $user->name }}</p>
        <p>{{ __('ui.email') . ':' }} {{ $user->email }}</p>
        <p>{{ __('ui.birthDate'). ':' }} {{ $user->birthday }}</p>
        <p>{{ __('ui.city') . ':' }} {{ $user->city.' '.$user->prov }}</p>

        <p>{{ __('ui.message') . ':' }} {{ $description }}</p>
        <hr>
        <h3>{{ __('ui.acceptRequest') }}</h3>
        <a class="button-mail" href="{{ route('makeRevisor', compact('user')) }}">{{ __('ui.clickHere') }}</a>
    </div>
    
</body>
</html>