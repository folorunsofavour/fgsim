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

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Branch</h4>

                    <form  method="post" action="{{ route('admin.branch_service.update') }}">
                        {{csrf_field()}}
                    
                        <input type="hidden" name="branchservice_id" id="branchservice_id" class="form-control" value="{{$branch_service->id}}" required>

                            <div class="form-row">

                                <div class="form-group col-md-12 ">
                                    <label for="country">Branch</label>
                                    <select name="country" class="select-custom-input-div form-control" id="country" required>
                                        <option selected>Select Branch</option>
                                        @foreach($branches as $branch)
                                            @if($branch->status == '1')
                                                <option value="{{$branch['id']}}" <?php if($branch['id'] == $branch_service['country_id']){ ?> selected <?php  } ?> > {{$branch['country']}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>

                            <div class="form-row"> 
                                <div class="form-group col-md-4 ">
                                    <label for="service_name">Service Name</label>
                                    <input type="text" class="form-control" name="service_name" id="service_name" value="{{$branch_service->service_name}}" placeholder="Service Name" required/>
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label for="service_day">Service Day</label>
                                    <input type="text" class="form-control" name="service_day" id="service_day" value="{{$branch_service->service_day}}" placeholder="Service Day" required/>
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label for="service_time">Service Time</label>
                                    <input type="text" class="form-control" name="service_time" id="service_time" value="{{$branch_service->service_time}}" placeholder="Service Time" required/>
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
