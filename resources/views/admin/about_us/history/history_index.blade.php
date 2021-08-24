@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- History us -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> History</h3>
            </div>
            
            @component('../../partials._flash_message')
            @endcomponent

            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addHistoryModal">Add History</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">FGSIM History</h4>

                  <div class="table-responsive">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Year</th>
                                <th >Theme</th>
                                <th >Status</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($histories as $history)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td >{{$history->year}}</td>
                              <td >{!!$history->theme!!}</td>
                              <td >
                                  @if( $history->status == 1)
                                      <a class="badge badge-success" href="{{ route('admin.history.status',$history->id) }}">
                                      <i class="mdi mdi-eye"></i> Is active</a>
                                  @else
                                      <a class="badge badge-danger" href="{{ route('admin.history.status',$history->id) }}">
                                      <i class="mdi mdi-eye-off"></i> Not active</a>
                                  @endif
                              </td>
                              <td >
                                  <a class="btn btn-block btn-sm btn-gradient-warning edit_history" data-history-id="{{ $history['id']}}" data-history-year="{{ $history['year']}}" data-history-theme="{{ $history['theme']}}">Edit<i class="fa fa-edit"></i></a>
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

    <!-- Add History Modal -->
    <div class="modal modal-scale fade" id="addHistoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FGSIM History</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.history.store') }}">
            {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" name="year" id="year" placeholder="Year" required/>
                    </div>

                    <div class="form-group">
                        <label for="theme">Theme of the year</label>
                        <textarea class="form-control" name="theme" id="theme" rows="5" placeholder="Write Theme..." required></textarea>
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
    <!-- End of Add History Modal -->

    <!-- Edit History Modal -->
    <div class="modal modal-scale" id="editHistoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FGSIM History</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form  method="post" action="{{ route('admin.history.update') }}">
            {{csrf_field()}}
            <input name="history_id" id="history_id" value="" required type="hidden">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="history_year">Year</label>
                        <input type="number" class="form-control" name="history_year" id="history_year" placeholder="year" required/>
                    </div>

                    <div class="form-group">
                        <label for="history_theme">Theme of the year</label>
                        <textarea class="form-control" name="history_theme" id="history_theme" rows="5" placeholder="Write Theme..." required></textarea>
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
    <!-- End of Edit History Modal -->

    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">
        CKEDITOR.replace( 'theme' );
        CKEDITOR.replace( 'history_theme' );

        $(function()  {
            $('#datatable').DataTable();
        });

         //  Script for Edit History Modal
         $(document).on('click', '.edit_history', function(event) {
            // console.log('this');
            $('#editHistoryModal').modal('show');

            var history_id = $(this).data("history-id");
            var history_year = $(this).data("history-year");
            var history_theme = $(this).data("history-theme");

            $('input[name="history_id"]').val(history_id);
            $('input[name="history_year"]').val(history_year);
            CKEDITOR.instances['history_theme'].setData(history_theme);
        });
        // End Script for Edit History Modal

    </script>
	
</body>
</html>
