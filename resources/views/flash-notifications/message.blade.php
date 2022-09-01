@if (session()->has('flash_notification.message'))
    <div class="col-md-12 pull-left alert alert-{{ session('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('flash_notification.message') !!}
    </div>
@endif