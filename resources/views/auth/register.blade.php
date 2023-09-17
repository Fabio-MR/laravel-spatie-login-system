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
                                <p class="text-white">Te uma conta?<br>
                                    <a class="btn btn-outline-light mt-2 px-4" href="{{ route('login') }}">Login</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-7 d-flex flex-center">
                            <div class="p-4 p-md-5 flex-grow-1">
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <h3>Criar uma conta</h3>
                                    </div>
                                </div>

                                <form action="{{ route('register.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder=""
                                            value="{{ old('name') }}"> <!-- Use o valor antigo (old) para preencher o campo -->
                                        @error('name')
                                            <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                                            placeholder="abc@mail.com" value="{{ old('email') }}"> <!-- Use o valor antigo (old) para preencher o campo -->
                                        @error('email')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="row gx-2">
                                        <div class="mb-3 col-sm-6">
                                            <label for="password" class="form-label">Senha</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="">
                                        </div>
                                
                                        <div class="mb-3 col-sm-6">
                                            <label for="password_confirmation" class="form-label">Confirmar senha</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @error('password')
                                            <small id="passwordHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="card-register-checkbox">
                                        <label class="form-check-label" for="card-register-checkbox">
                                            Concordo com os <a href="#!">termos </a>e a <a class="white-space-nowrap" href="#!">política de privacidade</a>
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary d-block w-100 mt-3">Criar conta</button>
                                    </div>
                                </form>
                                

                                <hr>
                                <div class="text-white text-center">Ja tem uma conta?<br>
                                    <a class="text-decoration-underline link-light"
                                        href="{{ route('login') }}">Entrar!</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
