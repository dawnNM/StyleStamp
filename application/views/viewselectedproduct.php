<style>
.column { 
  width: 50%;
  padding: 10px;  
  background-color:white;
} 
.checked {
  color: orange;
}       
 input{
      border-top-style: hidden;
      border-right-style: hidden;
      border-left-style: hidden;
      border-bottom-style:groove; 
    <!--  background-color: #eee; -->
      }
textarea { 
    border-style: none ; 
   
    overflow: auto; 
  }
 
</style> 

    <div class="container" style="width:700px;  >
    	<form action="#" method="post" class="panel panel-primary form-horizontal">
				<div class="panel-heading">
					<h3 class="panel-title">Details of Selected Product</h3>
				</div> 
	  		<div class="panel-body">             
			    <div class="row">
			            <div class="column" style="width:30%;">
							<div class="form-group">
								<label for="images" class="control-label">Product Images</label>
								<div class="col-sm-12">
									<div class="product-image" >  
									    <div class="slider-holder">
							                <div>
												<img src="https://www.eragal.com/13004-large_default/long-sleeve-abstract-print-patchwork-shirt-light-khaki-3v88156821.jpg" class="slider-image" style="width:140px;height:120px;padding:5px;"/> <br>
												<img src="https://www.eragal.com/13005-large_default/long-sleeve-abstract-print-patchwork-shirt-light-khaki-3v88156821.jpg" style="width:140px;height:120px;padding:5px;"/>  <br>
												<img src="https://www.eragal.com/13006-large_default/long-sleeve-abstract-print-patchwork-shirt-light-khaki-3v88156821.jpg" style="width:140px;height:120px;padding:5px;"/>  <br>
												<img src="https://www.eragal.com/13007-large_default/long-sleeve-abstract-print-patchwork-shirt-light-khaki-3v88156821.jpg" class="slider-image" style="width:140px;height:120px;padding:5px;"/>  <br>
											</div>    
										</div>              
									</div>   
								</div> 
							</div> 
			            </div>
					    <div class="column">
						    <fieldset>                    
					        <legend>Product Information</legend> 
						    <div class="form-group"> 
							    <div class="col-sm-12">   
                                        <div class="product-id">Prod. ID : 
											<input type="text" id="productid" name="productid" value="Men's Shirt" ><br>
								        </div> 								
                                        <div class="product-category">Category:
											<input type="text" id="productcategory" name="productcategory" value="Men's Shirt" ><br>
								        </div> 
								        <div class="product-name">Pro.Name:    										
											<input type="text" id="productname" name="productname" value="Striped Polo Shirt" >  
								        </div> 
								        <div class="product-price">Pro.Price: 
                                            <input type="text" id="productprice" name="productprice" value="CAD$ 5.99" >        
									    </div> 
                                        <div class="product-discription">Description:
									    <!--    <input text id="productdescription" name="productdescription" value ="This is Linen Men Shirt.Fushia Collar And Cuffs Lining. Button Fastenings And Buttoned Cuffs. COMPOSITION: 100% LINEN"> </input>   -->
										    <textarea rows="5" cols="27" id="productdescription" name="productdescription" >This is Linen Men Shirt. Fushia Collar And Cuffs Lining. Button Fastenings And Buttoned Cuffs. COMPOSITION: 100% LINEN</textarea>           
									    </div>
                                        <div class="product-rating">Rating:
                                            <span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star "></span> 
								        </div>     
									    <div class="product-size">Size:  
									        	<select class="form-control" id="productsize"  ><!--multiple-->
													<option value="option1">XS</option>
													<option value="option2">S</option>
													<option value="option3">M</option>
													<option value="option4">L</option>                
													<option value="option5">XL</option>
												</select>          
									    </div>
									    <div class="product-colour">Colour: 
												<select class="form-control"id="productcolour"  > <!--multiple-->
													<option value="option1">Black</option>
													<option value="option2">Red</option>
													<option value="option3">White</option>
													<option value="option4">Green</option>
													<option value="option5">Gray</option>
											    </select>
								        </div> 
						     		    <div class="product-description">Status:                      
											    <label class="radio-inline">
														<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">Active
											    </label>
											    <label class="radio-inline">
												        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">In-Active 
											    </label>
									    </div> 
									    <button type="submit" class="btn btn-primary" style="margin-top:10px;" >Edit Product Details</button>

								</div> 
							</div> 
						    </fieldset>   
				        </div>
				</div>
            </div>
		</form> 
		        <div class="form-group">  
				    <button type="submit" class="btn btn-primary" style="margin-top:10px;" >Back</button>          						   
                </div> <!-- form-group // -->				
    </div>                     