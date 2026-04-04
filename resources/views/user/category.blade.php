@include('user.common.header')

<div class="row">
<<<<<<< HEAD
    <div class="col-12 abc">
        <form action="{{ route('category.store') }}" method="POST">
          @csrf
           <div class="input-group">
             <input type="text" placeholder="Your Category" name="name" class="form-control">
            <button class="btn btn-primary" type="submit">Add</button>
           </div>
        </form>
       @if(session('success'))
           <div id="message" class="alert alert-success">
             {{ session('success') }}
           </div>
      @endif
=======
    <div class="col-12">
>>>>>>> 3fe1787e9c057ace4f117d4c982e7c8cbbb6621f

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

<<<<<<< HEAD
   <div class="col-12 mt-2">
      <table class="table table-bordered">
        <thead>
            <tr class="table-dark">
                <th>ID</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $index => $cat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $cat->name }}</td>
                <td><a href="{{ route('edit_category', $cat->id) }}" class="btn btn-sm btn-primary">Edit</a></td>

                <td>
                    @if($cat->status == 1)
                        <span class="btn btn-sm btn-success">Active</span>
                    @else
                        <span class="btn btn-sm btn-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    @if($cat->status == 1)
                        <a href="{{ route('toggle_category', $cat->id) }}" class="btn btn-sm btn-danger">Disable</a>
                    @else
                        <a href="{{ route('toggle_category', $cat->id) }}" class="btn btn-sm btn-success">Enable</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

       <!-- Pagination Links -->
  
   </div>
=======
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
>>>>>>> 3fe1787e9c057ace4f117d4c982e7c8cbbb6621f
</div>

<script>
    setTimeout(() => {
        const msg = document.getElementById('message');
        if(msg) msg.style.display = 'none';
    }, 3000);
</script>

@include('user.common.footer')
