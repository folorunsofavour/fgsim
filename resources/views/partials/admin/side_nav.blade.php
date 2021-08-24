<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="admim-profile.html" class="nav-link">
            <!-- <div class="nav-profile-image">
                <img src="/assets/img/testimonies/andrew folorunso.jpg" alt="profile">
                <span class="login-status online"></span>
                change to offline or busy as needed
            </div> -->
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{auth()->user()->lastname }} {{auth()->user()->firstname }}</span>
                <a data-toggle="modal" data-target="#editProfileModal"><i class="mdi mdi-account-star text-success nav-profile-badge"></i><span class="text-secondary text-small">Profile</span></a>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu1" data-toggle="collapse" aria-expanded="false">
            <span class="menu-title">Home Page</span>
            <i class="mdi mdi-web menu-icon"></i>
            </a>
            <div class="sub-menu collapse secondary list-style-circle" id="submenu1">
                <ul>
                    <li><a href="{{ route('admin.confession') }}" class="animsition-link">Confession Of Faith</a></li>
                    <li><a href="{{ route('admin.announcement') }}" class="animsition-link">Announcement</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu4" data-toggle="collapse" aria-expanded="false">
            <span class="menu-title">About Us</span>
            <i class="mdi mdi-face menu-icon"></i>
            </a>
            <div class="sub-menu collapse secondary list-style-circle" id="submenu4">
                <ul>
                    <li><a href="{{ route('admin.about') }}" class="animsition-link">About</a></li>
                    <li><a href="{{ route('admin.history') }}" class="animsition-link">History</a></li>
                    <li><a href="{{ route('admin.minister') }}" class="animsition-link">Ministers and Directors</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.media') }}">
            <span class="menu-title">Media</span>
            <i class="mdi mdi-video-vintage menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.branch_service') }}">
            <span class="menu-title">Branches</span>
            <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu3" data-toggle="collapse" aria-expanded="false">
            <span class="menu-title">Messages</span>
            <i class="mdi mdi-message-text menu-icon"></i>
            </a>
            <div class="sub-menu collapse secondary list-style-circle" id="submenu3">
                <ul>
                    <li><a href="{{ route('admin.testimony') }}" class="animsition-link">Testimonies</a></li>
                    <li><a href="{{ route('admin.counselling') }}" class="animsition-link">Counselling</a></li>
                    <li><a href="{{ route('admin.prayer_request') }}" class="animsition-link">Prayer Requests</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu5" data-toggle="collapse" aria-expanded="false">
            <span class="menu-title">Administrative</span>
            <i class="mdi mdi-account-star menu-icon"></i>
            </a>
            <div class="sub-menu collapse secondary list-style-circle" id="submenu5">
                <ul>
                    <li><a href="{{ route('admin.administrative') }}" class="animsition-link">Admin</a></li>
                    <li><a href="{{ route('admin.roles') }}" class="animsition-link">Roles and Priviledges</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item sidebar-actions">
            <span class="nav-link">
            <a href="{{ route('auth.logout_admin') }}"class="btn btn-block btn-lg btn-gradient-primary mt-4">Log Out</a>
            </span>
        </li>
    </ul>
</nav>

<!-- Edit profile Modal -->
<div class="modal modal-scale fade" id="editProfileModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form  method="post" action="{{ route('admin.profile.update') }}">
        {{csrf_field()}}
            <div class="modal-body">

                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control " required disabled value="{{ auth()->user()->lastname }}">
                    </div>
                
                    <div class="form-group col-sm-6">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" required disabled value="{{ auth()->user()->firstname }}">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="othername">Othername</label>
                        <input type="text" class="form-control" name="othername" id="othername" disabled value="{{ auth()->user()->othername }}">
                    </div>
                
                    <div class="form-group col-sm-6">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" required disabled value="{{ auth()->user()->email }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" name="gender" id="gender" required disabled value="{{ auth()->user()->gender }}">
                    </div>
                
                    <div class="form-group col-sm-6">
                        <label for="phone_no">Phone Number</label>
                        <input type="text" class="form-control" name="phone_no" id="phone_no" required value="{{ auth()->user()->phone_no}}" placeholder="Phone Number">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-gradient-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-gradient-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
</div>
<!-- End of Edit Profile Modal -->


<script>

  $(document).ready(function(){
    //   $(".adminLoginForm").submit(function(e){
        // $(document).on('click', '.edit_mandate', function(event) {
          
              $.ajax({
              url:'{{url("admin/profile")}}',
              type:'get',
              success:function(data){
                  console.log(data);
                // $('input[name="role"]').val(courseunit_id);
              },
              error: function () {
                console.log(data);
              }
          });
// });
    //   });
  });
 </script>