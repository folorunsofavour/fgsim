@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Media -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Media</h3>
            </div>

            @component('../../partials._flash_message')
            @endcomponent

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Media</h4>

                    <form  method="post" action="{{ route('admin.media.update') }}" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <input type="hidden" name="media_id" id="media_id" class="form-control" value="{{$medias->id}}" required>

                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <select id="category" name="category" class="form-control" required>
                                  
                                <option value="Special Program" {{ $medias->category == 'Special Program' ? 'selected':'' }}>Special Program</option>
                                <option value="Sunday Service" {{ $medias->category == 'Sunday Service' ? 'selected':'' }} >Sunday Service</option>
                                <option value="Weekly Service" {{ $medias->category == 'Weekly Service' ? 'selected':'' }} >Weekly Service</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="text" name="subject" id="subject" class="form-control" value="{{$medias->subject}}" placeholder="Position" required>
                            </div>
                            
                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-6">
                                <img src="/storage/images/media/document/{{$medias['media_image']}}"  width="450" height="300">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="file" name="media_image" id="media_image" class="form-control" >
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
