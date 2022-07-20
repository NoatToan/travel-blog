<div class="alert alert-{{ $type ?? 'info' }} {{ $errors->any() && 'alert-danger'}} alert-dismissible fade show"
     role="alert">
    {{ $message }}
</div>
