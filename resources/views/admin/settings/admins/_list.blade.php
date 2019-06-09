@foreach ($admins as $item)
  <tr>
    <td class="row-id">{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td><span class="badge badge-{{ $item->active ? 'success' : 'danger' }}">{{ $item->active ? 'Ativo' : 'Inativo' }}</span></td>
    <td>{{ $item->email }}</td>
    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
    <td class="row-action">
      @if (Auth::guard('admin')->user()->id !== $item->id)
        @can('editar-administrador', Model::class)
          <a href="{{ route('admin.settings.admins.edit', $item->slug) }}" title="@lang('message.pages.settings.admins.edit')"><i class="far fa-edit"></i></a>
        @endcan
        
        @can('deletar-administrador', Model::class)
          <a href="{{ route('admin.settings.admins.delete', $item->slug) }}" title="@lang('message.pages.settings.admins.delete')" onclick="return confirm('{{ __('message.pages.settings.admins.action.delete', ['admin' => $item->name]) }}')"><i class="far fa-trash-alt"></i></a>
        @endcan
      @endif
    </td>
  </tr>
@endforeach