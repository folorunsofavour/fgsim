@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Admin -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Admin</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Admin</h4>

                    <form  method="post" action="{{ route('admin.administrative.update') }}">
                    {{csrf_field()}}

                        <input type="hidden" name="admin_id" id="admin_id" class="form-control" value="{{$admin->id}}" required>

                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control " value="{{$admin->lastname}}" required placeholder="Lastname">
                            </div>
                        
                            <div class="form-group col-sm-4">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" class="form-control " value="{{$admin->firstname}}" required placeholder="Firstname">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="othername">Othername</label>
                                <input type="text" class="form-control" name="othername" id="othername" class="form-control " value="{{$admin->othername}}" placeholder="Othername">
                            </div>
                        </div>
                        
                        <div class="form-row">                    
                            <div class="form-group col-sm-12">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" class="form-control " value="{{$admin->email}}" required placeholder="Email Address">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label for="phone_no">Phone Number</label>
                                <input type="number" class="form-control" name="phone_no" id="phone_no" class="form-control " value="{{$admin->phone_no}}" required placeholder="Phone Number">
                            </div>
                        
                            <div class="form-group col-sm-4">
                                <label for="role">Role</label>
                                <select name="role" class="form-control" id="role" required>
                                    @foreach($roles as $role)
                                        <option value="{{$role['id']}}" <?php if($role['id'] == $admin['role_id']){ ?> selected <?php  } ?> > {{$role['name']}} </option>
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

                        <br>
                        <button type="submit" class="btn btn-gradient-primary mr-2">UPDATE</button>
                    </form>

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

</body>
</html>
