@extends('layouts.app')

@section('content')

<div class="container login">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">
            <div class="card p-4    shadow">
                <h3 class="text-primary">Create Account</h3>
             <form action="" method="POST" enctype="multipart/form-data">
             @csrf

                <input type="text" name="user_name"  value="{{ old('user_name') }}" class="form-control mb-3" placeholder="Name">
                <input type="email" name="user_email"  value="{{ old('user_email') }}"     class="form-control mb-3" placeholder="Email">
                <input type="text" name="user_phone"  value="{{ old('user_phone') }}" class="form-control mb-3" placeholder="Phone">
                <select name="user_gender" class="form-control mb-3">
                    <option value="Male"  {{ old('user_gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('user_gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Custom" {{ old('user_gender') == 'Custom' ? 'selected' : '' }}>Custom</option>
                </select>
                <input type="password" name="user_password" class="form-control mb-3" placeholder="Password">
                <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password">
                <textarea name="user_bio" class="form-control mb-3" placeholder="Bio">{{ old('user_bio') }}</textarea>
                <input type="file" name="user_thumbnail" class="form-control mb-3">
                <!-- FIX Required -->
                <input type="hidden" name="user_type" value="User">

    <button type="submit" class="btn btn-sm btn-primary">Create Account</button>
</form>


                   <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="text-center mt-2">
                    <a href="{{ route('login') }}" class="text-decoration-none">Have Account / Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection