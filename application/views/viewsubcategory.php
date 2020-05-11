
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
									
									<!--- 
									using the same view file for both add and update the details
									if product found on request its work as edit else as
									new product submission form
									also form action change accordingly
									----->


                                    <li class="active" ><a href="<?php echo base_url()?>viewcategories">category</a></li>
                                    <li class="active">view category</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Categories</strong>
                            </div>
                            <div class="card-body">
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
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
						   
							<th class="serial">sub-Category ID</th>
                            <th >Sub-Category Name</th>      
                            <!-- <th>Parent Category Name</th>                 -->
                            <th>Description</th>                
                            <!-- <th>Description</th>                 -->
                            <th>Action</th>
                          </tr>                              
                        </thead>
                        <tbody>
												 
												<?php 
                                        $row_cnt=count($subcategories);
                                        if($row_cnt>0){
                                        for($i=0;$i<$row_cnt;$i++){?>
                                        <tr>
                                            <td>  <?php echo $i+1;//$subcategories[$i]['category_id']; ?></td>
                                            <td> <?php echo $subcategories[$i]['category_name']; ?> </td>
                                            <td> <?php echo $subcategories[$i]['description']; ?> </td>
                                            <!-- <td> <?php echo $subcategories[$i]['parent_category']; ?> </td> -->
											<td> <div><a type="a" href="<?php echo base_url();?>subcategory/edit/<?php echo $subcategories[$i]['category_id']; ?>" class="btn btn-outline-info">Edit</a> <a type="a" href="<?php echo base_url();?>subcategory/delete/<?php echo $subcategories[$i]['category_id']; ?>" class="btn btn-outline-danger" onclick=" return confirm('Are you sure you want to delete?');">Delete</a></div></td>
                                        </tr>
                                        <?php
                                        }
                                        }
                                        else
                                        {
                                        ?>
                                       <tr>
									   <td colspan="5" class="text-center">No data at the moment</td>
                                       </tr>
                                       <?php
                                        }
                                        ?>
                         


                        </tbody>
												</table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
