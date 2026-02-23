@include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-5 my-5">
        <div class="card p-5">
            <em class="text-primary my-2"><h3>ADD TEAM MEMBER</h3></em>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

                <input type="text" name="position" class="form-control mb-3" placeholder="Position" required>

                <input type="email" name="email" class="form-control mb-3" placeholder="Email">

                <input type="text" name="phone" class="form-control mb-3" placeholder="Phone">

                <select name="gender" class="form-select mb-3" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Custom">Custom</option>
                </select>

                <input type="file" name="image" class="form-control mb-3">

                <button type="submit" class="btn btn-primary">ADD</button>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

        </div>
    </div>
</div>

@include('user.common.footer')