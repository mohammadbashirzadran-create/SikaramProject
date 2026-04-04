@include('user.common.header')

<div class="row">
    <div class="col-12 d-flex justify-content-between">
        <em class="text-primary"><h4>ALL PROJECTS</h4></em>
        <a href="{{ route('add_project') }}" class="btn btn-primary mb-2">Add Project</a>
    </div>
    <hr>

    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Capacity</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $index => $project)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->location }}</td>
                    <td>{{ $project->capacity }} kW</td>
                    <td>{{ $project->description }}</td>
                   <td>
                        @if($project->image)
                            <img src="{{ asset('uploads/' . $project->image) }}" width="80" style="object-fit: cover;" alt="Project Image">
                        @else
                            <span class="text-danger">No Image</span>
                        @endif
                    </td>

                    {{-- Edit button only if enabled --}}
                    <td>
                        <a href="{{ route('edit_project', $project->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>

                    {{-- Status --}}
                    <td>
                        @if($project->status == 1)
                            <span class="btn btn-sm btn-success">Active</span>
                        @else
                            <span class="btn btn-sm btn-danger">Inactive</span>
                        @endif
                    </td>

                    {{-- Toggle Enable/Disable --}}
                    <td>
                        @if($project->status == 1)
                            <a href="{{ route('toggle_project', $project->id) }}" class="btn btn-sm btn-danger">Disable</a>
                        @else
                            <a href="{{ route('toggle_project', $project->id) }}" class="btn btn-sm btn-success">Enable</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('user.common.footer')
