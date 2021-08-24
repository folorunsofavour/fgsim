@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Branch -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Branch</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent
            
            <!-- /. button panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-gradient-primary mr-2" data-toggle="modal" data-target="#addBranchModal">Add Branch</button>
                    <button type="button" class="btn btn-gradient-success mr-2" data-toggle="modal" data-target="#BranchServiceModal">Add Services</button>
                </div>
            </div><!-- /.panel -->
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Branches</h4>

                  <div class="table-responsive">
                    <table class="table table-striped table-bordered font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Branch Country</th>
                                <th >Service</th>
                                <th colspan="2" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($branch_services as $branch_service)
                            <tr>
                              <td >{{$loop->iteration}}</td>
                              <td >{{$branch_service->branch->country}}</td>
                              <td >{{$branch_service->service_name}} {{$branch_service->service_day}} {{$branch_service->service_time}}</td>                              
                              <td>
                                <a href="{{ route('admin.branch_service.edit',$branch_service->id) }}" class="btn btn-block btn-sm btn-gradient-warning " >Edit<i class="fa fa-edit"></i></a>
                              </td>
                              <td> <a href="{{ route('admin.branch_service.delete', $branch_service->id) }}" onclick="return confirm('Are you sure you want to delete this Branch Details?');" class="btn btn-block btn-sm btn-gradient-danger">Delete<i class="fa fa-trash"></i></a>
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

    <!-- Add Branch Services Modal -->
    <div class="modal modal-scale fade" id="BranchServiceModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">FGSIM Branch Services</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
            </div>
            
            <form  method="post" action="{{ route('admin.branch_service.store') }}">
            {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="country">Branch</label>
                            <select name="country" class="select-custom-input-div form-control" id="country" required>
                                <option selected>Select Branch</option>
                                @foreach($branches as $branch)
                                    @if($branch->status == '1')
                                        <option value="{{$branch['id']}}" > {{$branch['country']}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row input_fields_wrap">

                        <div class="form-row col-md-12">
                            <div class="form-row col-md-9 clone_row">
                                <div class="form-row col-md-12">  
                                    <div class="form-group col-md-4 service_name_row">
                                        <label for="service_name">Service Name</label>
                                        <input type="text" class="form-control" name="service_name[]" id="service_name" placeholder="Service Name" required/>
                                    </div>

                                    <div class="form-group col-md-4 service_day_row">
                                        <label for="service_day">Service Day</label>
                                        <input type="text" class="form-control" name="service_day[]" id="service_day" placeholder="Service Day" required/>
                                    </div>

                                    <div class="form-group col-md-4 service_time_row">
                                        <label for="service_time">Service Time</label>
                                        <input type="text" class="form-control" name="service_time[]" id="service_time" placeholder="Service Time" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row col-md-3">
                                    <div class="form-group col-md-2">
                                        <label for="course"></label>
                                        <button style="background-color:green; margin-left: 30px;" id="load_course" class="add_field_button btn btn-info active form-control">Add<i class="fa fa-plus-circle"></i></button>
                                    </div> 
                            </div>
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
    <!-- End of Add Branch Service Modal -->

    <!-- Add Branch Modal -->
    <div class="modal modal-scale fade" id="addBranchModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FGSIM Branch</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form  method="post" action="{{ route('admin.branch.store') }}">
            {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="branch">Branch</label>
                        <input type="text" class="form-control" name="branch" id="branch" placeholder="Branch" required/>
                    </div>

                    <div class="form-group ">
                        <label for="address">Branch Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-danger" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-gradient-primary mr-2">SAVE</button>
                </div>
            </form>

            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered font-12">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th >Branch</th>
                            <th >Address</th>
                            <th >Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                        <tr>
                            <td >{{$loop->iteration}}</td>
                            <td >{{$branch->country}}</td>
                            <td >{{$branch->address}}</td>
                            <td class="text-center">
                                @if( $branch->status == 1)
                                    <a class="badge badge-success" href="{{ route('admin.branch.status',$branch->id) }}">
                                    <i class="mdi mdi-eye"></i> Is active</a>
                                @else
                                    <a class="badge badge-danger" href="{{ route('admin.branch.status',$branch->id) }}">
                                    <i class="mdi mdi-eye-off"></i> Not active</a>
                                @endif
                            </td>
                            <td >
                                <a class="btn btn-block btn-sm btn-gradient-warning edit_branch" data-branch-id="{{ $branch['id']}}" data-branch-country="{{ $branch['country']}}" data-branch-address="{{ $branch['address']}}" >Edit<i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
    <!-- End of Add Branch Modal -->

    <!-- Edit Branch Modal -->
    <div class="modal modal-scale" id="editBranchModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit FGSIM Branch</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form  method="post" action="{{ route('admin.branch.update') }}">
            {{csrf_field()}}
            <input name="branch_id" id="branch_id" value="" required type="hidden">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="branch_country">Branch</label>
                        <input type="text" class="form-control" name="branch_country" id="branch_country" placeholder="Branch" required/>
                    </div>
                    
                    <div class="form-group ">
                        <label for="branch_address">Branch Address</label>
                        <input type="text" class="form-control" name="branch_address" id="branch_address" placeholder="Address" required/>
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

    @component('../partials.admin.footer')
    @endcomponent


    <script type="text/javascript">

        $(function()  {
            $('#datatable').DataTable();
        });

        $(document).ready(function() {

            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            var sd = '<div style="cursor:pointer;color:red; margin-top:35px; margin-left:35px;" class="remove_field">Remove<i class="fa fa-times"></i></div>';
            var x = 1; //initlal text box count

            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    var clone = $(".clone_row").eq(0).clone();
                    $(sd).appendTo(clone);

                    $(wrapper).append(clone); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); 
                $(this).parent('div').remove(); x--;
            })

        });

         //  Script for Edit Branch Modal
         $(document).on('click', '.edit_branch', function(event) {
            $('#addBranchModal').modal('hide');
            $('#editBranchModal').modal('show');

            var branch_id = $(this).data("branch-id");
            var branch_country = $(this).data("branch-country");
            var branch_address = $(this).data("branch-address");

            $('input[name="branch_id"]').val(branch_id);
            $('input[name="branch_country"]').val(branch_country);
            $('input[name="branch_address"]').val(branch_address);
        });
        // End Script for Edit Branch Modal

    </script>
	
</body>
</html>
