@extends('layouts.auth')
@push('title', 'Reguster Now')
@section('content')
    <section class="bg-light">
        <div class="d-flex flex-column align-items-center justify-content-center px-6 py-8 mx-auto col-md-6"
            style="min-height: 90vh"> <a href="#"
                class="d-flex align-items-center mb-6 h3 fw-semibold text-dark text-decoration-none">
                {{ config('app.name') }}
            </a>
            <div class="w-100 bg-white rounded-3 shadow-sm border p-4 p-sm-5">
                <div class="space-y-4">
                    <h1 class="h3 fw-bold text-dark">
                        Sign up for new account
                    </h1>
                    <form class="space-y-4" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Full Name</label>
                            <input type="name" name="name" id="name" class="form-control"
                                placeholder="Example Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="name@company.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Sign in</button>
                        </div>
                        <p class="text-center text-muted mt-3">
                            Have an account yet? <a href="{{ route('login') }}"
                                class="fw-medium text-primary text-decoration-none">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
