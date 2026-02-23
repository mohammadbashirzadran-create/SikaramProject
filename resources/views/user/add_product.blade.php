@include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-5 my-5">
        <div class="card p-5">
            <em class="text-primary my-2"><h3>ADD PRODUCT</h3></em>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="name" class="form-control mb-3" placeholder="Product Name" required>

                <input type="text" name="category" class="form-control mb-3" placeholder="Category" required>

                <input type="number" step="0.01" name="price" class="form-control mb-3" placeholder="Price" required>

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

@include('user.common.footer')