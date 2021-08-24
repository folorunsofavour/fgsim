@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Announcement us -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Announcement</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent
            
            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addAnnouncementModal">Add Announcement</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">FGSIM Announcement</h4>

                  <div class="table-responsive">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Announcement</th>
                                <th >Status</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($announcements as $announcement)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td >{!!$announcement->announcement!!}</td>
                              <td >
                                  @if( $announcement->status == 1)
                                      <a class="badge badge-success" href="{{ route('admin.announcement.status',$announcement->id) }}">
                                      <i class="mdi mdi-eye"></i> Is active</a>
                                  @else
                                      <a class="badge badge-danger" href="{{ route('admin.announcement.status',$announcement->id) }}">
                                      <i class="mdi mdi-eye-off"></i> Not active</a>
                                  @endif
                              </td>
                              <td >
                                  <a class="btn btn-block btn-sm btn-gradient-warning edit_announcement" data-announcement-id="{{ $announcement['id']}}" data-announcement-name="{{ $announcement['announcement']}}">Edit<i class="fa fa-edit"></i></a>
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

    <!-- Add Announcement Modal -->
    <div class="modal modal-scale fade" id="addAnnouncementModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FGSIM Announcement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.announcement.store') }}">
            {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="announcement"> Announcement</label>
                        <textarea class="form-control" name="announcement" id="announcement" rows="5" placeholder="Write Announcement..." required></textarea>
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
    <!-- End of Add Announcement Modal -->

    <!-- Edit Announcement Modal -->
    <div class="modal modal-scale" id="editAnnouncementModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FGSIM Announcement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form  method="post" action="{{ route('admin.announcement.update') }}">
            {{csrf_field()}}
            <input name="announcement_id" id="announcement_id" value="" required type="hidden">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="announcement_name">Announcement</label>
                        <textarea class="form-control" name="announcement_name" id="announcement_name" rows="5" placeholder="Write Announcement..." required></textarea>
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
    <!-- End of Edit Announcement Modal -->

    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">
        CKEDITOR.replace( 'announcement' );
        CKEDITOR.replace( 'announcement_name' );

        $(function()  {
            $('#datatable').DataTable();
        });

         //  Script for Edit Announcement Modal
         $(document).on('click', '.edit_announcement', function(event) {
            // console.log('this');
            $('#editAnnouncementModal').modal('show');

            var announcement_id = $(this).data("announcement-id");
            var announcement_name = $(this).data("announcement-name");

            $('input[name="announcement_id"]').val(announcement_id);
            CKEDITOR.instances['announcement_name'].setData(announcement_name);
        });
        // End Script for Edit Announcement Modal

    </script>
	
</body>
</html>
