@include('user.common.header')

<div class="row">
    <div class="col-12">

    @if(session('error'))
        <div id="message" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <!-- ADD CATEGORY FORM -->
        <form action="{{ route('categories.store') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required>
                <button class="btn btn-primary">Add</button>
            </div>
        </form>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div id="message" class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- ERROR MESSAGE -->
        @if ($errors->any())
            <div id="message" class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    <!-- CATEGORY TABLE -->
    <div class="col-12 mt-3">
        <table class="table table- text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $index=> $category)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->status)
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>
                                    Disabled
                                </button>
                            @endif
                        </td>

                        <td>
                            @if($category->status==1)
                                <button " class="btn btn-sm btn-success btn-sm">
                                    Active
                                </button>
                            @else
                                <button class="btn btn-sm btn-danger btn-sm" disabled>
                                    Inactive
                                </button>
                            @endif
                        </td>

                        {{-- <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td> --}}
                        <td>
                            <a href="{{ route('categories.toggle', $category->id) }}"
                            class="btn btn-sm {{ $category->status ? 'btn-success' : 'btn-secondary' }}">
                                {{ $category->status ? 'Enabled' : 'Disabled' }}
                            </a>
                        </td>
                        {{-- <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    setTimeout(() => {
        const msg = document.getElementById('message');
        if(msg) msg.style.display = 'none';
    }, 3000);
</script>

@include('user.common.footer')
