@extends('layouts.main')
@section('container')
<div class="container-fluid p-3 min-vh-100">
    <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-4 ldlp06">
            <div class="card-body height70dvh">
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3 text-center">
                        <label for="name" class="form-label"><span class="text-secondary bold">Name</span></label>
                        <input type="text" class="form-control text-center" id="name" name="name" placeholder='" John/Jane Doe... "' value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="username" class="form-label"><span class="text-secondary bold">Username</span></label>
                        <input type="text" class="form-control text-center" id="username" name="username" placeholder='" lovidea... "' value="{{ old('username') }}" required>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="email" class="form-label"><span class="text-secondary bold">Email</span></label>
                        <input type="email" class="form-control text-center" id="email" name="email" placeholder='" lovilink@lovidea.com "'value="{{ old('email') }}">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label"><span class="text-secondary bold">Password</span></label>
                        <input type="password" class="form-control text-center" id="password" name="password" placeholder='" Stt... keep it secret "' required>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="confirm_password" class="form-label"><span class="text-secondary bold">Confirm Password</span></label>
                        <input type="password" class="form-control text-center" id="confirm_password" name="confirm_password" placeholder='" Another secret, please.. "' required>
                    </div>
                    <button type="submit" class="btn btn-purple">Submit</button>
                </form>
            </div>
            <div class="card-footer text-body-secondary text-center">
                Welcome to <span class="text-warning bold">Lov</span><span class="text-purple bold">Idea</span> Shorten link. 
            </div>
        </div>
    </div>
</div>
@foreach([
    'name',
    'username',
    'email',
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