@extends('layouts.head')
@section('title')
ログイン
@endsection
<body class="text-center">
    <div style="margin-top:100px;"class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-4">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="alert alert-danger mb-3" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}" class="border bg-white rounded">
                    @csrf
                    <div class="mb-4 bg-primary p-3 text-white text-start rounded-top">
                            Login
                    </div>

                    <!-- Email Address -->
                    <div>
                        <i class="fa-sharp fa-solid fa-envelope"></i>
                        <x-input id="email" class="block ml-2 w-75 border-0 border-bottom border-3" type="email" name="email" :value="old('email')" placeholder="Email" required/>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <i class="fa-sharp fa-solid fa-lock"></i>
                        <x-input id="password" class="block ml-2 w-75 border-0 border-bottom border-3"
                                        type="password"
                                        name="password"
                                        placeholder="Password"
                                        required autocomplete="current-password" />
                    </div>
                        <div class="mt-4 d-flex justify-content-end p-3">
                        <x-button class="btn btn-primary mb-4">
                            {{ __('Log in') }}
                        </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<body>










        
