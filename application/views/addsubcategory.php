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
                                    <li><a href="#">Sub-category</a></li>
                                    <li class="active"><?php if(empty($subcategory)){echo 'Add  Sub Category';}else{ echo 'Edit Sub Category';}?></li>
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
                                            <h3 class="text-center"><?php if(empty($subcategory)){echo 'Add Sub Category';}else{ echo 'Edit Sub Category';}?></h3>
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
										// print_r($categories);
										if($this->session->userdata('success')){?>
											<div class="alert alert-success"><?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?></div>
										<?php }?>
			<form action="<?php if(empty($subcategory)){echo base_url('add-new-subcategory');}else{ echo base_url().'update-subcategory/'.$subcategory[0]['category_id'];}?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
                            <label class="control-label" for="textarea2">Sub Category Name</label>
                            <input class="form-control" name="cate_name" id="categoryname" type="text" required  value="<?php if(!empty($subcategory)){echo $subcategory[0]['category_name'];}else{ echo"";}?>"/>
                        </div>
   
						<div class="form-group">
                            <label class="control-label" for="textarea2">Sub Category Description</label>
                            <textarea class="form-control" name="cate_desc" id="categorydescription" rows="4" ><?php if(!empty($subcategory)){echo $subcategory[0]['description'];}else{ echo"";}?></textarea>
                        </div>
						
						<div class="form-group">
                            <label class="control-label" for="textarea2">Parent Category Id</label>
							<select class="custom-select" name="parent_cate" required>
								<option selected value="">Choose parent category</option>
								<?php
                                if(!empty($subcategory)){
                                $parent_id= $subcategory[0]['parent_category'];
                                }
								for($i=0;$i<count($categories);$i++){
                                 if(!empty($subcategory)){
                                        if($categories[$i]['category_id']==$parent_id){
                                            $selected="selected";
                                        }else{
                                            $selected="";
                                        }
                                }
									?>
									<option value="<?php echo $categories[$i]['category_id'];?>" <?php echo $selected;?>><?php echo $categories[$i]['category_name'];?></option>
									<?php
								}
								?>
								</select>                        
						</div>
							
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php if(empty($subcategory)){echo 'Add Sub Category';}else{ echo 'Edit Sub Category';}?></button>
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
