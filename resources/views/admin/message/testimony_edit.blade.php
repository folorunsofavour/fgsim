@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Testimony -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Testimony</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Testimony</h4>

                    <form  method="post" action="{{ route('admin.testimony.update') }}" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <input type="hidden" name="testimony_id" id="testimony_id" class="form-control" value="{{$testimony->id}}" required>

                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text" name="fullname" id="fullname" class="form-control" value="{{$testimony->fullname}}" placeholder="Lastname" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="text" name="subject" id="subject" class="form-control" value="{{$testimony->subject}}" placeholder="Firstname" required>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-12">
                                <textarea class="form-control" name="testimony" id="testimony" rows="10" placeholder="Write Testimony..." required>{!!$testimony->testimony!!}</textarea>
                            </div>
                            
                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-6">
                                <img src="/storage/images/testimony/document/{{$testimony['picture']}}"  width="450" height="300">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="file" name="picture" id="picture" class="form-control" >
                            </div>
                            
                        </div>

                        </br>
                        <button type="submit" class="btn btn-gradient-primary mr-2">UPDATE</button>
                    </form>

                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- footer.html -->
          <footer class="footer col-lg-12" >
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://fgsim.org/" target="_blank">FGSIM</a>. All rights reserved.</span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
	
    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">

      CKEDITOR.replace( 'testimony' );

    </script>

</body>
</html>
