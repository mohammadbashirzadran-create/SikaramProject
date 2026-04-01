@include('user.common.header')


<div class="row justify-content-center">
    <div class="col-md-8 py-3 my-5">
        <div class="card p-4 mb-3">

            <h3 class="text-primary">EDIT USER</h3>

               @if($user->status == 0)
                    <div class="alert alert-danger">
                        ❌ This user is disabled. You cannot edit this user.
                    </div>
                @endif

            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text"  {{ $user->status == 0 ? 'disabled' : '' }} name="name" class="form-control mb-3"
                       value="{{ $user->name }}" required>

                <input type="email"  {{ $user->status == 0 ? 'disabled' : '' }} name="email" class="form-control mb-3"
                       value="{{ $user->email }}" required>

                <input type="text"  {{ $user->status == 0 ? 'disabled' : '' }} name="phone" class="form-control mb-3"
                       value="{{ $user->phone }}" required>

                <select name="gender"  {{ $user->status == 0 ? 'disabled' : '' }} class="form-select mb-3">
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="custom" {{ $user->gender == 'custom' ? 'selected' : '' }}>Custom</option>
                </select>

                <select name="role"  {{ $user->status == 0 ? 'disabled' : '' }} class="form-select mb-3">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user"  {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>

                <label>Current Image:</label><br>
                <img src="{{ asset('uploads/'. $user->thumbnail) }}" width="80" class="mb-3">

                <input type="file"  {{ $user->status == 0 ? 'disabled' : '' }} name="thumbnail" class="form-control mb-3">

                <button {{ $user->status==0? 'disabled': '' }} class="btn btn-primary btn-sm">UPDATE</button>

                <a href="{{ route('users') }}" class="btn btn-sm btn-primary">Back</a>
            </form>

        </div>
    </div>
</div>

@include('user.common.footer')