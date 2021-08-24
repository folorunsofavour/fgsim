@component('../partials.auth.header')
@endcomponent

    <div id="demo">

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div id="overlay" style="display: none;">
                        <div class="spinner"></div>
                        <br/>
                        <h5>Signing in...</h5>
                    </div>  

                </div>
                <div class="col-sm">
                    <div id="snoAlertBox" class="alert alert-danger" data-alert="alert" ></div>
                </div>
                    <div class="col-sm"></div>
            </div>
        </div>
        
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper ">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo">
                                <img src="/assets/img/apple-touch-icon.png">
                                </div>
                                <h4 style="text-align: center; color: red;"><b>Admin Dashboard </b></h4>

                                <form class="pt-3 adminLoginForm">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit"  id="login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium" >SIGN IN</button>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                        </div>
                                        <a href="#" class="auth-link text-black">Forgot password?</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>    

    @component('../partials.auth.footer')
    @endcomponent


    <script>
        function closeSnoAlertBox(){
            window.setTimeout(function () {
            $("#snoAlertBox").fadeOut()
            }, 4000);
        } 
        $(document).ready(function(){
            $(".adminLoginForm").submit(function(e){
                $('#overlay').fadeIn();
                e.preventDefault();
                var email = $("#email").val().trim();
                var password = $("#password").val().trim();

                // console.log(email + password);

                if(email.length === 0 || password.length === 0){
                    
                    if(email.length === 0){
                        $('input[type="email"]').css("border","2px solid red");
                        $('input[type="email"]').css("box-shadow","0 0 3px red");
                    }

                    if(password.length === 0){
                        $('input[type="password"]').css("border","2px solid red");
                        $('input[type="passowrd"]').css("box-shadow","0 0 3px red"); 
                    }

                    $('#overlay').fadeOut();
                    $("#snoAlertBox").fadeIn();
                    $('#snoAlertBox').text("Please fill all fields...!!!!!!");
                    closeSnoAlertBox();
                }
                else {
                    $.ajax({
                    url:'{{url("auth/login_admin")}}',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    type:'post',
                    data:{email:email , password:password},
                    success:function(response){
                        $('#overlay').fadeOut();
                        if(response['error'] == true){
                            $("#snoAlertBox").fadeIn();
                            $('#snoAlertBox').text(response['msg']);
                            closeSnoAlertBox();
                        }else{
                            window.location.href = response['redirectPage'];
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('#overlay').fadeOut();
                        $("#snoAlertBox").fadeIn();
                        $('#snoAlertBox').text(errorThrown);
                        closeSnoAlertBox();
                    }
                });
                }
            });
        });
    </script>

  </body>
</html>