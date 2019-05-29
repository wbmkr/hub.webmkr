@extends('hub::layouts.devise')

@section('head')
  <title>{{ config('app.name') }} :: Painel Administrativo | Login</title>
@endsection

@section('content')
  <form action="{{ route('admin.auth.login') }}" method="post" class="form-default">
    @csrf
    <div class="form-group">
      <label for="email" class="required">E-mail</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
      @if($errors->has('email')) <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>  @endif
    </div>

    <div class="form-group">
      <label for="password" class="required">Senha</label>
      <input type="password" name="password" id="password" class="form-control">
      @if($errors->has('password')) <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>  @endif
    </div>

    <div class="form-group custom-control custom-checkbox">
      <input type="checkbox" name="remember" id="remember" value="true" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
      <label for="remember" class="custom-control-label">Lembrar-me neste computador</label>
    </div>

    <button type="submit" class="button button-primary mb-3">Acessar</button>
    <div class="clearfix"></div>
    <a href="{{ route('admin.auth.password.request') }}" title="Esqueci minha senha">Esqueci minha senha</a>
  </form>
@endsection