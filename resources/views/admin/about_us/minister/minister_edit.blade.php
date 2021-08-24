@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Ministers and Directors -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ministers and Directors</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ministers and Directors</h4>

                    <form  method="post" action="{{ route('admin.minister.update') }}" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <input type="hidden" name="minister_id" id="minister_id" class="form-control" value="{{$ministers->id}}" required>

                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <input type="text" name="lastname" id="lastname" class="form-control" value="{{$ministers->lastname}}" placeholder="Lastname" required>
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text" name="firstname" id="firstname" class="form-control" value="{{$ministers->firstname}}" placeholder="Firstname" required>
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text" name="othername" id="othername" class="form-control" value="{{$ministers->othername}}" placeholder="Othername">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <select id="category" name="category" class="form-control" required>

                                <option value="Minister"  {{ $ministers->category == 'Minister' ? 'selected':'' }} >Minister</option>
                                <option value="Board of Director "{{ $ministers->category == 'Board of Director' ? 'selected':'' }}>Board of Director</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="text" name="position" id="position" class="form-control" value="{{$ministers->position}}" placeholder="Position" required>
                            </div>
                            
                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-6">
                                <img src="/storage/images/minister/document/{{$ministers['minister_image']}}"  width="450" height="300">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="file" name="minister_image" id="minister_image" class="form-control" >
                            </div>
                            
                        </div>

                        </br>
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
	
    @component('../partials.admin.footer')
    @endcomponent
    
</body>
</html>
