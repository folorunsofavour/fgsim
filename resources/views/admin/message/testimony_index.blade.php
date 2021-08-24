@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Testimonies us -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Testimonies</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent
            
            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addTestimonyModal">Add Testimony</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Testimonies</h4>

                  <div class="table-responsive">
                    <table class="table table-striped table-bordered font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Full Name</th>
                                <th >Subject</th>
                                <th >Testimonies</th>
                                <th >Picture</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($testimonies as $testimony)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td  >{{$testimony->fullname}}</td>
                              <td  >{{$testimony->subject}}</td>
                              <td  >{!!$testimony->testimony!!}</td>
                              <td  ><a target="_blank" href="/storage/images/testimony/document/{{$testimony['picture']}}">{{$testimony->picture}}</a></td>
                              <td>
                                <a href="{{ route('admin.testimony.edit',$testimony->id) }}" class="btn btn-block btn-sm btn-gradient-warning " >Edit<i class="fa fa-edit"></i></a>
                              </td>
                              <td> 
                                <a href="{{ route('admin.testimony.delete', $testimony->id) }}" onclick="return confirm('Are you sure you want to delete this Testimony?');" class="btn btn-block btn-sm btn-gradient-danger">Delete<i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
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


    <!-- Add Testimony Modal -->
    <div class="modal modal-scale fade" id="addTestimonyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Testimony</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.testimony.store') }}" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="modal-body">

                    
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Fullname" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="testimony">Testimony</label>
                            <textarea class="form-control" name="testimony" id="testimony" rows="10" placeholder="Write Testimony..." required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <input type="file" name="picture" id="picture" class="form-control" >
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-danger" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-gradient-primary mr-2">SAVE</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    <!-- End of Add Testimony Modal -->


    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">

      CKEDITOR.replace( 'testimony' );

        $(function()  {
            $('#datatable').DataTable();
        });

    </script>
	
</body>
</html>