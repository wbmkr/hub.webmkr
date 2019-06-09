@extends('hub::layouts.admin')

@section('head')
  <title>{{ config('app.name') }} :: @lang('message.pages.settings.permissions.title')</title>
@endsection

@section('content')
  <div class="section title-section">
    <div class="section d-flex align-items-center">
      <h1 class="mr-auto"><span class="icon"><i class="fab fa-keycdn"></i></span>@lang('message.pages.settings.permissions.title')</h1>

      @can('criar-permissao')
        <a href="{{ route('admin.settings.permissions.create') }}" class="button button-primary button-rounded ml-auto mr-3" title="@lang('message.pages.settings.permissions.new')">@lang('message.pages.settings.permissions.new')</a>
      @endcan
      
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
      <h5 class="mb-4">{{ trans_choice('message.common.label.search_result', $permissions->total(), ['total' => $permissions->total()]) }}</h5>
    @endif
    <table class="table table-data">
      <thead>
        <tr>
          <th></th>
          <th>@lang('message.pages.settings.permissions.label.name')</th>
          <th>@lang('message.pages.settings.permissions.label.created_at')</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @unless ($permissions->total() > 0)
          <tr>
            <td colspan="4" class="text-center">Sem registro</td>
          </tr>
        @endunless
        
        @if ($permissions->total() > 0)
          @include('admin.settings.permissions._list')
        @endif
        
      </tbody>

      @if ($permissions->total() > 50)
        <tfoot>
          <tr>
            <th colspan="4" class="text-right">
              {{ $permissions->links() }}
            </th>
          </tr>
        </tfoot>
      @endif
      
    </table>
  </div>
@endsection