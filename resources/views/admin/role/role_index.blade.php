@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Role us -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Role</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent
            
            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <a style="background-color: #00263a; color: #fff;" class="btn filterBtn"><i class="fa fa-filter"></i> Filter</a>

                    <div class="myFilter">
                        <form method="GET" action="{{route('admin.roles')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="selection_menu" value="selection_menu">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" class="select-custom-input-div form-control" id="role_id" required>
                                    <option selected>Select a role</option>
                                    @foreach($fil_role as $role)
                                        <option value="{{$role['id']}}" > {{$role['name']}} </option>
                                    @endforeach
                                </select>
                            </div>
                                            
                            <br>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>

                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addRoleModal">Add Role</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Role</h4>

                  <div class="table-responsive">

                    @if(isset($selected_role))
                    <table class="table table-bordered table-hover table-striped" id="datatable">
                        <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Name</th>
                            <th scope="col">Permissions</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($selected_role as $role)
                                <tr>
                                    <td scope="row">{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $id => $permission)
                                            <div class="form-group">
                                                {{ $id+1 .'.' }}
                                                {{ $permission->name }}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if( $role->status == 1)
                                            <a class="badge badge-success"

                                               href="{{ route('admin.role.update_status',$role->id) }}">
                                               <i class="mdi mdi-eye"></i> Is active</a>
                                        @else
                                            <a class="badge badge-danger"
                                               href="{{ route('admin.role.update_status',$role->id) }}">
                                               <i class="mdi mdi-eye-off"></i> Not active</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-block btn-sm btn-gradient-warning">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <table class="table table-responsive table-bordered table-hover table-striped" style="text-align:center;">
                            <tbody>
                                <tr>
                                    <td>No Roles Found (Use Filter) </td>
                                </tr>                       
                            </tbody>
                        </table>
                    @endif
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

    <!-- Add Role Modal -->
    <div class="modal modal-scale fade" id="addRoleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Role</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.role.create') }}">
            {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Role" name="name">
                    </div>

                    <div class="form-group">
                        <label for="name">Select Priviledges</label>
                        <div class="grid-div">
                            @foreach($permissions as $permission)
                                <div class="form-group" id="div-checkbox">
                                    <input type="checkbox" name="permission[{{ $permission->id }}]" id="{{ $permission->id }}" class="checkbox">
                                    <label for="{{ $permission->id }}"> {{ $permission->name }} </label>
                                </div>
                            @endforeach
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
    <!-- End of Add Role Modal -->


    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">

        $(function()  {
            $('#datatable').DataTable();
        });

        $(".filterBtn").on('click', function(e){
            $('.myFilter').toggle();
            // alert('hi')
        });

         //  Script for Edit Role Modal
        //  $(document).on('click', '.edit_role', function(event) {
        //     // console.log('this');
        //     $('#editRoleModal').modal('show');

        //     var role_id = $(this).data("role-id");
        //     var name = $(this).data("role-name");

        //     $('input[name="role_id"]').val(role_id);
        //     $('input[name="name"]').val(name);
        // });
        // End Script for Edit Role Modal

    </script>
	
</body>
</html>
