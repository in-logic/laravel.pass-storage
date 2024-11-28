<form method="{{ $method ?? 'POST' }}" {{ $attributes }}>
    @csrf
    {{ $slot }}
</form>
