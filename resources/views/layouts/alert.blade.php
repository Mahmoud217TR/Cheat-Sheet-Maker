<div class="alert floating-message alert-{{ session()->get('alert-type') }}" role="alert">
    <strong>{{ session()->get('alert-title') }}</strong>, {{ session()->get('alert-message') }}
</div>
