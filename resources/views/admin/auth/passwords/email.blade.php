@extends('hub::layouts.devise')

@section('head')
  <title>@lang('message.pages.auth.passwords.forgot.meta_title', ['application' => config('app.name')])</title>
@endsection

@section('content')
  <h2>@lang('message.pages.auth.passwords.forgot.title')</h2>
  <p>@lang('message.pages.auth.passwords.forgot.instruction')</p>
  <form action="{{ route('admin.auth.password.email') }}" method="post" class="form-default">
    @csrf
    <div class="form-group">
      <label for="email" class="required">@lang('message.form.label.email')</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
      @if($errors->has('email')) <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>  @endif
    </div>
    <button type="submit" class="button button-primary mb-3">@lang('message.form.label.send_link')</button>
    <div class="clearfix"></div>
  </form>
@endsection