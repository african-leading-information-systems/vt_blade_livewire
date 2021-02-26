@props(['checked' => false ])
<input {{ $attributes->merge(['class' => 'form-check-input']) }} @if($checked) checked @endif>
