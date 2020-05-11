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
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">manage product</a></li>
									<!--- 
									using the same view file for both add and update the details
									if product found on request its work as edit else as
									new product submission form
									also form action change accordingly
									----->
                                    <li class="active"><?php if(empty($product)){echo 'Add  Product';}else{ echo 'Update Product';}?></li>
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
                                            <h3 class="text-center"><?php if(empty($product)){echo 'Add  Product';}else{ echo 'Update Product';}?></h3>
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
										//  if(!empty($product)){
										// 	print_r( $product);

										// }
										if($this->session->userdata('success')){?>
											<div class="alert alert-success"><?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?></div>
										<?php }?>
										<form action="#" method="post">
                                           
										   <div class="form-group">
						<label for="name" class="col-sm-12 control-label">Select Product Image</label>
							<div class="col-sm-12">
							  <label class="control-label small" for="file_img">From File</label>  <input type="file" name="file_archive">
							</div>
					  </div> <!-- form-group // -->					
                       <div class="form-group"> 
				       <div class="col-sm-12">     
					  <!-- <?php echo $product?> -->
                        <label for="productCategory" class="col-sm-8 control-label">Product Category</label>
						<select class="custom-select" name="parent_cate" required>
								<option selected value="">Choose Category</option>
								<?php
                              
								for($i=0;$i<count($categories);$i++){
									if(!empty($product)){
										$selected_id=$product[0]['category_id'];
										echo $selected_id,$product[0]['category_id'];
										if($selected_id==$categories[0]['category_id']){
											$selected="selected";
											
										}
										else{
											$selected="";
										}
									}
									?>
									<option value="<?php echo $categories[$i]['category_id'];?>" <?php echo $selected;?>><?php echo $categories[$i]['category_name'];?> - <small><?php echo $categories[$i]['parent_category'];?></small></option>
									<?php
								}
								?>
								</select>           
                       </div>
                    </div>

					<div class="form-group">
						<div class="col-sm-12">
							<label for="productName" class="col-sm-8 control-label">Product Name</label>
							<input type="text" id="productName" class="form-control" name="productName" placeholder="Name" value="<?php if(!empty($product)){echo $product[0]['product_name'];} ?>" required />
						</div>
					</div> 
					
				    <div class="form-group">
				        <div class="col-sm-12"> 
						  <label for="about" class="col-sm-12 control-label">Product Description</label>
						  <textarea  id="productDescription" name="productDescription" class="form-control" placeholder="Description"  required> <?php if(!empty($product)){echo $product[0]['decription'];} ?> </textarea>
						</div>
				    </div> <!-- form-group // --> 

					<div class="form-group">	
						<div class="col-sm-12">
							<label for="productPrice" class="col-sm-8 control-label" style="padding-top: 0px;">Product Price</label>
							<input type="number" id="productPrice" class="form-control" name="productPrice" placeholder="0.00$" step="0.01" min="0" max="100" value="<?php if(!empty($product)){echo $product[0]['price'];} ?>"  required />
<!-- 							<input type="text" id="productPrice" class="form-control" name="productPrice" placeholder="Price" required />
 -->						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<label for="serialNumber" class="col-sm-8 control-label">Serial Number</label>
							<input type="text" id="serialNumber" class="form-control" name="serialNumber" placeholder="serialNumber"  value="<?php if(!empty($product)){echo $product[0]['product_id'];} ?>" required />
						</div>
					</div>
 
				    <div class="form-group">   
					   <div class="col-sm-12">
					       <label for="odrlvl" class="col-sm-12 control-label">Reorder Level</label>       
						   <input type="number"  id="serialNumber" class="form-control" name="odrlvl" id="odrlvl" placeholder="0"  step="0" min="0" max="100"  value="<?php if(!empty($product)){echo $product[0]['reorder_level'];} ?>" required />
					   </div>
				      </div> <!-- form-group // --> 
				 
				   <div class="form-group"> 
				       <div class="col-sm-12">
					       <label for="percentage" class="col-sm-12 control-label">Discount Percentage</label>
                           <input type="number"  id="percentage" class="form-control" name="percentage" id="percentage" placeholder="0%"  step="0" min="0" max="100"  value="<?php if(!empty($product)){echo $product[0]['discount_percentage'];} ?>"  required />
				       </div>
				   </div> <!-- form-group // -->            
				 
					<div class="form-group">			
						<div class="col-sm-12">
							<label for="stockQty" class="col-sm-8 control-label">Stock Quantity</label>
							<input type="number" id="stockQty" class="form-control" name="stockQty" placeholder="StockQuantity"  step="0" min="0" max="100" value="<?php if(!empty($product)){echo $product[0]['stock'];} ?>"  required />
						</div>
					</div>

			        <div class="form-group">
                        <div class="col-sm-12"> 
					       <label for="name" class="col-sm-12 control-label">Product Status</label>
							   <label class="radio-inline">
							   <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="active" <?php if(!empty($product)){if($product[0]['status']=='active'){echo 'checked';}} ?>> Active
							   </label>
							   <label class="radio-inline">
							   <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="inactive" <?php if(!empty($product)){if($product[0]['status']=='inactive'){echo 'checked';}} ?>> In-active 
							   </label>
					    </div>
				    </div> <!-- form-group // -->  
					<div>
                                                <button id="btn btn-info" type="submit" class="btn btn-lg btn-info btn-block"> <?php if(empty($product)){echo 'Add';}else{ echo 'Update';}?>
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