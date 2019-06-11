@extends('layouts.admin')

@section('head')
  <title>{{ config('app.name') }} :: @lang('message.pages.settings.admins.title')</title>
@endsection

@section('content')
  <div class="section title-section">
    <div class="section d-flex align-items-center">
      <h1 class="mr-auto"><span class="icon"><i class="fas fa-users"></i></span>@lang('message.pages.settings.admins.title')</h1>
      
      @can('criar-administrador')
        <a href="{{ route('admin.settings.admins.create') }}" class="button button-primary button-rounded mr-3" title="@lang('message.pages.settings.admins.new')">@lang('message.pages.settings.admins.new')</a>
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
      <h5 class="mb-4">{{ trans_choice('message.common.label.search_result', $admins->total(), ['total' => $admins->total()]) }}</h5>
    @endif
    <table class="table table-data">
      <thead>
        <tr>
          <th></th>
          <th>@lang('message.pages.settings.admins.label.name')</th>
          <th>@lang('message.pages.settings.admins.label.status')</th>
          <th>@lang('message.pages.settings.admins.label.email')</th>
          <th>@lang('message.pages.settings.admins.label.created_at')</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @unless ($admins->total() > 0)
          <tr>
            <td colspan="4" class="text-center">Sem registro</td>
          </tr>
        @endunless
        
        @if ($admins->total() > 0)
          @include('admin.settings.admins._list')
        @endif
        
      </tbody>

      @if ($admins->total() > 50)
        <tfoot>
          <tr>
            <th colspan="4" class="text-right">
              {{ $admins->links() }}
            </th>
          </tr>
        </tfoot>
      @endif
      
    </table>
  </div>
@endsection