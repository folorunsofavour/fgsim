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
            
            <br>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Role</h4>
                    <form id="RoleEditForm" method="POST" action="{{ route('admin.role.update') }}">
                        @csrf
                        <br>
                        <input type="hidden" name="role_id" value="{{ $role->id }}">
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                        </div>

                        <div class="form-group">
                            <label for="name">Select Priviledges</label>
                            <div class="grid-div2">
                                @foreach($all_permissions as $allPerm)
                                    @php($checked = '')
                                    @foreach($role->permissions as $rolePerm)
                                        @if($allPerm->name == $rolePerm->name && $allPerm->id == $rolePerm->id)
                                            @php($checked = 'checked')
                                        @endif
                                    @endforeach
                                    <div class="form-group" id="div-checkbox">
                                        <input type="checkbox" name="permission[{{ $allPerm->id }}]" id="{{ $allPerm->id }}" {{ $checked }} class="checkbox">
                                        <label for="{{ $allPerm->id }}"> {{ $allPerm->name }} </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-gradient-primary">Update</button>
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

    @component('../partials.admin.footer')
    @endcomponent
	
</body>
</html>
