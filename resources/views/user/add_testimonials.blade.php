@include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-5 my-5">
        <div class="card p-5">
            <em class="text-primary my-2"><h3>ADD TESTIMONIAL</h3></em>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

                <input type="email" name="email" class="form-control mb-3" placeholder="Email">

                <input type="text" name="phone" class="form-control mb-3" placeholder="Phone">

                <textarea name="message" class="form-control mb-3" rows="5" placeholder="Customer Review" required></textarea>

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