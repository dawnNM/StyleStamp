
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1">$</span>
                                        <span class="count"><?php echo $revenue; ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Revenue</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-6">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count "><?php echo $productcnt; ?></span>
                                        <!-- <span>%</span> -->
                                    </h3>
                                    <p class="text-light mt-1 m-0">Products</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <div id="flotBar1" class="flotBar1"></div>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $usercnt; ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Total clients</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $orderscnt; ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">orders</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <div id="flotLine1" class="flotLine1"></div>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    </div>
                <!-- /Widgets -->
                
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Recent Orders </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>ORDER ID</th>
                                                    <th>client name</th>
                                                    <th>date</th>
                                                    <th>order status</th>
                                                    <th>shippment status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $row_cnt=count($orders);
                                            if($row_cnt>5){
                                                $row_cnt=5;
                                            }
                                        if($row_cnt>0){
                                        for($i=0;$i<$row_cnt;$i++){?>
                                        <tr>
                                            <td>  <?php echo $orders[$i]['order_id']; ?></td>
                                            <td> <?php echo $orders[$i]['user'][0]['first_name'].' '.$orders[$i]['user'][0]['last_name']; ?> </td>
                                            <td> <?php echo $orders[$i]['date']; ?> </td>
                                            <td> <?php echo $orders[$i]['payment_type']; ?> </td>
                                            <td> <span class="badge badge-dark"><?php echo $orders[$i]['shipped_status']; ?> </span></td>
                                            <td>  <span class="badge badge-dark"><?php echo $orders[$i]['order_status']; ?></span> </td>
											<!-- <td> <div><a type="a" href="<?php echo base_url();?>subcategory/edit/<?php echo $orders[$i]['order_id']; ?>" class="btn btn-outline-info">Edit</a> <a type="a" href="<?php echo base_url();?>subcategory/delete/<?php echo $orders[$i]['order_id']; ?>"" class="btn btn-outline-danger">Delete</a></div></td> -->
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
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    </div>
                </div>
                <!-- /.orders -->
                <div class="row">
                    <!-- <div class="col-lg-6">
                    <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Sales by category(Top 5) </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats ">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Category</th>
                                                    <th>sales</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="client name">Louis Stanley</span> </td>
                                                    <td class="serial"> #5469 </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="client name">Louis Stanley</span> </td>
                                                    <td class="serial"> #5469 </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="client name">Louis Stanley</span> </td>
                                                    <td class="serial"> #5469 </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="client name">Louis Stanley</span> </td>
                                                    <td class="serial"> #5469 </td>
                                                </tr>
                                               
                                               
                                               
                                               
                                               
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                <!-- </div> -->
                            <!-- </div>  -->
                            <!-- /.card -->
                   <!-- </div>

                    <div class="col-lg-6">
                    <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Sales by category(Top 5) </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats ">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Category</th>
                                                    <th>sales</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="client name">Louis Stanley</span> </td>
                                                    <td class="serial"> #5469 </td>
                                                 </tr>
                                               
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="client name">Louis Stanley</span> </td>
                                                    <td class="serial"> #5469 </td>
                                                 </tr>
                                               
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="client name">Louis Stanley</span> </td>
                                                    <td class="serial"> #5469 </td>
                                                 </tr>
                                               
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="client name">Louis Stanley</span> </td>
                                                    <td class="serial"> #5469 </td>
                                                 </tr>
                                               
                                               
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                <!-- </div> -->
                            <!-- </div> -->
                             <!-- /.card -->
                    <!-- </div> -->
                </div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
