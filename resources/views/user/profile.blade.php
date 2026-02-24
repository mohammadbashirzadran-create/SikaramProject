@include('user.common.header')

<div class="row justify-content-center my-5">
    <div class="col-md-8">
        <div class="card p-4 myimage">
            <img src="{{ asset('img/about.jpg') }}" alt="">
        </div>


        <div class="card p-3 mt-2">
           <em class="text-primary"><h2>Presonal Information <a href="" class="btn btn-sm btn-warning">Edit</a></h2></em>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>Bashir</td>
                    </tr>

                     <tr>
                        <th>phone</th>
                        <td>077243434</td>
                    </tr>


                     <tr>
                        <th>Email</th>
                        <td>mohammad@example.com</td>
                    </tr>
                      
                    
                     <tr>
                        <th>Type</th>
                        <td>Admin</td>
                    </tr>

                     <tr>
                        <th>Gender</th>
                        <td>Male</td>
                    </tr>

                     <tr>
                        <th>Bio</th>
                        <td>this is for you</td>
                    </tr>

                     <tr>
                        <th>Password</th>
                        <td><a href="" class="btn btn-sm btn-success">Update Password</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('user.common.footer')