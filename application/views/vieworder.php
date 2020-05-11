			
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
                                    <li><a href="<?php echo base_url()?>">Dashboard</a></li>
                                    <!-- <li class="active" ><a href="#">category</a></li> -->
                                    <li class="active">view orders</li>
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
                                <strong class="card-title">Orders</strong>
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
                            <th width="5%">Order_Id</th>
                            <th width="5%">Client Name</th>
				            <th width="5%">Date</th>
				            <th width="5%">Payment Type</th>
				            <th width="10%">Shipping status</th>
				            <th width="10%">Order Status</th>
                            <th width="10%">No. Of Products</th>
                            <th width="20%">Product Name (Quantity) </th>
				            <th width="30%">Action</th>
				            <!-- <th>Product Name</th>
				            <th>Product Quantity</th> -->
				            
						  </tr>
                        </thead>
                        <tbody>  
										 
                        <?php 
                                        $row_cnt=count($orders);
                                        if($row_cnt>0){
                                        for($i=0;$i<$row_cnt;$i++){?>
                                        <tr>
                                            <?php $product_cnt=count($orders[$i]['products']); ?>
                                            <td>  <?php echo $orders[$i]['order_id']; ?></td>
                                            <td> <?php echo $orders[$i]['user'][0]['first_name'].' '.$orders[$i]['user'][0]['last_name']; ?> </td>
                                            <td> <?php echo $orders[$i]['date']; ?> </td>
                                            <td> <?php echo $orders[$i]['payment_type']; ?> </td>
                                            <td> <span class="badge badge-dark"><?php echo $orders[$i]['shipped_status']; ?> </span></td>
                                            <td>  <span class="badge badge-dark"><?php echo $orders[$i]['order_status']; ?></span> </td>
                                            <td> <?php echo $product_cnt; ?> </td>
                                            <td> 
                                            <?php 
                                            for($j=0;$j<$product_cnt;$j++)
                                            {
                                                echo $orders[$i]['products'][$j]['product_name'].' ('.$orders[$i]['products'][$j]['quantity'].')';
                                                ?> <br><?php 
                                            }
                                            ?>
                                            </td>
											<td> <div><a type="a" href="<?php echo base_url();?>ordercontroller/edit/<?php echo $orders[$i]['order_id']; ?>" class="btn btn-outline-info">Edit</a> <a type="a" href="<?php echo base_url();?>ordercontroller/delete/<?php echo $orders[$i]['order_id']; ?>" class="btn btn-outline-danger" onclick=" return confirm('Are you sure you want to delete?');">Delete</a></div></td>
                                        </tr>
                                        <?php
                                        }
                                        }
                                        else
                                        {
                                        ?>
                                       <tr>
									   <td colspan="7" class="text-center">No data at the moment</td>
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
			