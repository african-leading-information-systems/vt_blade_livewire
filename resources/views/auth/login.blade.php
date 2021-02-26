<x-auth-layout>
    <x-ui.auth-card class="login-card-body">
        <x-slot name="title">
            Sign in to start your session
        </x-slot>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
                <x-ui.forms.auth-input id="email" placeholder="Votre adresse email" type="email" name="email" value="{{ old('email') }}"
                                       required autocomplete="email" autofocus icon="envelope" />
                <x-ui.forms.error name="email" />
            </div>
            <div class="input-group mb-3">
                <x-ui.forms.auth-input id="password" placeholder="Entre votre mot de passe" type="password" name="password"
                                       required autocomplete="current-password" icon="lock" />
                <x-ui.forms.error name="password" />
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="icheck-primary">
                        <x-ui.forms.checkbox type="checkbox" name="remember" id="remember" checked="{{ old('remember') }}" />
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-5">
                    <x-ui.forms.button type="submit" class="btn-primary btn-block">
                        Se connecter
                    </x-ui.forms.button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <hr>
        @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">I forgot my password</a>
            </p>
        @endif
        @if (Route::has('register'))
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p>
        @endif
    </x-ui.auth-card>
</x-auth-layout>
