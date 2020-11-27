@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@elseif(session('number'))
<div class="alert alert-danger">
    You must login first to proceed please.
</div>  
@endif