@extends('hub::layouts.admin')

@section('head')
  <title>{{ config('app.name') }} :: @lang('message.pages.account.edit')</title>
@endsection

@section('content')
  <div class="section title-section">
    <div class="section d-flex align-items-center">
      <h1><span class="icon"><i class="fas fa-user"></i></span>@lang('message.pages.account.edit')</h1>
    </div>
  </div>

  <div class="section data-section">
    <form action="{{ route('admin.account') }}" method="POST" class="form-default" enctype="multipart/form-data">
      @csrf
      @include('hub::admin.account._form')
      <button type="submit" class="button button-primary">@lang('message.common.label.save')</button>
    </form>
  </div>
@endsection

@section('js')
  <script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('.image-preview img').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $(".image-preview input:file").change(function() {
    readURL(this);
  });
  </script>
@endsection