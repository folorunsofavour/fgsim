@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Prayer Requests us -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Prayer Requests</h3>
            </div>
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Prayer Requests</h4>

                  <div class="table-responsive">
                    <table class="table table-striped table-bordered font-12" id="datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th >Full Name</th>
                                <th >Phone Number</th>
                                <th >Subject</th>
                                <th >Prayer Requests</th>
                                <th >Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($prayer_requests as $prayer_request)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td  >{{$prayer_request->fullname}}</td>
                              <td  >{{$prayer_request->phone_number}}</td>
                              <td  >{{$prayer_request->subject}}</td>
                              <td  >{{$prayer_request->message}}</td>
                              <td  >{{$prayer_request->created_at}}</td>
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

    @component('../partials.admin.footer')
    @endcomponent

    <script type="text/javascript">

        $(function()  {
            $('#datatable').DataTable();
        });

    </script>
	
</body>
</html>
