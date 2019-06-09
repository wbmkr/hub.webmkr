<div class="form-group">
  <label for="name" class="required">@lang('message.pages.settings.roles.label.name')</label>
  <input type="text" name="name" id="name" value="{{ $role->name }}" class="form-control">
  @if($errors->has('name')) <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div> @endif
</div>

<div class="form-group">
  <label for="permissions" class="required">@lang('message.pages.settings.roles.label.permissions')</label>
  <div class="custom-control custom-checkbox mb-2">
    <input type="checkbox" name="checkAll" id="checkAll" class="custom-control-input">
    <label for="checkAll" class="custom-control-label">@lang('message.common.label.check_all')</label>
  </div>
  <div class="row">
    @foreach ($permissions as $key => $permission)
      <div class="col-3 mt-1 mb-1">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="role[permission][]" id="role[permission][{{ $key }}]" value="{{ $key }}" class="custom-control-input" {{ $role->permissions->contains('id', $key) ? 'checked' : '' }}>
          <label for="role[permission][{{ $key }}]" class="custom-control-label">{{ $permission }}</label>
        </div>
      </div>
    @endforeach
  </div>
  @if($errors->has('role.permission')) <div class="invalid-feedback d-block">{{ $errors->first('role.permission') }}</div> @endif
</div>