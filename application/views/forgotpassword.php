

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?php echo base_url()?>">
                        <img class="align-content"  height=200 width=300 src="<?php echo base_url();?>images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
				<?php 
				
				//code to show errors and success for form validations using sessions or data sent through

                // if( validation_errors()){
                    echo validation_errors('<div class="alert alert-danger">','</div>');
                // }
                if($this->session->userdata('error')){?>
                    <div class="alert alert-danger"><?php echo $this->session->userdata('error'); $this->session->unset_userdata('error'); ?></div>
                <?php }
                if($this->session->userdata('success')){?>
                    <div class="alert alert-success"><?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?></div>
                <?php }?>
                


                    <form method="post" action="<?php echo base_url()?>forget-password-verify"> 
					    <div class="form-group">
                            <label>Forgot Password</label> 
                        </div>
        
                        <div class="form-group">  

                            <input type="email" class="form-control" placeholder="Email" name='femail'>
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Verify</button>
                        <div class="checkbox">
                            <!-- <label>
                                <input type="checkbox"> Remember Me
                            </label> -->
                            <label class="pull-right">
                                <a href="<?php echo base_url();?>">try sign in?</a>
                            </label>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

