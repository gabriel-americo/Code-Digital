@php

$attributes['placeholder'] = $attributes['placeholder'] ?? $label;

@endphp

<label class="{{ $class ?? null }}">{{ $label ?? $text ?? "ERRO" }}</label>

{!! Form::textarea($text, $value ?? null, $attributes) !!}
