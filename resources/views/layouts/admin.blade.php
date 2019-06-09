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
<body class="admin">
  @include('hub::layouts._alerts')
  <div class="wrap">
    <div class="section header">
      <div class="section d-flex">
        <div class="section side">
          <a href="{{ route('admin.dashboard') }}" title="{{ config('app.name') }}"><i class="fas fa-dharmachakra"></i></a>
        </div>
        <div class="section content d-flex justify-content-center align-items-center">
          <div class="dropdown ml-auto">
            <button class="dropdown-toggle" type="button" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon"><img src="{{ Auth::guard('admin')->user()->profile() }}" alt="{{ Auth::guard('admin')->user()->name }}"></span>{{ Auth::guard('admin')->user()->name }} <span class="badge badge-dark text-uppercase">{{ Auth::guard('admin')->user()->roles->first->name }}</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownProfile">
              <a class="dropdown-item" href="{{ route('root') }}" title="@lang('message.navigation.header.view_website')" target="_blank">@lang('message.navigation.header.view_website')</a>
              <a class="dropdown-item" href="#" title="@lang('message.navigation.header.edit_profile')">@lang('message.navigation.header.edit_profile')</a>
              <a class="dropdown-item" href="{{ route('admin.auth.logout') }}" title="@lang('message.navigation.header.logout')">@lang('message.navigation.header.logout')</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section main">
      <div class="section d-flex">
        <div class="section side main-heigth">
          <div class="section d-flex flex-column justify-content-center main-height">
            <ul class="nav flex-column">
              <li class="nav-item {{ active('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link" title="@lang('message.navigation.main.dashboard')" data-toggle="tooltip" data-placement="right"><i class="fas fa-home"></i></a>
              </li>
              <li class="nav-item dropup {{ active('admin.settings.*') }}">
                <a href="#" class="nav-link dropdown-toggle" title="@lang('message.navigation.main.settings.title')" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropSettings"><i class="fas fa-cog"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropSettings">
                  <a href="{{ route('admin.settings.permissions.index') }}" class="dropdown-item" title="@lang('message.navigation.main.settings.permissions')">@lang('message.navigation.main.settings.permissions')</a>
                  <a href="{{ route('admin.settings.roles.index') }}" class="dropdown-item" title="@lang('message.navigation.main.settings.roles')">@lang('message.navigation.main.settings.roles')</a>
                  <a href="{{ route('admin.settings.admins.index') }}" class="dropdown-item" title="@lang('message.navigation.main.settings.admins')">@lang('message.navigation.main.settings.admins')</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="section content main-height">@yield('content')</div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/hub.js') }}"></script>
  @yield('js')
</body>
</html>