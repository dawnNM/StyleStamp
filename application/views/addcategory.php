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
                                    <li><a href="#">category</a></li>
                                    <li class="active"><?php if(empty($category)){echo 'Add Category';}else{ echo 'Edit Category';}?></li>
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
                                            <h3 class="text-center"><?php if(empty($category)){echo 'Add Category';}else{ echo 'Edit Category';}?></h3>
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
                                        <form action="<?php if(empty($category)){echo base_url('add-new-category');}else{ echo base_url().'update-category/'.$category[0]['category_id'];}?>" method="post" >
                                           
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="cc-payment" name="cate_name" type="text" class="form-control" placeholder="Name Of The Category" value="<?php if(!empty($category)){echo $category[0]['category_name'];}else{ echo"";}?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Category Description</label>
                                                <input id="cc-name" name="cate_desc" type="text"  placeholder="Description Of The Category" class="form-control" value="<?php if(!empty($category)){echo $category[0]['description'];}else{ echo"";}?>" >
                                            </div>
                                            
                                            <div>
                                                <button id="btn btn-info" type="submit" class="btn btn-lg btn-info btn-block"> <?php if(!empty($category)){echo "Update";}else{ echo "Submit";} ?> </button>
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
