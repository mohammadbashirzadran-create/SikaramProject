@include('user.common.header')


<div class="row justify-content-center">
    <div class="col-md-8 py-3 my-5">
        <div class="card p-4 mb-3">

            <h3 class="text-primary">EDIT USER</h3>

            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="name" class="form-control mb-3"
                       value="{{ $user->name }}" required>

                <input type="email" name="email" class="form-control mb-3"
                       value="{{ $user->email }}" required>

                <input type="text" name="phone" class="form-control mb-3"
                       value="{{ $user->phone }}" required>

                <select name="gender" class="form-select mb-3">
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="custom" {{ $user->gender == 'custom' ? 'selected' : '' }}>Custom</option>
                </select>

                <select name="role" class="form-select mb-3">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user"  {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>

                <label>Current Image:</label><br>
                <img src="{{ asset('uploads/'. $user->thumbnail) }}" width="80" class="mb-3">

                <input type="file" name="thumbnail" class="form-control mb-3">

                <button class="btn btn-primary btn-sm">UPDATE</button>
            </form>

        </div>
    </div>
</div>

@include('user.common.footer')