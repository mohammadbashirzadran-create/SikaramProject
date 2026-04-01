@include('user.common.header')


 <div class="row">
    <div class="col-12 d-flex justify-content-between">
        <em class="text-primary"><h4>ALL USER</h4></em>
        <a href="{{ route('add_user') }}" class="btn btn-primary mb-2">Add User</a>
    </div><hr>


    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Thumbnail</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             
                @foreach ($users as $index=>$user)
                    <tr>
                         <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>
                            @if ($user->thumbnail)
                                <img src="{{ asset('uploads/'.$user->thumbnail) }}" alt="thumbnail" width="50">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>

                           <td>
                            @if($user->status == 1)
                              <span class="text-success">Active</span>
                            @else
                               <span class="text-danger">Inactive</span>
                            @endif
                         </td>
                       <td>
                            @if($user->status == 1)
                                <a href="{{ route('users.toggle', $user->id) }}" class="btn btn-sm btn-warning">
                                    Disable
                                </a>
                            @else
                                <a href="{{ route('users.toggle', $user->id) }}" class="btn btn-sm btn-success">
                                    Enable
                                </a>
                            @endif
                     </td>
                    </tr>
                @endforeach
             

            </tbody>
        </table>

    </div>
 </div>


@include('user.common.footer')