@extends('layouts.default')
@section('title', 'Register')

@section('content')
    <section class="register mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card p-4">
                    <div class="card-title">
                        <h3 class="text-center mb-5">Register</h3>
                    </div>
                    <form action="{{ route('store-register') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="name" class="form-label">Fullname</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                        </div>
                    </form>
                    <a href="{{ route('view-login') }}" class="mt-3 text-center" style="text-decoration: none;">have an account, sign in</a>
                </div>
            </div>
        </div>
    </section>
@endsection