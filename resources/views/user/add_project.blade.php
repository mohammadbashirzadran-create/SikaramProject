{{-- @include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-5 my-5">
        <div class="card p-5">
            <em class="text-primary my-2"><h3>ADD PROJECT</h3></em>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="title" class="form-control mb-3" placeholder="Project Title" required>

                <input type="text" name="location" class="form-control mb-3" placeholder="Location" required>

                <input type="number" name="capacity" class="form-control mb-3" placeholder="Capacity (kW)" required>

                <textarea name="description" class="form-control mb-3" placeholder="Description"></textarea>

                <input type="file" name="image" class="form-control mb-3">

                <button type="submit" class="btn btn-primary">ADD</button>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

        </div>
    </div>
</div>

@include('user.common.footer') --}}


@include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-5 my-5">
        <div class="card p-5">
            <h3 class="text-primary mb-3">ADD PROJECT</h3>

            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="title" class="form-control mb-3" placeholder="Project Title" required>
                <input type="text" name="location" class="form-control mb-3" placeholder="Location" required>
                <input type="number" name="capacity" class="form-control mb-3" placeholder="Capacity (kW)" required>
                <textarea name="description" class="form-control mb-3" placeholder="Description"></textarea>
                <input type="file" name="image" class="form-control mb-3">

                <select name="status" class="form-control mb-3">
                    <option value="1" selected>Enable</option>
                    <option value="0">Disable</option>
                </select>

                <button type="submit" class="btn btn-primary">ADD</button>
                <a href="{{ route('projects') }}" class="btn btn-primary">Back</a>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
        </div>
    </div>
</div>

@include('user.common.footer')
