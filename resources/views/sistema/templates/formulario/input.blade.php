@php

$attributes['placeholder'] = $attributes['placeholder'] ?? $label;

@endphp

@if(!empty($label))
<label class="{{ $class ?? null }}">{{ $label ?? $input ?? "ERRO" }}</label>
@endif

{!! Form::text($input, $value ?? null, $attributes) !!}
