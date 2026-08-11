@extends('site.layout')
@section('title', 'Hoteis')
@section('content')


<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-4">Acessar Conta</h3>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Campo E-mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Senha -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Lembrar-me / Esqueci a senha -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Lembrar-me</label>
                            </div>
                            <a href="#" class="text-decoration-none small">Esqueceu a senha?</a>
                        </div>

                        <!-- Botão de Envio -->
                        <button type="submit" class="btn btn-primary w-100 py-2">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection