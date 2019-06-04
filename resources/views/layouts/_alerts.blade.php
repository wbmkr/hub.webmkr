<div class="alerts">
  @if (session('success'))
    <div class="section alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle"></i>
      <strong>@lang('message.alerts.success')!</strong><br>
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  
  @if (session('error'))
    <div class="section alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-circle"></i>
      <strong>@lang('message.alerts.error')!</strong><br>
      {{ session('error') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  
  @if (session('info'))
    <div class="section alert alert-info alert-dismissible fade show" role="alert">
      <i class="fas fa-info-circle"></i>
      <strong>@lang('message.alerts.info')!</strong><br>
      {{ session('info') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @if (session('status'))
    <div class="section alert alert-info alert-dismissible fade show" role="alert">
      <i class="fas fa-info-circle"></i>
      <strong>@lang('message.alerts.info')!</strong><br>
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @if (session('warning'))
    <div class="section alert alert-warning alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-triangle"></i>
      <strong>@lang('message.alerts.warning')!</strong><br>
      {{ session('warning') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>