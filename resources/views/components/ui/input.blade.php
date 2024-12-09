<div class="flex flex-col">
    @if($label)
        <label class="text-gray-800 text-sm">{{ $label }}</label>
    @endif
    <input class="p-2 rounded-md border border-gray-200" type="{{ $type }}" placeholder="{{ $placeholder }}" {{ $attributes }}>
</div>

@if($errors->has($name))
    <div class="bg-red-500/40 text-white p-2 rounded-md">
        @foreach($errors->get($name) as $error)
            <span>{{ $error }}</span>
        @endforeach
    </div>
@endif
