@include('user.common.header')

<div class="row">
    <div class="col-12 d-flex justify-content-between">
        <em class="text-primary"><h4>ALL SERVICES</h4></em>
        <a href="{{ route('add_services') }}" class="btn btn-primary mb-2">Add Service</a>
    </div>
    <hr>

    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Edit</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $index => $service)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->description }}</td>
                        <td><img src="{{ asset('uploads/'. $service->image) }}" width="70   "></td>
                        <td><a href="{{ route('edit_services', $service->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                        <td>
                            @if($service->status == 1)
                                <span class="btn btn-sm btn-success">Active</span>
                            @else
                                <span class="btn btn-sm btn-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            @if($service->status == 1)
                                <a href="{{ route('toggle_service', $service->id) }}" class="btn btn-sm btn-danger">Disable</a>
                            @else
                                <a href="{{ route('toggle_service', $service->id) }}" class="btn btn-sm btn-success">Enable</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

               
            </tbody>
        </table>
    </div>
</div>

@include('user.common.footer')