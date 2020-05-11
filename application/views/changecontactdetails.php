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
                                    <li class="active">contact details settings</li>
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
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Update Contact Details</h3>
                                        </div>
                                        <!-- <hr> -->
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
                                        <form action="" method="post" >
                                           
                                            <h4 class="text-center">Contact Numbers</h4>       
												<div class="text-center"> 
													<img style="height:25px; width:25px;"src="https://img.icons8.com/metro/26/000000/phone.png"/>
													<input type="phone"  class="no-outline" id="phone1" name="phone1" value="+1 514-550-0001" ><br>
													<img src="https://img.icons8.com/metro/26/000000/phone.png"/>
													<input type="text" id="phone" name="phone2" value="+1 514-550-0002" >  <br>
													<img src="https://img.icons8.com/metro/26/000000/phone.png"/>
													<input type="text" id="phone3" name="phone3" value="+1 514-550-0003" >        
												</div> 
							                <h4 class="text-center";>E-mails</h4>      
												<div class="text-center"> 
													<img src="https://img.icons8.com/material/24/000000/send-mass-email.png"/>         
													<input type="email" id="email1" name="email1" value="abc13@gmail.com " ><br>     	
													<img src="https://img.icons8.com/material/24/000000/send-mass-email.png"/>         
													<input type="email" id="email2" name="email2" value="xyz17@gmail.com " >  
												</div> 
											
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
