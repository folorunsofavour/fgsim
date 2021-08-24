@component('../partials.welcome.header')
@endcomponent


<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
        <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
            <!-- Uncomment below if you prefer to use an text logo -->
            <!--<h1 class="text-light"><a href="index.html"><span>FGSIM</span></a></h1>-->
            <a href="index.html"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
            <li ><a href="/">Home</a></li>
            <li class="active"><a href="#about">About Us</a></li>
            <li><a href="/#services">Services</a></li>
            <li><a href="/#media">Media</a></li>
            <li><a href="/#team">Ministers</a></li>
            <li><a href="/#contact">Contact</a></li>

            <li class="get-started"><a  data-toggle="modal" data-target="#OfferingModal">Offering</a></li>
            </ul>
        </nav><!-- .nav-menu -->
        </div><!-- End Header Container -->
    </div>
</header><!-- End Header -->


<!-- Offering Modal -->
<div class="modal modal-scale fade" id="OfferingModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Account Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

            <h3>Offering Details</h3>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-gradient-info" data-dismiss="modal">CLOSE</button>
        </div>
      </div>
    </div>
</div>
<!-- End of Offering Modal -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h1>About Us</h1>
          <ol>
            <li><a href="#history" class="scrollto">History</a></li>
            <li><a href="#board" class="scrollto">Board members</a></li>
            <li><a href="#team" class="scrollto">Ministers</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row content">
          <div class="col-lg-12 section-title" data-aos="fade-right" data-aos-delay="100">
            <h2 style=" font-size: 30px;">About Us</h2>
            <h3 style="color:red; font-size: 20px"><b>FULL GOSPEL SANCTUARY INT'L MINISTRIES</b></h3>
            <p><b><i>"Behold, I am the Lord, the GOD of all flesh, is there any thing too hard for me?" JEREMIAH 32 : 27</i></b></p>
            <p>
            {!!$about->name!!}
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Make HEAVEN</li>
              <li><i class="ri-check-double-line"></i>TAKE as many PEOPLE as possible with US</li>
              <li><i class="ri-check-double-line"></i>DEPOPULATE the kingdom of HELL and POPULATE the kingdom of HEAVEN</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    <!-- ======= About us Details Section ======= -->

<!-- ======= History Section ======= -->
    <section id="history" class="history timeline">
      <div class="container">
        <div class="row content">
          <div class="col-lg-12 pt-4 pt-lg-0 section-title" data-aos="fade-left" data-aos-delay="200">
              <h1>History</h1>
              <ul>
              @if(count($histories) > 0)
                    @foreach($histories as $history)
                        <li>
                            <div class="content">
                                <h2>
                                <time>{{$history->year}}</time>
                                </h2>
                                <p>General theme of the year {!!$history->theme!!} </p>
                            </div>
                        </li>
                    @endforeach
                @else
                <h3 class="font-light font-header no-m-t text-dark section-heading">No History Yet...</h3>
                @endif
              </ul>
           
          </div>
        </div>
      </div>
    </section>


    <!-- ======= Board Members Section ======= -->
    <section id="board" class="team" style="background: #f6f6f7;">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>The Board Commitee</h2>
              <p>We believe in transparency , here are the board commitee.</p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">

                @if(count($ministers) > 0)
                    @foreach($ministers as $minister)
                        @if($minister->category == 'Board of Director')
                            <div class="col-lg-4 mt-4 mt-lg-0">
                                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                <div class="pic"><img src="/storage/images/minister/document/{{$minister['minister_image']}}" class="img-circle" alt="" style="width:300px; height:300px !important"></div>
                                <div class="member-info">
                                    <h4>{{$minister->lastname}} {{$minister->firstname}} {{$minister->othername}}</h4>
                                    <span>{{$minister->position}}</span>
                                    <!---<p>a writeup for the ministers just incase</p>-->
                                </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                <h3 class="font-light font-header no-m-t text-dark section-heading">No Board of Director Yet...</h3>
                @endif

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Board Members Section -->

    <!-- ======= Minister Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>The Ministers</h2>
              <p>With the primary focus on Jesus and making Heaven, meet the anointed ministers of God, leading, bringing and teaching people the ways and messages of God.</p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">

                @if(count($ministers) > 0)
                    @foreach($ministers as $minister)
                        @if($minister->category == 'Minister')
                            <div class="col-lg-4 mt-4 mt-lg-0">
                                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                <div class="pic"><img src="/storage/images/minister/document/{{$minister['minister_image']}}" class="img-circle" alt="" style="width:300px; height:300px !important"></div>
                                <div class="member-info">
                                    <h4>{{$minister->lastname}} {{$minister->firstname}} {{$minister->othername}}</h4>
                                    <span>{{$minister->position}}</span>
                                    <!---<p>a writeup for the ministers just incase</p>-->
                                </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                <h3 class="font-light font-header no-m-t text-dark section-heading">No Ministers Yet...</h3>
                @endif

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Ministers Section -->

  </main><!-- End #main -->

  @component('../partials.welcome.footer')
  @endcomponent
	
</body>
</html>