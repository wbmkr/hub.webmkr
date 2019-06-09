@extends('hub::layouts.admin')

@section('head')
  <title>{{ config('app.name') }} :: @lang('message.pages.settings.roles.new')</title>
@endsection

@section('content')
  <div class="section title-section">
    <div class="section d-flex align-items-center">
      <h1><span class="icon"><i class="fab fa-keycdn"></i></span>@lang('message.pages.settings.roles.new')</h1>
    </div>
  </div>

  <div class="section data-section">
    <form action="{{ route('admin.settings.roles.create') }}" method="POST" class="form-default">
      @csrf
      @include('hub::admin.settings.roles._form')

      <button type="submit" class="button button-primary">@lang('message.common.label.save')</button>
    </form>
  </div>
@endsection

@section('js')
  <script>
    $('#checkAll').on('change', function(){
      if ($(this).is(':checked')) {
        $(this).parent().find('.custom-control-label').text("{{ __('message.common.label.uncheck_all') }}");
        $(document).find('[name="role[permission][]"]').each(function(){
          $(this).attr('checked', true);
        });
      } else {
        $(this).parent().find('.custom-control-label').text("{{ __('message.common.label.check_all') }}");
        $('[name="role[permission]"]').attr('checked', false);
        $(document).find('[name="role[permission][]"]').each(function(){
          $(this).attr('checked', false);
        });
      }
    });
  </script>
@endsection