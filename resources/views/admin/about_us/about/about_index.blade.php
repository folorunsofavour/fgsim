@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- About us -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> About</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent

            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addAboutModal">Add About</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" >About Us</h4>

                  <div class="table-responsive">
                    <table class="table table-striped table-bordered font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >About</th>
                                <th >Date Created</th>
                                <th >Status</th>
                                <th colspan="2" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($abouts as $about)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td id="id_td" >{!!$about->name!!}</td>
                              <td >{{$about->created_at}}</td>
                              <td >
                                  @if( $about->status == 1)
                                      <a class="badge badge-success" href="{{ route('admin.about.status',$about->id) }}">
                                      <i class="mdi mdi-eye"></i> Is active</a>
                                  @else
                                      <a class="badge badge-danger" href="{{ route('admin.about.status',$about->id) }}">
                                      <i class="mdi mdi-eye-off"></i> Not active</a>
                                  @endif
                              </td>
                              <td>
                                  <a class="btn btn-block btn-sm btn-gradient-warning  edit_about" data-about-id="{{ $about['id']}}" data-about-name="{{ $about['name']}}">Edit<i class="fa fa-edit"></i></a>
                              </td>
                              <td> <a class="btn btn-block btn-sm btn-gradient-info view_about" data-about-view="{{ $about['name']}}"><i class="fa fa-edit">View</i></a>
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

    <!-- Add About Modal -->
    <div class="modal modal-scale fade" id="addAboutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">About FGSIM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.about.store') }}">
            {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="about">Short Description</label>
                        <textarea class="form-control" name="about" id="about" rows="10" placeholder="Write Something..." required></textarea>
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
    <!-- End of Add About Modal -->

    <!-- Edit About Modal -->
    <div class="modal modal-scale" id="editAboutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">About FGSIM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form  method="post" action="{{ route('admin.about.update') }}">
            {{csrf_field()}}
            <input name="about_id" id="about_id" value="" required type="hidden">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="about_name">About</label>
                        <textarea class="form-control" name="about_name" id="about_name" rows="10" placeholder="Write Something..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-danger" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-gradient-primary mr-2">UPDATE</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    <!-- End of Edit About Modal -->

    
    <!-- View About Modal -->
    <div class="modal modal-scale" id="viewAboutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">About FGSIM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="about_view">About</label>
                    <textarea class="form-control" name="about_view" id="about_view" rows="10" disabled></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-gradient-danger" data-dismiss="modal">CLOSE</button>
            </div>
          </div>
        </div>
    </div>
    <!-- End of View About Modal -->

    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">
        CKEDITOR.replace( 'about' );
        CKEDITOR.replace( 'about_name' );
        CKEDITOR.replace( 'about_view' );

        $(function()  {
            $('#datatable').DataTable();
        });

         //  Script for Edit About Modal
         $(document).on('click', '.edit_about', function(event) {
            // console.log('this');
            $('#editAboutModal').modal('show');

            var about_id = $(this).data("about-id");
            var about_name = $(this).data("about-name");

            $('input[name="about_id"]').val(about_id);
            // $('textarea[name="about_name"]').val(about_name);
            CKEDITOR.instances['about_name'].setData(about_name);
        });
        // End Script for Edit About Modal

        //  Script for View About Modal
        $(document).on('click', '.view_about', function(event) {
            // console.log('this');
            $('#viewAboutModal').modal('show');

            var about_view = $(this).data("about-view");

            // $('textarea[view="about_view"]').val(about_view);
            CKEDITOR.instances['about_view'].setData(about_view);
        });
        // End Script for View About Modal
    </script>
	
</body>
</html>
