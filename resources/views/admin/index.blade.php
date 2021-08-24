@component('../partials.admin.header')
@endcomponent

<div class="container-scroller">
    @component('../partials.admin.top_nav')
    @endcomponent

    <div class="container-fluid page-body-wrapper">

        @component('../partials.admin.side_nav')
        @endcomponent

        <!-- Dash Board -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="/assets/img/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Active Ministers<i class="mdi mdi-alert-circle mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$ministers}} </h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="/assets/img/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Active Branches<i class="mdi mdi-alert-circle-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$branches}}</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="/assets/img/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Prayer Request<i class="mdi mdi-web mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$prayer_request}}</h2>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>

                    <div class="row mt-3">
                      @if(count($medias) > 0)
                          @foreach($medias as $media)
                        <div class="col-6 pr-1">
                          <img src="/storage/images/media/document/{{$media['media_image']}}" class="img-fluid" alt="" style="width:400px; height:300px !important">
                        </div>
                        @endforeach
                      @endif
                    </div>
                    <div class="d-flex mt-5 align-items-top">
                      <img src="/assets/img/testimonies/andrew folorunso.jpg" class="img-sm rounded-circle mr-3" alt="image">
                      <div class="mb-0 flex-grow">
                        <h5 class="mr-2 mb-2">Annoucement</h5>
                        <p class="mb-0 font-weight-light">{!!$announcement->announcement!!}</p>
                      </div>
                      <div class="ml-auto">
                        <i class="mdi mdi-heart-outline text-muted"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
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
