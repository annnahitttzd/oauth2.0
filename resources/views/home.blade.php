<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet"/>
    <title>Logout</title>
</head>
<style>
    body{
    width: 100%;
    height: 60vh;
    display: flex;
    justify-content: center;
    align-items: center;
    }
</style>
<body>
<div>
<button type="button" class="btn btn-primary btn-block mb-4" style="width: 30%"><a href="{{route('logout.google')}}" style="color: #1a202c">Log Out</a></button>

    @if(isset($authMethod))
    @if($authMethod === 'google')
        <h2>Welcome, {{ $userEmail }} </h2>
    @elseif($authMethod === 'manual')
        <h2>Welcome, {{ Auth::user()->email }} </h2>
    @elseif($authMethod === 'registration')
        <h2>Welcome, {{$user['email']}}</h2>

    @endif
    @endif

</div>
</body>
