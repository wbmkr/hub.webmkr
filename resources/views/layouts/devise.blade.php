<!DOCTYPE html>
<html lang="{{ config('app.name') }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/hub.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&display=swap" rel="stylesheet">
  @yield('head')
</head>
<body class="devise">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-9">
        <div class="section full-height image-holder"></div>
      </div>
      <div class="col-3">
        <div class="section full-height d-flex flex-column justify-content-between content">
          <div class="section header">
            <h1 class="text-right">{{ config('app.name') }}</h1>
          </div>
          <div class="section main">
            @yield('content')
          </div>
          <div class="section footer">
            <p class="mb-0"><small><strong>Atenção:</strong> Está area é restrita. Se você não é funcionário da {{ config('app.name') }} com nível de acesso, <a href="{{ route('root') }}" title="clique aqui">clique aqui</a> para voltar ao site.</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/hub.js') }}"></script>
</body>
</html>