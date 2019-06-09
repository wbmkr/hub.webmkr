@extends('hub::layouts.admin')

@section('head')
  <title>{{ config('app.name') }} :: @lang('message.pages.settings.roles.title')</title>
@endsection

@section('content')
  <div class="section title-section">
    <div class="section d-flex align-items-center">
      <h1><span class="icon"><i class="fas fa-user-tag"></i></span>@lang('message.pages.settings.roles.title')</h1>

      <a href="{{ route('admin.settings.roles.create') }}" class="button button-primary button-rounded ml-auto mr-3" title="@lang('message.pages.settings.roles.new')">@lang('message.pages.settings.roles.new')</a>
      <form action="" method="GET" class="form-search">
        <div class="input-group">
          <input type="text" name="query" id="query" value="{{ old('query') }}" class="form-control" placeholder="@lang('message.common.label.search')">
          <div class="input-group-append">
            <button type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="section data-section">
    @if (Request::get('query'))
      <h5 class="mb-4">{{ trans_choice('message.common.label.search_result', $roles->total(), ['total' => $roles->total()]) }}</h5>
    @endif
    <table class="table table-data">
      <thead>
        <tr>
          <th></th>
          <th>@lang('message.pages.settings.roles.label.name')</th>
          <th>@lang('message.pages.settings.roles.label.created_at')</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @unless ($roles->total() > 0)
          <tr>
            <td colspan="4" class="text-center">Sem registro</td>
          </tr>
        @endunless
        
        @if ($roles->total() > 0)
          @include('admin.settings.roles._list')
        @endif
        
      </tbody>

      @if ($roles->total() > 50)
        <tfoot>
          <tr>
            <th colspan="4" class="text-right">
              {{ $roles->links() }}
            </th>
          </tr>
        </tfoot>
      @endif
      
    </table>
  </div>
@endsection