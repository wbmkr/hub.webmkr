@extends('layouts.devise')

@section('head')
  <title>@lang('message.pages.auth.signin.meta_title', ['application' => config('app.name')])</title>
@endsection

@section('content')
  <h2>@lang('message.pages.auth.signin.title')</h2>
  <form action="{{ route('admin.auth.login') }}" method="post" class="form-default">
    @csrf
    <div class="form-group">
      <label for="email" class="required">@lang('message.form.label.email')</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
      @if($errors->has('email')) <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>  @endif
    </div>

    <div class="form-group">
      <label for="password" class="required">@lang('message.form.label.password')</label>
      <input type="password" name="password" id="password" class="form-control">
      @if($errors->has('password')) <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>  @endif
    </div>

    <div class="form-group custom-control custom-checkbox">
      <input type="checkbox" name="remember" id="remember" value="true" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
      <label for="remember" class="custom-control-label">@lang('message.form.label.remember')</label>
    </div>

    <button type="submit" class="button button-primary mb-3">@lang('message.form.label.signin')</button>
    <div class="clearfix"></div>
    <a href="{{ route('admin.auth.password.request') }}" title="@lang('message.form.label.forgot')">@lang('message.form.label.forgot')</a>
  </form>
@endsection