@extends('hub::layouts.devise')

@section('head')
  <title>@lang('message.pages.auth.passwords.reset.meta_title', ['application' => config('app.name')])</title>
@endsection

@section('content')
  <h2>@lang('message.pages.auth.passwords.reset.title')</h2>
  <form action="{{ route('admin.auth.password.update') }}" method="post" class="form-default">
    @csrf
    <input type="hidden" name="token" id="token" value="{{ $token }}">
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

    <div class="form-group">
      <label for="password_confirmation" class="required">@lang('message.form.label.password_confirmation')</label>
      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
      @if($errors->has('password_confirmation')) <div class="invalid-feedback d-block">{{ $errors->first('password_confirmation') }}</div>  @endif
    </div>

    <button type="submit" class="button button-primary mb-3">@lang('message.form.label.reset')</button>
    <div class="clearfix"></div>
  </form>
@endsection