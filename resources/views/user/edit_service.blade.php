@include('user.common.header')


<div class="row justify-content-center">
    <div class="col-md-8 py-3 my-5">
        <div class="card p-4 mb-3">

            <h3 class="text-primary">EDIT SERVICE</h3>

               @if($services->status == 0)
                    <div class="alert alert-danger">
                        ❌ This service is disabled. You cannot edit this service.
                    </div>
                @endif

            <form action="{{ route('update_services', $services->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text"  {{ $services->status == 0 ? 'disabled' : '' }} name="title" class="form-control mb-3"
                       value="{{ $services->title }}" required>

                <textarea name="description"  {{ $services->status == 0 ? 'disabled' : '' }} class="form-control mb-3"placeholder="Service Description">{{ $services->description }}</textarea>

                <label>Current Image:</label><br>
                <img src="{{ asset('uploads/'. $services->image) }}" width="80" class="mb-3">

                <input type="file"  {{ $services->status == 0 ? 'disabled' : '' }} name="image" class="form-control mb-3">

                <button {{ $services->status==0? 'disabled': '' }} class="btn btn-primary btn-sm">UPDATE</button>

                <a href="{{ route('user.services') }}" class="btn btn-sm btn-primary">Back</a>
            </form>

        </div>
    </div>

@include('user.common.footer')