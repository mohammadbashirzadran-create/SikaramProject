@include('user.common.header')

<div class="row">
    <div class="col-12 d-flex justify-content-between">
        <em class="text-primary"><h4>ALL PRODUCTS</h4></em>
        <a href="{{ route('add_product') }}" class="btn btn-primary mb-2">Add Product</a>
    </div>
    <hr>

    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if($product->image)
                         <img src="{{ asset('uploads/' . $product->image) }}" width="60" alt="product image">
                        @else
                            <span class="text-danger">No Image</span>
                        @endif
                   </td>


                    <td><a href="{{ route('edit_product', $product->id) }}" class="btn btn-sm btn-primary">Edit</a></td>

                      <td>
                    @if($product->status == 1)
                        <span class="btn btn-sm btn-success">Active</span>
                    @else
                        <span class="btn btn-sm btn-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    @if($product->status == 1)
                        <a href="{{ route('toggle_product', $product->id) }}" class="btn btn-sm btn-danger">Disable</a>
                    @else
                        <a href="{{ route('toggle_product', $product->id) }}" class="btn btn-sm btn-success">Enable</a>
                    @endif
                </td>
                </tr>
                @endforeach
              
            </tbody>
        </table>
    </div>
</div>

@include('user.common.footer')