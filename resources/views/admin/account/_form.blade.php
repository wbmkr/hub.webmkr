<input type="hidden" name="active" value="{{ $admin->active }}">
<div class="row">
  <div class="col-3">
    <div class="form-group image-preview">
        <label for="avatar">@lang('message.pages.account.label.avatar')</label>
        <img src="{{ $admin->profile() }}" class="mb-3">
        <input type="file" name="avatar" id="avatar">
    </div>
  </div>

  <div class="col-9">
    <div class="row">
      <div class="col-9">
        <div class="form-group">
          <label for="name" class="required">@lang('message.pages.account.label.name')</label>
          <input type="text" name="name" id="name" value="{{ $admin->name }}" class="form-control">
          @if($errors->has('name')) <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div> @endif
        </div>
      </div>

      <div class="col-3">
        <div class="form-group">
          <label for="birthdate">@lang('message.pages.account.label.birthdate')</label>
          <input type="text" name="birthdate" id="birthdate" value="{{ $admin->birthdateForHuman() }}" class="form-control">
        </div>
      </div>

      <div class="col-4">
        <div class="form-group">
          <label for="email" class="required">@lang('message.pages.account.label.email')</label>
          <input type="email" name="email" id="email" value="{{ $admin->email }}" class="form-control">
          @if($errors->has('email')) <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div> @endif
        </div>
      </div>

      <div class="col-4">
        <div class="form-group">
          <label for="password">@lang('message.pages.account.label.password')</label>
          <input type="password" name="password" id="password" class="form-control">
          @if($errors->has('password')) <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div> @endif
        </div>
      </div>

      <div class="col-4">
        <div class="form-group">
          <label for="password_confirmation">@lang('message.pages.account.label.password_confirmation')</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
          @if($errors->has('password_confirmation')) <div class="invalid-feedback d-block">{{ $errors->first('password_confirmation') }}</div> @endif
        </div>
      </div>
    </div>
  </div>
</div>