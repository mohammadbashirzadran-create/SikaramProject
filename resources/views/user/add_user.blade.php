@include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-3">
        <div class="card p-5">
            <em class="text-primary"><h3>ADD USER</h3></em>

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" required>

                <select name="gender" class="form-select mb-3" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Custom">Custom</option>
                </select>
                
                <select name="type" class="form-select mb-3" required>
                    <option value="">Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>

                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password" required>

                <textarea name="bio" class="form-control mb-3" cols="30" rows="7" placeholder="Your Bio"></textarea>

                <input type="file"  name="user_thumbnail" class="form-control mb-3">

                <button type="submit" class="btn  btn-primary">ADD</button>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>

@include('user.common.footer')
