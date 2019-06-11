<!DOCTYPE html>
<html lang="{{ config('app.faker_locale') }}">
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
  @include('layouts._alerts')
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
            <p class="mb-0"><small><strong>@lang('message.common.label.caution_label'):</strong> @lang('message.common.label.caution_message', ['application' => config('app.name')])</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/hub.js') }}"></script>
</body>
</html>