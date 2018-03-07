@php

$attributes['placeholder'] = $attributes['placeholder'] ?? $label;

@endphp

<label class="{{ $class ?? null }}">{{ $label ?? $input ?? "ERRO" }}</label>

{!! Form::text($input, $value ?? null, $attributes) !!}
