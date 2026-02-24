@include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-5 my-5">
        <div class="card p-5">
            <em class="text-primary my-2"><h3>GET A QUOTE</h3></em>

            <form action="" method="POST">
                @csrf

                <input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required>

                <input type="email" name="email" class="form-control mb-3" placeholder="Your Email">

                <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" required>

                <input type="text" name="address" class="form-control mb-3" placeholder="Installation Address" required>

                <input type="text" name="system_size" class="form-control mb-3" placeholder="Required System Size (e.g., 5kW)" required>

                <textarea name="message" class="form-control mb-3" rows="4" placeholder="Additional Details"></textarea>

                <button type="submit" class="btn btn-primary">Submit Request</button>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

        </div>
    </div>
</div>

@include('user.common.footer')