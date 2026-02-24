@include('user.common.header')

<div class="row justify-content-center my-5">
    <div class="col-md-9">
     <div class="text-center">
          <small><img src="{{ asset('img/about.jpg') }}" width="100px"></small>
            <em class="text-primary"><h3 class="mt-3">Updata Site Setting</h3></em>
        </div>
        <form action="" class="row mt-5" method="POST" enctype="multipart/form-data">
         @csrf
            <div class="col-md-6 mb-3">
                <input type="text" value="Sikaram Solar Power" name="title" placeholder="Title" class="form-control">
            </div>

             <div class="col-md-6 mb-3">
               <input type="file" name="logo" class="form-control">
            </div>

             <div class="col-md-6 mb-3">
                <input type="number" value="07777434" name="phone1" placeholder="Phone1" class="form-control">
            </div>


              <div class="col-md-6 mb-3">
                <input type="email" value="info@sikaram.com" name="email" placeholder="Email Address" class="form-control">
             </div>


             <div class="col-md-6 mb-3">
                <input type="number" value="07777435" name="phone2" placeholder="Phone2"   class="form-control">
            </div>


             <div class="col-md-6 mb-3">
                <input type="text" value="www.facebook.com" name="facebook" placeholder="Facebook"   class="form-control">
            </div>


             <div class="col-md-6 mb-3">
                <input type="text" value="www.instagram.com" name="instagram" placeholder="instagram"   class="form-control">
            </div>

             <div class="col-md-6 mb-3">
                <input type="text" value="www.twitter.com" name="twitter" placeholder="twitter/x"   class="form-control">
            </div>

             <div class="col-md-6 mb-3">
                <input type="text" value="www.youtube.com" name="youtube" placeholder="Youtube"   class="form-control">
            </div>

             <div class="col-md-6 mb-3">
                <input type="text" value="kabul Afg" name="address" placeholder="Address"   class="form-control">
            </div>

            <div class="col-12 mb-3">
                <textarea name="desc" id="" rows="8" class="form-control" placeholder="Description" ></textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn  btn-primary">Sumbit</button>
            </div>
        </form>

       @if(session('success'))
                <div id="success-alert" class="alert alert-success">
                    {{ session('success') }}
                </div>

                <script>
                    // Hide after 3 seconds (3000 ms)
                    setTimeout(function() {
                        const alert = document.getElementById('success-alert');
                        if(alert) {
                            alert.style.display = 'none';
                        }
                    }, 3000);
                </script>
       @endif

    </div>
</div>
@include('user.common.footer')