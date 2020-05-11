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
                                    <li class="active">Company settings</li>
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
                                            <h3 class="text-center">Update Company settings</h3>
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
			<form action="" method="post" enctype="multipart/form-data">
			
						<div class="form-group">
                            <label class="control-label" for="textarea2">Choose number of banners</label>
							<select class="custom-select">
								<option selected>Choose </option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								</select>  
								<br/>								
						</div>
   
						<div class="form-group">
						
                            
                           
							
							<label for="myfile">choose first banner:</label>
							<input type="file" id="myfile" name="myfile" multiple><br><br>
							
							
							
                        </div>
						
                            
                           <div>
							
							<label for="myfile">choose second banner:</label>
							<input type="file" id="myfile" name="myfile" multiple><br><br>
							
							
							
                        </div>
						
							
							<label for="myfile">choose third banner:</label>
							<input type="file" id="myfile" name="myfile" multiple><br><br>
							
							
						
					   <div class="form-actions">
							                
							<button type="submit" class="btn btn-primary">Change</button>
							
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
