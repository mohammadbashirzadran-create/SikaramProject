@include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-5 my-5">
        <div class="card p-5">
            <em class="text-primary my-2"><h3>EDIT PRODUCT</h3></em>

               @if($product->status == 0)
                    <div class="alert alert-danger">
                        ❌ This product is disabled. You cannot edit this product.
                    </div>
                @endif

            <form action="{{ route('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" value="{{ $product->name }}"   {{ $product->status == 0 ? 'disabled' : '' }} name="name" class="form-control mb-3" placeholder="Company Name" required>

               <!-- ✅ FIXED CATEGORY -->
                <select name="category" class="form-control mb-3" required {{ $product->status == 0 ? 'disabled' : '' }}  >
                    <option value="">-- Select Category --</option>
                    @foreach($category as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                <input type="number" {{ $product->status==0 ? 'disabled' : '' }} value="{{ $product->price }}" step="0.01" name="price" class="form-control mb-3" placeholder="Price" required>

                <textarea name="description" {{ $product->status==0 ? 'disabled' : '' }}  class="form-control mb-3" placeholder="Description">{{ $product->description }}</textarea>

                <label>Current Image:</label><br>
                @if($product->image)
                    <img src="{{ asset('uploads/'.$product->image) }}" width="80" class="mb-3">
                @else
                    <span class="text-danger">No Image</span>
                @endif

                <input type="file" name="image" class="form-control mb-3">

                <button {{ $product->status==0 ? 'disabled' : '' }} type="submit" class="btn btn-primary">UPDATE</button>

                <a href="{{ route('products') }}" class="btn  btn-primary">Back</a>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

        </div>
    </div>
</div>

@include('user.common.footer')