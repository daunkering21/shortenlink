@extends('layouts.main')
@section('container')
{{--  --}}
<div class="container-fluid p-3 min-vh-100">
    <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-4 ldlp05">
            <div class="card-body height70dvh">
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3 text-center">
                        <label for="username" class="form-label"><span class="text-secondary bold">Username/Email</span></label>
                        <input type="text" class="form-control text-center" id="username" name="user" placeholder='" Enter your username/email... "' required autofocus>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label"><span class="text-secondary bold">Password</span></label>
                        <input type="password" class="form-control text-center" id="password" name="password" placeholder='" Tell me your secret..  "' required>
                    </div>
                    <button type="submit" class="btn btn-purple">Submit</button>
                </form>
            </div>
            <div class="card-footer text-body-secondary text-center">
                Welcome to <span class="text-warning bold">Lov</span><span class="text-purple bold">Idea</span> Shorten link, we value your privacy.
            </div>
        </div>
    </div>
</div>
@foreach([
    'user',
    'password',
    'confirm_password',
] as $kalauError)
    @error($kalauError)
        <script>
            Swal.fire([
                text: '{{ $message }}',
                icon: 'error',
                confirmButtonText: 'OK',
            ]);
        </script>
    @enderror
@endforeach
@endsection