<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">


								<!--- 
									using the same view file for both add and update the details
									if product found on request its work as edit else as
									new product submission form
									also form action change accordingly
									----->

                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Settings</a></li>
                                    <li class="active">Privacy Policy</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="content">
            <div class="animated fadeIn">
	
                <div class="row">
				<div class="col-lg-2">
				</div>
                    <div class="col-lg-8">
                        <div class="card">
                           
                            <div class="card-body">

                                <div id="privacy-policy">
                                    <div class="card-body">
									
                                        <div class="card-title">  
										  <h3 class="text-center">Privacy Policy</h3>
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
                                          <form action="<?php echo base_url();?>update-privacypolicy" method="POST">
                                        </div> 
				 	                        <div class="mainContent">		
					                          <textarea id="pp" rows="25" cols="85" name="pp" > <?php if($pp){ echo $pp[0]['settings_value'];}?></textarea>                                                        
                                        </div>
                                            <div>
                                                <button id="btn btn-info" type="submit" class="btn btn-lg btn-info btn-block"> Submit
                                                </button>
                                            </div>
                                        </form> 

                                    </div>
                                </div> 

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->
			
					</div>


</div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>
