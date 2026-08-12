@extends('site.layout')
@section('title', 'Hoteis')
@section('content')

<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3 center-align">
            <h4 class="indigo-text text-darken-4" style="font-weight: 700; margin-bottom: 5px;">
                Acessar o Sistema
            </h4>
            <p class="grey-text text-darken-1" style="font-size: 1.1rem; margin-top: 0;">
                Informe suas credenciais para gerenciar os hotéis e reservas.
            </p>    
        </div>
    </div>

    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card white hoverable" style="border-top: 4px solid #1a237e; border-radius: 4px;">
                <div class="card-content grey-text text-darken-3">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="input-field">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="@error('email') invalid @enderror" required autofocus>
                            <label for="email">E-mail</label>
                            @error('email')
                                <span class="helper-text red-text" data-error="wrong">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-field">
                            <input id="password" type="password" name="password" class="@error('password') invalid @enderror" required>
                            <label for="password">Senha</label>
                            @error('password')
                                <span class="helper-text red-text" data-error="wrong">{{ $message }}</span>
                            @enderror
                        </div>

                        <p style="margin-top: 20px; margin-bottom: 20px;">
                            <label>
                                <input type="checkbox" name="remember" class="filled-in" />
                                <span>Lembrar-me</span>
                            </label>
                        </p>

                        <button type="submit" class="btn indigo waves-effect waves-light w-100" style="width: 100%; font-weight: 600;">
                            Entrar
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>    
</div>

@endsection

<style>
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
        border-bottom: 1px solid #1a237e !important;
        box-shadow: 0 1px 0 0 #1a237e !important;
    }

    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
        color: #1a237e !important;
    }
</style>