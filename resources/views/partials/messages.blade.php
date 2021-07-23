<!--
    @if (Session::has('save'))
<div class="alert alert-solid-success" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ Session::get('save') }}</strong>
</div>
@endif
@if (Session::has('update'))
<div class="alert alert-solid-primary" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ Session::get('update') }}</strong>
</div>
@endif
@if (Session::has('delete'))
<div class="alert alert-solid-danger" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&timesbar;</a>
    <strong>{{ Session::get('delete') }}</strong>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-solid-secondary" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&timesbar;</a>
    <strong>{{ Session::get('error') }}</strong>
</div>
@endif

@if (Session::has('validacion'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&timesbar;</a>
    <strong>{{ Session::get('validacion') }}</strong>
</div>
@endif
-->
