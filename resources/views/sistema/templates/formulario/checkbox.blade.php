@php

$attributes['placeholder'] = $attributes['placeholder'] ?? $label;

@endphp

<label class="mt-checkbox mt-checkbox-outline">{{ $label ?? $input ?? "ERRO" }}

    {!! Form::checkbox($checkbox, $value ?? null, $attributes) !!}
    <span></span>
</label>