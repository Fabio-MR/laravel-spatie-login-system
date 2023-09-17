@extends('layouts.auth.app')
@section('content')
    <div class="row min-vh-100 flex-center g-0">
        <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
                src="{{ asset('assets/img/bg-shape.png') }}" alt="" width="250"><img class="bg-auth-circle-shape-2"
                src="{{ asset('assets/img/shape-1.png') }}" alt="" width="150">
            <div class="card overflow-hidden z-1">
                <div class="card-body p-0">
                    <div class="row g-0 h-100">
                        <div class="col-md-5 text-center bg-card-gradient">
                            <div class="position-relative p-4 pt-md-5 pb-md-7" data-bs-theme="light">
                                <div class="bg-holder bg-auth-card-shape"
                                    style="background-image:url({{ asset('assets/img/half-circle.png') }});">
                                </div><!--/.bg-holder-->
                                <div class="z-1 position-relative">
                                    <h2 class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder">
                                        Lorem ipsum</h2>
                                    <p class="opacity-75 text-white">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Phasellus pretium pretium tincidunt. Maecenas id
                                        porttitor neque. Cras risus augue, consectetur quis placerat ac,
                                        molestie porttitor orci. </p>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 mt-md-4 mb-md-5" data-bs-theme="light">
                                <p class="text-white">Não tem uma conta?<br>
                                    <a class="text-decoration-underline link-light"
                                        href="{{ route('register.index') }}">Comece agora!</a>
                                </p>

                                <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">Leia
                                    nossos <a class="text-decoration-underline text-white" href="#!">termos</a> e
                                    <a class="text-decoration-underline text-white" href="#!">condições</a>.
                                </p>
                            </div>

                        </div>
                        <div class="col-md-7 d-flex flex-center">
                            <div class="p-4 p-md-5 flex-grow-1">
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <h3>Login</h3>
                                    </div>
                                </div>

                                <form action="{{ route('login.store') }}" method="POST">
                                    @csrf

                                    @error('error')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="user@mail.com" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" id="password" placeholder="password" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rememberMe"
                                                    checked="checked">
                                                <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a class="fs--1" href="#">Esqueceu a senha?</a>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary d-block w-100 mt-3">Entrar</button>
                                    </div>
                                </form>

                                <hr>
                                <div class="text-white text-center">Não tem uma conta?<br>
                                    <a class="text-decoration-underline link-light"
                                        href="{{ route('register.index') }}">Comece agora!</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
