<input {{ $attributes->merge(['class' => 'form-control']) }}>
<div class="input-group-append">
    <div class="input-group-text">
        <span class="fas fa-{{ $attributes['icon'] }}"></span>
    </div>
</div>
