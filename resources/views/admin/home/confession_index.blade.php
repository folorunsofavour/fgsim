@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Confession us -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Confession</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent
            
            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addConfessionModal">Add Confession</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">FGSIM Confession</h4>

                  <div class="table-responsive">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Year</th>
                                <th >Confession</th>
                                <th >Status</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($confessions as $confession)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td >{{$confession->year}}</td>
                              <td >{!!$confession->confession!!}</td>
                              <td >
                                  @if( $confession->status == 1)
                                      <a class="badge badge-success" href="{{ route('admin.confession.status',$confession->id) }}">
                                      <i class="mdi mdi-eye"></i> Is active</a>
                                  @else
                                      <a class="badge badge-danger" href="{{ route('admin.confession.status',$confession->id) }}">
                                      <i class="mdi mdi-eye-off"></i> Not active</a>
                                  @endif
                              </td>
                              <td >
                                  <a class="btn btn-block btn-sm btn-gradient-warning edit_confession" data-confession-id="{{ $confession['id']}}" data-confession-year="{{ $confession['year']}}" data-confession-name="{{ $confession['confession']}}">Edit<i class="fa fa-edit"></i></a>
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

    <!-- Add Confession Modal -->
    <div class="modal modal-scale fade" id="addConfessionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FGSIM Confession</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.confession.store') }}">
            {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" name="year" id="year" placeholder="Year" required/>
                    </div>

                    <div class="form-group">
                        <label for="confession">Confession of Faith</label>
                        <textarea class="form-control" name="confession" id="confession" rows="5" placeholder="Write Confession of Faith..." required></textarea>
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
    <!-- End of Add Confession Modal -->

    <!-- Edit Confession Modal -->
    <div class="modal modal-scale" id="editConfessionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FGSIM Confession</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form  method="post" action="{{ route('admin.confession.update') }}">
            {{csrf_field()}}
            <input name="confession_id" id="confession_id" value="" required type="hidden">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="confession_year">Year</label>
                        <input type="number" class="form-control" name="confession_year" id="confession_year" placeholder="year" required/>
                    </div>

                    <div class="form-group">
                        <label for="confession_name">Confession of Faith</label>
                        <textarea class="form-control" name="confession_name" id="confession_name" rows="5" placeholder="Write Confession of Faith..." required></textarea>
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
    <!-- End of Edit Confession Modal -->

    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">
        CKEDITOR.replace( 'confession' );
        CKEDITOR.replace( 'confession_name' );

        $(function()  {
            $('#datatable').DataTable();
        });

         //  Script for Edit Confession Modal
         $(document).on('click', '.edit_confession', function(event) {
            // console.log('this');
            $('#editConfessionModal').modal('show');

            var confession_id = $(this).data("confession-id");
            var confession_year = $(this).data("confession-year");
            var confession_name = $(this).data("confession-name");

            $('input[name="confession_id"]').val(confession_id);
            $('input[name="confession_year"]').val(confession_year);
            CKEDITOR.instances['confession_name'].setData(confession_name);
        });
        // End Script for Edit Confession Modal

    </script>
	
</body>
</html>
