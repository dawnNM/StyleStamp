<style>
* {
  box-sizing: border-box;
  }

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px; 
} 
.checked {
  color: orange;
}
button{
	position: 10px; 
	
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

<div class="container" style="width:800px; text-align:center;">
  
	  	<form action="detailsofproduct" method="post" class="panel panel-primary form-horizontal">
				<div class="panel-heading">
					<h3 class="panel-title">Details of Selected User</h3>
				</div>
	  		    <div class="panel-body">
			        <div class="row">
			            <div class="column" style="background-color:#aaa;">
							<div class="form-group">
								<label for="name" class="col-sm-12 control-label">John Doe</label>
									<div class="col-sm-12">           
									  <div class="User-image"> 
                                          <img class="user-avatar" src="http://stylestamp.dipenoverseas.com/images/admin.jpg" style="width:200px;200px"; alt="User Avatar" >                                                              								      </div>   
									</div> 
							</div> <!-- form-group // -->  
			            </div>
					    <div class="column" style="background-color:#bbb;">
						    <fieldset>                    
					        <legend>User Information</legend> 
						    <div class="form-group"> 
							    <div class="col-sm-12"> 
                                        <div class="user-id"style="padding:5px;">User ID:
											<input type="text id=user-id" name="user-id" value="1223" ><br>
								        </div> 
								        <div class="user-name" style="padding:5px;" >User Name:    										
											<input type="text" id="user-name" name="user-name" value="Jhon Doe" >  
								        </div> 
								        <div class="user-dob" style="padding:5px;" >DOB: 
                                            <input type="text" id="user-dob" name="user-dob" value="5 May 1999" >        
									    </div> 
										 <div class="user-contact" style="padding:5px; ">Contact: 
                                            <input type="text" id="user-contact" name="user-contact" value="514-112-9228" >        
									    </div> 
										 <div class="user-email" style="padding:5px; ">E-Mail: 
                                            <input type="text" id="user-email" name="user-email" value="doe.john34@gmail.com" >        
									    </div>      
	                                    <div class="col-sm-12"> 
										    <div class="user-status"  style="padding:5px;">User Status:                      
											    <label class="radio-inline">
														<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Active
											    </label>
											    <label class="radio-inline">
												        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> In-active 
											    </label>
											</div> 
								     	</div>  
							    </div>  
										
							</div> <!-- form-group // -->      
				        </div>
				    </div>
                </div>
		</form> 
				    </fieldset>   
						    <div class="form-group">  
								    <button type="submit" class="btn btn-primary" style="margin-top:10px;" >Back</button>          						   
								    <button type="submit" class="btn btn-primary" style="margin-top:10px;" >Edit User Details</button>

							</div> <!-- form-group // -->				
				 
</div>                     