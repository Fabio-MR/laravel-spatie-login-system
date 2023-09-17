@extends('layouts.app')
@section('content')
    <div class="col-md-6 mx-auto">
        <div class="align-self-center">
            <div class="card ">
                <div class="card-header text-center">
                    <h1>REGISTER</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nome</label>
                            <input type="name" class="form-control" name="name" id="name" placeholder="">
                            @error('name')
                                <small id="" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelpId" placeholder="abc@mail.com">
                            @error('email')
                                <small id="" class="form-text text-muted">{{ $message }}</small>
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
                            <button type="submit" class="btn btn-primary w-100">Criar conta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
