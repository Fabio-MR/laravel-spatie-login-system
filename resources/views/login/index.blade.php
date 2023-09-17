@extends('layouts.app')
@section('content')
    <div class="col-md-6 mx-auto">
        <div class="align-self-center">
            <div class="card ">
                <div class="card-header text-center">
                    <h1>LOGIN</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        @error('error')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id=""
                                aria-describedby="emailHelpId" placeholder="abc@mail.com">
                            @error('email')
                                <small id="emailHelpId" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="">
                            @error('password')
                                <small id="" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">

                    <a href="{{ route('register.index') }}">Criar conta</a>
                </div>
            </div>
        </div>
    </div>
@endsection
