@include('user.common.header')

<div class="row">
    <div class="col-12 d-flex justify-content-between">
        <em class="text-primary"><h4>ALL TEAM MEMBERS</h4></em>
        <a href="{{ route('add_team') }}" class="btn btn-primary mb-2">Add Member</a>
    </div>
    <hr>

    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
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