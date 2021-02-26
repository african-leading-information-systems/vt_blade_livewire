<x-auth-layout>
    <x-ui.auth-card class="register-card-body">
        <x-slot name="title">
            Register a new membership
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group mb-3">
                <x-ui.forms.auth-input id="name" placeholder="Votre nom et prénom" type="text" name="name" value="{{ old('name') }}"
                                       required autocomplete="name" autofocus icon="user" />
                <x-ui.forms.error name="name" />
            </div>
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
            <div class="input-group mb-3">
                <x-ui.forms.auth-input id="password-confirm" placeholder="Entre votre mot de passe" type="password" name="password_confirmation"
                                       required autocomplete="password-confirm" icon="lock" />
                <x-ui.forms.error name="password_confirmation" />
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-5">
                    <x-ui.forms.button type="submit" class="btn-primary btn-block">
                        S'enregister
                    </x-ui.forms.button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </x-ui.auth-card>
</x-auth-layout>
