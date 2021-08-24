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
              <h3 class="page-title"> Ministers and Directors</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent
            
            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addMinisterModal">Add Ministers</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ministers and Directors</h4>

                  <div class="table-responsive">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Name</th>
                                <th >Position</th>
                                <th >Category</th>
                                <th >Picture</th>
                                <th >Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($ministers as $minister)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td >{{$minister->lastname}} {{$minister->firstname}} {{$minister->othername}}</td>
                              <td >{{$minister->position}}</td>
                              <td >{{$minister->category}}</td>
                              <td ><a target="_blank" href="/storage/images/minister/document/{{$minister['minister_image']}}">{{$minister->minister_image}}</a></td>
                              <td >
                                  @if( $minister->status == 1)
                                      <a class="badge badge-success" href="{{ route('admin.minister.status',$minister->id) }}">
                                      <i class="mdi mdi-eye"></i> Is active</a>
                                  @else
                                      <a class="badge badge-danger" href="{{ route('admin.minister.status',$minister->id) }}">
                                      <i class="mdi mdi-eye-off"></i> Not active</a>
                                  @endif
                              </td>
                              <td>
                                <a href="{{ route('admin.minister.edit',$minister->id) }}" class="btn btn-block btn-sm btn-gradient-warning " >Edit<i class="fa fa-edit"></i></a>
                              </td>
                              <td> 
                                <a href="{{ route('admin.minister.delete', $minister->id) }}" onclick="return confirm('Are you sure you want to delete this Record?');" class="btn btn-block btn-sm btn-gradient-danger">Delete<i class="fa fa-trash"></i></a>
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

    <!-- Add Minister Modal -->
    <div class="modal modal-scale fade" id="addMinisterModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Minister and Directors</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.minister.store') }}" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="modal-body">

                    
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" name="othername" id="othername" class="form-control" placeholder="Othername">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <select id="category" name="category" class="form-control" required>
                                <option value="" selected>Select Category</option>
                                <option value="Minister">Minister</option>
                                <option value="Board of Director">Board of Director</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" name="position" id="position" class="form-control" placeholder="Position" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="file" name="minister_image" id="minister_image" class="form-control" required>
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
