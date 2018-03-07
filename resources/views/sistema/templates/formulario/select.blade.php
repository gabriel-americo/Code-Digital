<label class="{{ $class ?? null }}">{{ $label ?? $select ?? "ERRO" }}</label>

{!! Form::select($select, $data ?? [], null, $attributes) !!}
