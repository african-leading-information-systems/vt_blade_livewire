<div {{ $attributes->merge(['class' => 'card-body']) }}>
    <p class="login-box-msg">{{ $title }}</p>
    {{ $slot }}
</div>
