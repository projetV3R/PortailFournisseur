<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  @vite('resources/css/app.css') 
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/apple-icon-72x72.png') }}"/>
</head>

<body>
    <!-- HEADER -->
    <header>      
    </header>

    @yield('contenu')

</body>
</html>
