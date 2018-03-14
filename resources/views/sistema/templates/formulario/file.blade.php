@php

$attributes['placeholder'] = $attributes['placeholder'] ?? $label;

@endphp

<label class="">{{ $label ?? $input ?? "ERRO" }}</label>

{!! Form::file($file, $value ?? null, $attributes) !!}

<p class="help-block"> {{ $note  }} </p>