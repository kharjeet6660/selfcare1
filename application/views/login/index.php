<?php $this->load->view('includes/head') ?>
<!-- Log In page -->
<div class="container-md">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card">
                            <div class="card-body p-10">
                                <div class="text-center p-3">
                                    <a href="<?php echo base_url(); ?>" class="logo logo-admin">
                                        <img src="<?php echo base_url('asset/images/logo.png'); ?>" height="50" alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Started</h4>   
                                    <p class="text-muted  mb-0">Sign in to your account.</p>  
                                </div>
                            </div>
                            <?php $this->load->view('includes/flashdata') ?>
                            <div class="card-body pt-0">                                    
                                <?php echo form_open(); ?>
                                <?php 
                                if(validation_errors()) {
                                 echo "<div class='alert alert-danger border-0 mt-2 ' role='alert'>
                                 ".validation_errors()."</div>";
                             }
                             ?>
                             <div class="form-group mt-3 mb-2">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control"  name="username" placeholder="Enter User ID" type="text">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="userpassword">Password</label>                                            
                                <input class="form-control"  name="password" placeholder="Enter Password" type="password">
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-check form-switch form-switch-success">
                                        <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                        <label class="form-check-label" for="customSwitchSuccess">Remember me</label>
                                    </div>
                                </div><!--end col--> 
                                <div class="col-sm-6 text-end">
                                    <a href="<?php echo base_url('forget-password') ?>" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                                </div>
                                <!--end col--> 
                            </div><!--end form-group--> 

                            <div class="form-group mb-0 row">
                                <div class="col-12">
                                    <div class="d-grid mt-3">
                                        <input type='submit' value='Log In' class="btn btn-primary" >
                                    </div>
                                </div><!--end col--> 
                            </div> <!--end form-group-->                           
                                    </form><!--end form-
                                    <hr class="hr-dashed mt-4">
                                    <div class="text-center mt-n5">
                                        <h6 class="card-bg px-3 my-4 d-inline-block">Or Login With</h6>
                                    </div>
                                    <div class="d-flex justify-content-center mb-1">
                                        <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-primary rounded-circle me-2">
                                            <i class="fab fa-facebook align-self-center"></i>
                                        </a>
                                        <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-info rounded-circle me-2">
                                            <i class="fab fa-twitter align-self-center"></i>
                                        </a>
                                        <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-danger rounded-circle">
                                            <i class="fab fa-google align-self-center"></i>
                                        </a>
                                    </div>  -->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    

    <?php $this->load->view('includes/footer') ?>