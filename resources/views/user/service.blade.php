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