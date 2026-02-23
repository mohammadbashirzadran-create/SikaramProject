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
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
             
            </tbody>
        </table>

    </div>
 </div>


@include('user.common.footer')