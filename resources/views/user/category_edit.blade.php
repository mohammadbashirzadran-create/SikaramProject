@include('user.common.header')


<div class="row">
    <div class="col-12">
        <h3>Edit Category</h3>

        @if(session('success'))
            <div id="message" class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div id="message" class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-2">Back to Categories</a>
    </div>
</div>

<script>
    setTimeout(() => {
        const msg = document.getElementById('message');
        if(msg) msg.style.display = 'none';
    }, 3000);
</script>


@include('user.common.footer')
