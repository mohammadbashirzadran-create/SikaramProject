@extends('layouts.app')

@section('content')

 <div class="container login">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">
            <div class="card p-4 shadow mt-5">
                <em class="text-primary"><h3>Login</h3></em>
                <form action="{{ route('login.submit') }}" method="POST" class="mt-3">
                    @csrf
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-message"></i></span>
                    <input type="text" class="form-control" placeholder="Your Email" name="email">
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Your Password" name="password">
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Login</button>
                </form>

                <div class="text-center">
                    <a href="" class="text-decoration-none">Forgot Password</a><br>
                    <a href="{{ route('account') }}" class="text-decoration-none">Create Account</a>
                </div>


                {{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success" id="success-message">{{ session('success') }}</div>
@endif

{{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger" id="error-message">{{ session('error') }}</div>
        @endif

        <script>
            // Wait 3 seconds (3000 ms) and hide success message
            setTimeout(function() {
                const success = document.getElementById('success-message');
                if(success) {
                    success.style.display = 'none';
                }

                const error = document.getElementById('error-message');
                if(error) {
                    error.style.display = 'none';
                }
            }, 3000); // 3000 ms = 3 seconds
        </script>


    @if($errors->any())
       <div class="alert alert-danger">
          {{ $errors->first() }}
       </div>
    @endif

            </div>
        </div>
    </div>
 </div>
    
@endsection