@extends('layouts.default')
@section('title', 'Login')

@section('content')
    <section class="register mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                @if (session()->has('loginFailed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginFailed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card p-4">
                    <div class="card-title">
                        <h3 class="text-center mb-5">Login</h3>
                    </div>
                    <form action="{{ route('store-login') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                        </div>
                    </form>
                    <a href="{{ route('view-register') }}" class="mt-3 text-center" style="text-decoration: none;">don't have an account, Register</a>
                </div>
            </div>
        </div>
    </section>
@endsection