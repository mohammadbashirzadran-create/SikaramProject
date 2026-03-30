@include('user.common.header')

<div class="row">
    <div class="col-12 abc">
        <form action="" method="POST">
          @csrf
           <div class="input-group">
             <input type="text" placeholder="Your Category" name="category" class="form-control">
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
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>

       <!-- Pagination Links -->
  
   </div>
</div>


@include('user.common.footer')