@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'flex items-center justify-center font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif
