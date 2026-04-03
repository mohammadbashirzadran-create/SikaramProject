@include('user.common.header')

<div class="row">
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

        @if ($errors->any())
              <div id="message" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
               </div>
        @endif

          <script>
              // Hide message after 5 seconds (5000 ms)
              setTimeout(function() {
                  var msg = document.getElementById('message');
                  if(msg) {
                      msg.style.display = 'none';
                  }
              }, 3000);
          </script>


         
   </div>

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
</div>


@include('user.common.footer')