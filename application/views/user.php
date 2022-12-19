<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title)? $title: 'Title-' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <section class="vh-100" style="background-color: #000;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    <form class="mx-1 mx-md-4" id="regist_form" method="post">
		                                <div id="message"></div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="username" class="form-control" name="username"/>
                                            <label class="form-label" for="username">Your Name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="email" class="form-control" name="email" />
                                            <label class="form-label" for="email">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="mobile" class="form-control" name="mobile"  />
                                            <label class="form-label" for="mobile">Mobile</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4c" class="form-control" name="password"/>
                                            <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg" name="regist" id="regist">Register</button>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <a href="<?= base_url('auth/loginPage'); ?>">Already Have an account ? Signin in here !</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="<?= base_url("assets/images/draw1.webp") ?>"
                                    class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.2.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
           $(document).on('submit', '#regist_form', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                console.log(form_data);
                $.ajax({
                    url:"<?php echo base_url('Auth/regist') ?>",
                    method:"POST",
                    data:form_data,
                    beforeSend:function(){
                        $('#regist').attr('disabled','disabled');
                        $('#regist').html('<span class="spinner-border spinner-border-sm"></span> Please Wait...')
                    } ,
                    dataType:"json",
                    success:function(data)
                    { 
				        $('#regist_form')[0].reset();
                        $('#message').fadeIn().html(data);
                        $('#regist').html('Register')
                        $('#regist').attr('disabled',false);
                        setTimeout(function() {
                        $('.alert').fadeOut(10000);
                        }, 10000);
                        window.location.href= "<?php echo base_url('auth/loginPage') ?>"
                    }
                });
            }); 
        });
    </script>
</body>
</html>

    