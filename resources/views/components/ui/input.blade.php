<div class="form-group" style="margin-bottom: 15px;">
    @if($label)
        <label>{{ $label }}</label>
    @endif
    <input type="{{ $type }}" placeholder="{{ $placeholder }}" class="form-control" {{ $attributes }}>
</div>

@if($errors->has($name))
    <div class="bg-red-500/40 text-white p-2 rounded-md">
        @foreach($errors->get($name) as $error)
            <span>{{ $error }}</span>
        @endforeach
    </div>
@endif
