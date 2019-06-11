@extends('layouts.admin')

@section('head')
  <title>{{ config('app.name') }} :: @lang('message.pages.settings.admins.new')</title>
@endsection

@section('content')
  <div class="section title-section">
    <div class="section d-flex align-items-center">
      <h1><span class="icon"><i class="fas fa-users"></i></span>@lang('message.pages.settings.admins.new')</h1>
    </div>
  </div>

  <div class="section data-section">
    <form action="{{ route('admin.settings.admins.create') }}" method="POST" class="form-default">
      @csrf
      @include('admin.settings.admins._form')
      <button type="submit" class="button button-primary">@lang('message.common.label.save')</button>
    </form>
  </div>
@endsection

@section('js')
  <script>
    $('#role').on('change', function(){
      var role = $(this).val();
      $.ajax({
        url: '/admin/resources/permissions/'+role+'/',
        error: function(data){
            $('.wrap-permissions').find('[name="admin[permission][]"]').attr('checked', false);
        },
        success: function(data){
          $.each(data, function(key, value){
            $('.wrap-permissions').find('[id="admin[permission]['+value.id+']"]').attr('checked', true);
          });
        }
      });
    });
  </script>
@endsection