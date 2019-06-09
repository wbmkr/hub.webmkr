<div class="row">
  <div class="col-6">
    <div class="form-group">
      <label for="name" class="required">@lang('message.pages.settings.admins.label.name')</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}">
      @if($errors->has('name')) <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div> @endif
    </div>
  </div>

  <div class="col-3">
    <div class="form-group">
      <label for="email" class="required">@lang('message.pages.settings.admins.label.email')</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ $admin->email }}">
      @if($errors->has('email')) <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div> @endif
    </div>
  </div>

  <div class="col-3">
    <div class="form-group">
      <label for="role" class="required">@lang('message.pages.settings.admins.label.role')</label>
      <select name="role" id="role" class="form-control">
        <option value="">Selecione</option>
        @foreach ($roles as $key => $role)
          <option value="{{ $key }}" {{ $admin->roles->contains('id', $key) ? 'selected' : '' }}>{{ $role }}</option>
        @endforeach
      </select>
      @if($errors->has('role')) <div class="invalid-feedback d-block">{{ $errors->first('role') }}</div> @endif
    </div>
  </div>
</div>

<div class="form-group">
  <label for="permissions" class="required">@lang('message.pages.settings.admins.label.permissions')</label>
  <div class="row wrap-permissions">
    @foreach ($permissions as $key => $permission)
      <div class="col-3 mt-1 mb-1">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="admin[permission][]" id="admin[permission][{{ $key }}]" value="{{ $key }}" class="custom-control-input" {{ $admin->permissions->contains('id', $key) ? 'checked' : '' }}>
          <label for="admin[permission][{{ $key }}]" class="custom-control-label">{{ $permission }}</label>
        </div>
      </div>
    @endforeach
  </div>
  @if($errors->has('admin.permission')) <div class="invalid-feedback d-block">{{ $errors->first('admin.permission') }}</div> @endif
</div>

<div class="form-group custom-control custom-checkbox">
  <input type="checkbox" name="active" id="active" class="custom-control-input" {{ $admin->exists ? ($admin->active ? 'checked' : '') : 'checked' }} value="true">
  <label for="active" class="custom-control-label">@lang('message.pages.settings.admins.label.active')</label>
</div>