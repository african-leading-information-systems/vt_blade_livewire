<x-auth-layout>
    <x-ui.auth-card class="login-card-body">
        <x-slot name="title">
            Réinitialisez votre mot de passe
        </x-slot>
        <form method="POST" action="{{ route('password.email') }}">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @csrf
            <div class="input-group mb-3">
                <x-ui.forms.auth-input id="email" placeholder="Votre adresse email" type="email" name="email" value="{{ old('email') }}"
                                       required autocomplete="email" autofocus icon="envelope" />
                <x-ui.forms.error name="email" />
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <x-ui.forms.button type="submit" class="btn-primary btn-block">
                        Envoyer le lien de reset
                    </x-ui.forms.button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <hr>
        @if (Route::has('login'))
            <p class="mb-1">
                <a href="{{ route('login') }}">Je me souviens de mon mot de passe</a>
            </p>
        @endif
    </x-ui.auth-card>
</x-auth-layout>
