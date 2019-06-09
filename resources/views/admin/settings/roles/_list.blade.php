@foreach ($roles as $item)
  <tr>
    <td class="row-id">{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
    <td class="row-action">
      @can('editar-cargo')
        <a href="{{ route('admin.settings.roles.edit', $item->slug) }}" title="@lang('message.pages.settings.roles.edit')"><i class="far fa-edit"></i></a>
      @endcan
      
      @can('deletar-cargo')
        <a href="{{ route('admin.settings.roles.delete', $item->slug) }}" title="@lang('message.pages.settings.roles.delete')" onclick="return confirm('{{ __('message.pages.settings.roles.action.delete', ['role' => $item->name]) }}')"><i class="far fa-trash-alt"></i></a>
      @endcan
    </td>
  </tr>
@endforeach