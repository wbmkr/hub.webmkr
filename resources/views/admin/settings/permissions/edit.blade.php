@extends('hub::layouts.admin')

@section('head')
  <title>{{ config('app.name') }} :: @lang('message.pages.settings.permissions.edit')</title>
@endsection

@section('content')
  <div class="section title-section">
    <div class="section d-flex align-items-center">
      <h1><span class="icon"><i class="fab fa-keycdn"></i></span>@lang('message.pages.settings.permissions.edit')</h1>
    </div>
  </div>

  <div class="section data-section">
    <form action="{{ route('admin.settings.permissions.edit', $permission->slug) }}" method="POST" class="form-default">
      @csrf
      <div class="form-group">
        <label for="name" class="required">@lang('message.pages.settings.permissions.label.name')</label>
        <input type="text" name="name" id="name" value="{{ $permission->name }}" class="form-control">
        @if($errors->has('name')) <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div> @endif
      </div>

      <button type="submit" class="button button-primary">@lang('message.common.label.save')</button>
    </form>
  </div>
@endsection