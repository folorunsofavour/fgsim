@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Ministers & Directors -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Media</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent
            
            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addMediaModal">Add Media</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Media</h4>

                  <div class="table-responsive">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Category</th>
                                <th >Subject</th>
                                <th >Picture</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($medias as $media)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td >{{$media->category}}</td>
                              <td >{{$media->subject}}</td>
                              <td ><a target="_blank" href="/storage/images/media/document/{{$media['media_image']}}">{{$media->media_image}}</a></td>
                              <td>
                                <a href="{{ route('admin.media.edit',$media->id) }}" class="btn btn-block btn-sm btn-gradient-warning " >Edit<i class="fa fa-edit"></i></a>
                              </td>
                              <td> 
                                <a href="{{ route('admin.media.delete', $media->id) }}" onclick="return confirm('Are you sure you want to delete this Record?');" class="btn btn-block btn-sm btn-gradient-danger">Delete<i class="fa fa-trash"></i></a>
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

    <!-- Add Media Modal -->
    <div class="modal modal-scale fade" id="addMediaModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Media</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <select id="category" name="category" class="form-control" required>
                                <option value="" selected>Select Category</option>
                                <option value="Special Program">Special Program</option>
                                <option value="Sunday Service">Sunday Service</option>
                                <option value="Weekly Service">Weekly Service</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="file" name="media_image" id="media_image" class="form-control" required>
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
    <!-- End of Add Minister Modal -->
	
    @component('../partials.admin.footer')
    @endcomponent
    
    <script type="text/javascript">

        $(function()  {
            $('#datatable').DataTable();
        });

    </script>
	
</body>
</html>
