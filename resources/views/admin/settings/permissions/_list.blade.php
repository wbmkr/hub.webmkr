@foreach ($permissions as $item)
  <tr>
    <td class="row-id">{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
    <td class="row-action">
      @can('editar-permissao')
        <a href="{{ route('admin.settings.permissions.edit', $item->slug) }}" title="@lang('message.pages.settings.permissions.edit')"><i class="far fa-edit"></i></a>
      @endcan

      @can('deletar-permissao')
        <a href="{{ route('admin.settings.permissions.delete', $item->slug) }}" title="@lang('message.pages.settings.permissions.delete')" onclick="return confirm('{{ __('message.pages.settings.permissions.action.delete', ['permission' => $item->name]) }}')"><i class="far fa-trash-alt"></i></a>
      @endcan
    </td>
  </tr>
@endforeach