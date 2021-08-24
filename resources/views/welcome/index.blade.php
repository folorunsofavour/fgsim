@component('../partials.welcome.header')
@endcomponent

@component('../partials.welcome.top_nav')
@endcomponent

@component('../partials._flash_message')
@endcomponent

<!-- ======= popup Section ======= -->
<div id="ac-wrapper" style='display:none'>
    <div id="popup">
        <center>
        <!--DISPLAYED IMAGE IN STYLES.CSS UNDER POPUP BOX, #POPUP,  BACKGROUND-->
            <input type="submit" name="submit" value="CLOSE" onClick="PopUp('hide')" />
            <p style="color:red;">
                @if($announcement)
                    {!!$announcement->announcement!!}
                @else
                    No Announcement Yet!!!
                @endif
            </p>
        </center>
    </div>
</div>
<!-- ======= End popup Section ======= -->

    <!-- ======= Slider Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <span> <img class="img-top" src="/assets/img/apple-touch-icon.png" alt="logo"/></span>
        <h1>
            @if($history)
                {{$history->year}} {!!$history->theme!!}
            @else
                No History Yet!!!
            @endif
        </h1>
        <h2>Confess it, Believe it and let it be your motto</h2>
        <a href="#about" class="btn-get-started scrollto">Find Out More</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row content">
                <div class="col-lg-6 section-title" data-aos="fade-right" data-aos-delay="100">
                    <h2 style=" font-size: 30px;">About Us</h2>
                    <h3 style="color:red; font-size: 20px; text-align: center;"><b>FULL GOSPEL SANCTUARY INT'L MINISTRIES</b></h3>
                    <h3 style="color:blue; font-size: 20px; text-align: center;"><b><i>( F.G.S.I.M )</i></b></h3>
                    <!--<p><b><i>"Behold, I am the Lord, the GOD of all flesh, is there any thing too hard for me?" JEREMIAH 32 : 27</i></b></p>-->    </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                    <p>
                    @if($history)
                        {!!$about->name!!}
                    @else
                        No About Yet!!!
                    @endif
                    </p>
                    <ul>
                    <li><i class="ri-check-double-line"></i>Be a cadidate of heaven</li>
                    <li><i class="ri-check-double-line"></i>teach and undiluted word of God to all Nations</li>
                    <li><i class="ri-check-double-line"></i>Bringing Men and Women towards the kingdom addition of the gospel of Jesus Christ</li>
                    </ul>
                    <p style="color:red;"><b><i>Our Watch Word</i><b/></p>
                    <p><b><i>"Behold, I am the Lord, the GOD of all flesh, is there any thing too hard for me?" JEREMIAH 32 : 27</i></b></p>
                    <div class="font-italic content">
                        <a href="{{ route('about_details') }}" class="more-btn">Click to find out more <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->  
        <section id="counts" class="counts">
            <div class="container">

                <div class="row">

                <div class="col-lg-3 col-12 text-center"  d-flex align-items-stretch" data-aos="fade-right" data-aos-delay="200">
                    <span> <img class="img-circle" src="/assets/img/trust-perpul.png" alt="Bible Studies "/></span>
                    <h3>Bible Studies</h3>
                    <p>Wenesday by 6PM</p>
                </div>

                <div class="col-lg-3 col-12 text-center" d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <span> <img class="img-circle" src="/assets/img/pray-perpul.png" alt="Power Service"/></span>
                    <h3>Power Service</h3>
                    <p>Friday by 6PM</p>
                </div>

                <div class="col-lg-3 col-12 text-center"  d-flex align-items-stretch" data-aos="fade-left" data-aos-delay="200">
                    <span> <img class="img-circle" src="/assets/img/church.png" alt="Sunday"/></span>
                    <h3 data-aos="fade-right">Celebration Service</h3>
                    <p >Sunday by 8:45AM</p>
                </div>

                <div class="col-lg-3 col-6 text-center"  d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <span> <img class="img-circle" src="/assets/img/church.png" alt="last Sunday" /></span>
                    <h3>Thanks Giving</h3>
                    <p>Last Sunday of the Month by 8AM</p>
                </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Confesion Section ======= -->
        <section id="confession" class="confession">
            <div class="container">

                <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
                    <div class="content">
                    @if($confession)
                    <h3>
                        CONFESSION<br>OF FAITH {{$confession->year}}
                    </h3>
                    <p>
                        {!!$confession->confession!!}
                    </p>
                    @else
                        No Confession Yet!!!
                    @endif
                    <!--<div class="text-center">
                        <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                    </div>-->
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-church bx-flashing"></i>
                            <h4>Power Night</h4>
                            <p>Experience the power of God in new way at the Power Night Service, every last friday of each Month from 10PM till dawn</p>
                        </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-book bx-spin"></i>
                            <h4>Sunday School</h4>
                            <p>We believe in the teaching of the word of God, what better place to learn, interact and ask question than the sunday school every Sunday by 8AM</p>
                        </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-church bx-flashing"></i>
                            <h4>Hour of Establisment</h4>
                            <p>Need to understand how to be established in christ, your business and more, join us every 3rd saturday of each month by 8AM.</p>
                        </div>
                        </div>
                    </div>
                    </div><!-- End .content-->
                </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">

                <div class="text-center" data-aos="zoom-in">
                <h3>PRAYER REQUEST / COUNSELLING</h3>
                <p> With Various anointed Ministers and Professional counsellors who believe in confidentiality on ground at FGSIM we attend to your prayer request or counselling needs on a personal level .</p>
                <a  href="#contact" class="cta-btn scrollto">Apply Here</a>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="row">
                <div class="col-lg-4">
                    <div class="section-title" data-aos="fade-right">
                    <h2>Our Branches Services</h2>
                    <p>At Full gospel Sanctuary Int'l Ministries (FGSIM), We understand the rules, schedule and laws of each countries across the globe therefore scheduling each of our services to convinently meet the demand of such countries.
                    <br> The Following are each of our branches Service Days and Time.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                    @if(count($branch_services) > 0)
                        @foreach($branch_services as $branch_service => $services)
                            <div class="col-md-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon"><i class="bx bx-church bx-burst"></i></div>

                                    <h4 style="color: #2504a0">{{$branch_service}}</h4>
                                    @foreach($services as $service )
                                        <p>{{$service->service_name}} - {{$service->service_day}} - {{$service->service_time}}<br></p>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        No Services Yet!!!
                    @endif
                    </div>
                </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="media" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="fade-left">
                <h2>Media Portfolio</h2>
                <p>Collection of Video and Audio of all Full Gospel Sanctuary Events and Activities.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-weekly">Weekly Services</li>
                        <li data-filter=".filter-sunday">Sunday Services</li>
                        <li data-filter=".filter-special">Special Events</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    @if(count($medias) > 0)
                        @foreach($medias as $media)

                            @if($media->category == 'Weekly Service')

                                <div class="col-lg-4 col-md-6 portfolio-item filter-weekly">
                                    <div class="portfolio-wrap">
                                    <img src="/storage/images/media/document/{{$media['media_image']}}" class="img-fluid" alt="" style="width:400px; height:300px !important">
                                    <div class="portfolio-info">
                                        <h4>{{$media->subject}}</h4>
                                        <div class="portfolio-links">
                                        <a href="/storage/images/media/document/{{$media['media_image']}}" data-gall="portfolioGallery" class="venobox" title="Expand"><i class="bx bx-plus"></i></a>
                                        <a href="/storage/images/media/document/{{$media['media_image']}}" title="Download"><i class="bx bx-download"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            @endif

                            @if($media->category == 'Special Program')

                                <div class="col-lg-4 col-md-6 portfolio-item filter-special">
                                    <div class="portfolio-wrap">
                                    <img src="/storage/images/media/document/{{$media['media_image']}}" class="img-fluid" alt="" style="width:400px; height:300px !important">
                                    <div class="portfolio-info">
                                        <h4>{{$media->subject}}</h4>
                                        <div class="portfolio-links">
                                        <a href="/storage/images/media/document/{{$media['media_image']}}" data-gall="portfolioGallery" class="venobox" title="Expand"><i class="bx bx-plus"></i></a>
                                        <a href="/storage/images/media/document/{{$media['media_image']}}" title="Download"><i class="bx bx-download"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            @endif

                            @if($media->category == 'Sunday Service')

                                <div class="col-lg-4 col-md-6 portfolio-item filter-sunday">
                                    <div class="portfolio-wrap">
                                    <img src="/storage/images/media/document/{{$media['media_image']}}" class="img-fluid" alt="" style="width:400px; height:300px !important">
                                    <div class="portfolio-info">
                                        <h4>{{$media->subject}}</h4>
                                        <div class="portfolio-links">
                                        <a href="/storage/images/media/document/{{$media['media_image']}}" data-gall="portfolioGallery" class="venobox" title="Expand"><i class="bx bx-plus"></i></a>
                                        <a href="/storage/images/media/document/{{$media['media_image']}}" title="Download"><i class="bx bx-download"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    @else
                    <h3 class="font-light font-header no-m-t text-dark section-heading">No Media Yet...</h3>
                    @endif

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title" data-aos="fade-right">
                        <h2>Testimonies</h2>
                        <p>To Show the glory of the lord and that he is still working miracles in our days, here are this Week Testimonies from all Our Churches around the world.</p>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="owl-carousel testimonials-carousel">
                        
                            @if(count($testimonies) > 0)
                                @foreach($testimonies as $testimony)
                                    <div class="testimonial-item">
                                        <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                {!!$testimony->testimony!!}
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                        <img src="/storage/images/testimony/document/{{$testimony['picture']}}" class="testimonial-img" alt="" tyle="width:200px; height:150px !important">
                                        <h3>{{$testimony->subject}}</h3>
                                        <h4>{{$testimony->fullname}}</h4>
                                    </div>
                                @endforeach
                            @else
                            <h3 class="font-light font-header no-m-t text-dark section-heading">No Testimonies Yet...</h3>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

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
                                @endforeach
                            @else
                            <h3 class="font-light font-header no-m-t text-dark section-heading">No Ministers Yet...</h3>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Ministers Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="section-title">
                        <h2>Contact</h2>
                        <p>To Worship with us, enquires, questions and more. Please call/mail us or send a message via the contact message box.</p>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
                        <div class="info mt-4">
                            <i class="icofont-google-map"></i>
                            <h4>Headquater:</h4>
                            <p>9-11 Gospel Close, Okunola Road, Egbeda, Lagos, Nigeria</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mt-4">
                                <div class="info">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>fullgospelSanctuary@yahoo.com</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info w-100 mt-4">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>(+234) 802-302-2060; 805-235-8431 </p>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('message.store') }}" method="post" role="form" >
                        {{csrf_field()}}
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Your FullName" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                <input type="number" class="form-control" name="phone_no" id="phone_no" placeholder="Your Phone Number" data-rule="number" data-msg="Please enter a valid Phone Number" />
                                <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-lg" name="category" id="category" data-msg="Please select a category">
                                    <option>Please select a category</option>
                                    <option value="Counselling">Counselling</option>
                                    <option value="Prayer Request">Prayer-Request</option>
                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="5" data-rule="required" data-msg="Please Write your message" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <!-- <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div> -->
                            <div class="text-center"><button type="submit" class="btn btn-info mr-2">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    @component('../partials.welcome.footer')
    @endcomponent

	
</body>
</html>