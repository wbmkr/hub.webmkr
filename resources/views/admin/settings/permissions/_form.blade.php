<div class="form-group">
  <label for="name" class="required">@lang('message.pages.settings.permissions.label.name')</label>
  <input type="text" name="name" id="name" value="{{ $permission->name }}" class="form-control">
  @if($errors->has('name')) <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div> @endif
</div>