<select {{ $attributes }}>
    <option value="">{{ $placeholder ?? 'Select an option' }}</option>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>