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

                                    <li class="active" ><a href="<?php echo base_url()?>viewusers">users</a></li>
                                    <li class="active">view users</li>
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
                                <strong class="card-title">Users</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
													<th class="serial">User ID</th>
                          <th>First Name</th>
				           				<th>Last Name</th>
				            			<th>DOB</th>
				            			<th>Contact</th>
				            			<th>E-Mail</th>
				           				
				            			<th>Action</th>
						 						  </tr>
                        </thead>
											
					    <tbody>
                          <tr>
                            <td>1177</td>
                            <td>Jean</td>
                            <td>Talon</td>   
                            <td>1/1/2001</td>    
                            <td>123456789</td>    
                            <td>talon.jean@gmail.com</td>             
                            <td> <button class='btn btn-danger' >delete</button> <button class='btn btn-info' >edit</button></td>
                          </tr>
						  <tr>
                            <td>7542</td>
                            <td>Ceren</td>
                            <td>Selevian</td>   
                            <td>15/4/1991</td>    
                            <td>145623789</td>    
                            <td>cerens123@yahoo.com</td>        
                            <td> <button class='btn btn-danger' >delete</button> <button class='btn btn-info' >edit</button></td>
                          </tr>
						  <tr>
                            <td>8317</td>
                            <td>Francois</td>
                            <td>klea</td>   
                            <td>29/10/1989</td>    
                            <td>567891234</td>    
                            <td>kelanfranc@gmail.com</td>       
                            <td> <button class='btn btn-danger' >delete</button> <button class='btn btn-info' >edit</button></td>
                          </tr>
						  <tr>
                            <td>6576</td>
                            <td>Sandy</td>
                            <td>Jakaria</td>   
                            <td>8/11/2002</td>    
                            <td>56781232425</td>    
                            <td>jakaria.jakaria@hotmail.com</td>      
                            <td> <button class='btn btn-danger' >delete</button> <button class='btn btn-info' >edit</button></td>
                          </tr>


                        </tbody> 
															

												</table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>


































                      
         <!--=============================================================================================================================--->        
                      <!--  <?php 
                             			$row_cnt=count($users);
                             			if($row_cnt>0){
                             			for($i=0;$i<$row_cnt;$i++){?>
                            			<tr>
                                	<td>  <?php echo $users[$i]['user_id']; ?></td>
                                	<td> <?php echo $users[$i]['user_name']; ?> </td>
                                	<td> <?php echo $users[$i]['address']; ?> </td>
																	<td> <div><a type="a" href="<?php echo base_url();?>product/edit/<?php echo $users[$i]['user_id']; ?>" class="btn btn-outline-info">Edit</a> <a type="a" href="<?php echo base_url();?>user/delete/<?php echo $users[$i]['user_id']; ?>"" class="btn btn-outline-danger">Delete</a></div></td>
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
                                    ?> -->


























