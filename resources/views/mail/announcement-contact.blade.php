<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('ui.presto' ) }}</title>
</head>
<body>
    <div>
        <h1>{{ __('ui.userViewedAnnouncement') }}</h1>
        <h3>{{ __('ui.userData') }}</h3>
        <p>{{ __('ui.name') . ':' }} {{ $senderName }}</p>
        <p>{{ __('ui.email') . ':' }} {{ $senderEmail }}</p>

        <hr>
        
        <p>{{ __('ui.message') . ':' }} {{ $messageBody }}</p>

    </div>
    
</body>
</html>