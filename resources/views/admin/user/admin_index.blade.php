@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Admin us -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Admin</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent
            
            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addAdminModal">Add Admin</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">FGSIM Admin</h4>

                  <div class="table-responsive">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Name</th>
                                <th >Email</th>
                                <th >Phone Number</th>
                                <th >Role</th>
                                <th >Registered By</th>
                                <th >Created</th>
                                <th >Status</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($admins as $admin)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td >{{$admin->lastname}} {{$admin->firstname}} {{$admin->othername}}</td>
                              <td >{{$admin->email}}</td>
                              <td >{{$admin->phone_no}}</td>
                              <td >{{$admin->role->name}}</td>
                              <td <?php if($admin['id'] == $admin['reg_by_id']){ ?> selected <?php  } ?> > {{$admin['lastname']}} {{$admin['firstname']}} </td>
                              <td >{{$admin->created_at}}</td>
                              <td >
                                  @if( $admin->status == 1)
                                      <a class="badge badge-success" href="{{ route('admin.administrative.status',$admin->id) }}">
                                      <i class="mdi mdi-eye"></i> Is active</a>
                                  @else
                                      <a class="badge badge-danger" href="{{ route('admin.administrative.status',$admin->id) }}">
                                      <i class="mdi mdi-eye-off"></i> Not active</a>
                                  @endif
                              </td>
                              <td >
                                <a href="{{ route('admin.administrative.edit', $admin->id) }}" class="btn btn-block btn-sm btn-gradient-warning" >Edit<i class="fa fa-edit"></i></a>
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

    <!-- Add Admin Modal -->
    <div class="modal modal-scale fade" id="addAdminModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FGSIM Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.administrative.store') }}">
            {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control " required placeholder="Lastname">
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" class="form-control " required placeholder="Firstname">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="othername">Othername</label>
                            <input type="text" class="form-control" name="othername" id="othername" class="form-control " placeholder="Othername">
                        </div>
                    </div>
                    
                    <div class="form-row">                    
                        <div class="form-group col-sm-12">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" class="form-control " required placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="phone_no">Phone Number</label>
                            <input type="number" class="form-control" name="phone_no" id="phone_no" class="form-control " required placeholder="Phone Number">
                        </div>
                    
                        <div class="form-group col-sm-4">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role" required>
                                <option selected>Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role['id']}}" > {{$role->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="gender">Gender</label>
                            <br>
                            MALE
                            <input type="radio" id="gender" name="gender" value="M" >
                            FEMALE
                            <input type="radio" id="gender" name="gender" value="F" >
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
    <!-- End of Add History Modal -->

    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">

        $(function()  {
            $('#datatable').DataTable();
        });

        // $(document).ready(function() {
        //     $('#datatable').DataTable();                
        // });

    </script>
	
</body>
</html>
