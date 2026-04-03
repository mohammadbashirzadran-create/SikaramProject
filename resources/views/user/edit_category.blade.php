@include('user.common.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
                <em class="text-primary"><h4>New You Can Update Your Category</h4></em>
                  <div class="card p-4 mt-4" style="box-shadow: 0px 0px 10px green">


                      @if($category->status == 0)
                    <div class="alert alert-danger">
                        ❌ This category is disabled. You cannot edit this category.
                    </div>
                @endif

                    <form action="{{ route('update_category', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                      <input type="text"  {{ $category->status == 0 ? 'disabled' : '' }}  name="name" value="{{ $category->name }}" class="form-control mb-2">
                     <button type="submit" class="btn btn-primary">Update</button>

                        <a href="{{ route('category') }}" class="btn btn-primary">Back</a>
                     </form>
                  </div>
            </div>
        </div>
    </div>

@if(session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    setTimeout(function() {
        var msg = document.getElementById('message');
        if(msg) { msg.style.display = 'none'; }
    }, 3000);
</script>

</body>
</html>


@include('user.common.footer')