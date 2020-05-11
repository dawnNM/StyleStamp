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
                                    <li><a href="#">settings</a></li>
                                    <li class="active">social media links</li>
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
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                   
									
                                        <div class="card-title">  
										      <h3 class="text-center" >Social Media Links</h3>
                                        </div>

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
                                        <form action="<?php echo base_url();?>update-socialmedia" method="post" >
																		
											<div  class="form-group">
                                            <label for="facebook_link" class="control-label mb-1">facebook</label>
											<a href="<?php if(isset($fl[0])){ echo $fl[0]['settings_value']; }else{ echo '#';} ?>" title="facebook"><img src="https://res.cloudinary.com/diegoarbito/image/upload/v1469744665/facebook_bqjnna.png" width="25px" heignt="25px"></a>
											
												<input id="facebook_link" name="fl" type="text" class="form-control" placeholder="Link for facebook"  value="<?php echo $fl[0]['settings_value'] ?>" >
											
                                            </div>         
											<div class="form-group">linkedin
											<span><a href="<?php if(isset($ll[0])){ echo $fl[0]['settings_value']; }else{ echo '#';} ?>" title="LinkedIn"><img  src="https://res.cloudinary.com/diegoarbito/image/upload/v1469744659/Linkedin_Icon_jfuwkc.png" width="25px" heignt="25px"></a> </span>
											<span> 
												<input  id="linkedin_link" name="ll" type="text" class="form-control" placeholder="Link for Linkedin"  value="<?php echo $ll[0]['settings_value'] ;?>" >
											</span>   
                                            </div>       
											<div class="form-group">twitter                    
											<a href="<?php if(isset($tl[0])){ echo $fl[0]['settings_value']; }else{ echo '#';} ?>" title="Twitter"><img src="https://res.cloudinary.com/diegoarbito/image/upload/v1469744663/Twitter_enkrbf.png" width="25px" heignt="25px"></a>
											
												<input id="twitter_link" name="tl" type="text" class="form-control" placeholder="Link for Twitter"  value="<?php echo $tl[0]['settings_value'] ?>" >
											</span>   
                                            
                                            <div class="form-group">
                                                <button id="btn btn-info" type="submit" class="btn btn-lg btn-info btn-block"> Submit                                                </button>
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


                                       