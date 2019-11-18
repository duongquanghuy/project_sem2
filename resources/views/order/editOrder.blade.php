@extends('layouts.headerMenu')
@section('css')
	<style type="text/css">
	
		
		

	</style>
		
	
@stop
@section('sideber-menu')
<div class="left-sidebar" id="show-nav">
      @include('layouts.menu')
</div>

@stop
@section('container-fluid')
 <!-- Modal -->
<!--  cong hoac tru san pham di -->
<div class="modal fade" id="exampleModalCenterProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title " id="exampleModalLongTitle">Edit Quantity Product <span class="product-id-label"> </span></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- phan sua thong tin -->
      <div class="modal-body">
          
       
      <div class="form-group" >
         <label class="col-md-5 control-label input-left" >Quantity : <strong id="quantity-label"></strong></label>  
         <div class="col-md-11 input-left">
 
            <div class="input-group othertop">
              <div class="input-group-addon">
                  <i class="fa fa-sticky-note-o fa-1x" style="font-size: 20px;"></i>
        
              </div>
              <input id="qunatityProduct" name="product" type="number" placeholder=" Secondary Phone number " class="form-control input-md">
            </div>
  
          </div>
        </div>
      </div>
        <!-- het sua thong tin -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="severQuantityProduct()" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <!--  het phan sua so luong -->
 <!-- Modal -->
<!--  sua so luong thoe button edit -->
<div class="modal fade" id="exampleModalCenterProductID" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitleID" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title " id="exampleModalLongTitleID">Edit Quantity Product <span class="product-id-label"> </span></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- phan sua thong tin -->
      <div class="modal-body">
          
       
      <div class="form-group" >
         <label class="col-md-5 control-label input-left" >Quantity </label>  
         <div class="col-md-11 input-left">
 
            <div class="input-group othertop">
              <div class="input-group-addon">
                  <i class="fa fa-sticky-note-o fa-1x" style="font-size: 20px;"></i>
        
              </div>
              <input id="qunatityProductID" name="product" type="number" placeholder=" Secondary Phone number " class="form-control input-md">
            </div>
  
          </div>
        </div>
      </div>
        <!-- het sua thong tin -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="severQuantityProduct()" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <!--  het phan sua so luong -->

<div class="row">
            <div class="col-md-4">
            <ul class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#"> Home</a></li>
            <li class="active"><a href="">Order List</a></li>
          </ul>
            </div>
            <div class="col-md-8">
            <ul class="list-inline pull-right mini-stat">
              <li>

                <h5> Total order <span class="stat-value color-orang"><i class="fa fa-plus-circle"></i>
                 </span></h5>
                
              </li>
            </ul>
            </div>
</div>
<!-- het phan homeword -->
<div class="container">
	
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        	<p><input id="fk_order_id" type="text" name="productID" value="{{ $fk_order_id }}"></p>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
			  <div class="col-md-3" style="max-width: 300px"></div>
			  <div class="col-md-4" style="max-width: 300px">
			  <div class="input-group">
			       <div class="input-group-addon">
			     <i class="fa fa-sticky-note-o"></i>
			        
       			</div>
  					 <input id="orderProduct" name="orderProduct" type="text" placeholder="Citizenship No." class= "form-control input-md">

      			</div>
      			 
 				
    
  			 </div>

  			 <div class="col-md-2" >
              		<div class="input-group othertop" >
              
                    <button  id="submit" onclick="addPoduct()" class="btn" type="button" 
                    	 data-title="Edit" data-toggle="modal" >Add Product</button>
              		</div>
         	</div>
		</div> 
		
    </div>
	<div class="row">
		
        
        <div class="col-md-12">
        	<h4></h4>
        	<div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
	                    
	                   	<th>#</th>
	                   	<th>ID Product</th>
	                   	<th>product name</th>
	               		
	               		<th>Price</th>
	               		<th>Quantity</th>
	               		<th>Discount Product</th>
	               		<th>Total Money(vnđ)</th>
	               		<th>Action</th>
                   </thead>
    				<tbody>
						@foreach($orderList as $itemes)
			                    <tr>
			                      
			                        <td>{{ $index++ }}   </td>
			                       
									<td>{{ $itemes->product_id }} </td>
			                        <td>{{ $itemes->product_name }} </td>
			                        <td>{{ $itemes->price }}</td>
			                        <td>{{ $itemes->discount_product }} </td>
			                        <td>{{ $itemes->quantity_product }}  </td>
			                        <td>{{ number_format($itemes->totalPirice) }}  </td>
			                       
									
								
			                        <td>
			                        
			                        		
				                        <button onclick="editProductID('{{ $itemes->product_id }}')"
				                        	 	class="btn btn-primary btn-xs" data-title="Edit"   >
				                        		<span class="glyphicon glyphicon-pencil"></span>
				                        </button>
			                        	
			                        	
			                        	<p style="display: inline-block;"  data-placement="top" data-toggle="tooltip" title="delete">
			                        		<button onclick="" class="btn btn-danger btn-xs" data-target="#exampleModalCenter" data-title="Edit" data-toggle="modal" data-target="#delete" >
			                        			<span class="glyphicon glyphicon-trash"></span>
			                        		</button>
			                        	</p>
			                        </td>
			            
			                    </tr>
			    			@endforeach
   					</tbody>
   				</table>
   				

   			</div>
   		</div>
   </div>

</div>
@stop
@section('js')
	<script type="text/javascript">
		function addPoduct(){
			var orde_product_id = $('#orderProduct').val();
			var fk_order_id = $('#fk_order_id').val();
			console.log(orde_product_id);
			console.log(fk_order_id);
			
			$.post('{{ route('addProductOreder') }}' ,{
           			"_token": "{{ csrf_token() }}",
           			 orde_product_id: orde_product_id,
           			 fk_order_id: fk_order_id
       		 },function(data , status){
	          		if(data != '' && data.length > 0){

	          				alert('san pham da ton tai ban co the cap nhat so san pham muon sua')
	          				$('#exampleModalCenterProduct').modal({
                                      keyboard: false
                                 });
	          				$.each(data ,  function(index, el) {
	          					$('#quantity-label').text(el.quantity_product);
	          					return false;
	          				});
	          				
	          		}else{
	          			alert('them so luong cho san pham moi');

	          				$('#exampleModalCenterProduct').modal({
                                      keyboard: false
                                 });
	          		
	          		}
	            
       		 });


		}

		//sua so luong san pham da ton tai
		function severQuantityProduct(){
			var quantity = $('#qunatityProduct').val();
			var order_product_id = $('#orderProduct').val();
			var fk_order_id = $('#fk_order_id').val();
			console.log(quantity);
			console.log(order_product_id);
			console.log(fk_order_id);

			$.post('{{ route('addProductQuantityOreder') }}' ,{
           			"_token": "{{ csrf_token() }}",
           			 quantity: quantity,
           			 order_product_id: order_product_id,
           			 fk_order_id: fk_order_id
       		 },function(data , status){
	          	console.log(data);
	          	$('#exampleModalCenterProduct').modal('hide');
	          	alert(data);
	            location.reload();
       		 });

		
		}
		///// sua so luong button edit
		function editProductID(product_id){
			var quantity = $('#qunatityProductID').val();
			var fk_order_id = $('#fk_order_id').val();
			console.log(product_id);
			$('#exampleModalCenterProductID').modal({
               keyboard: false
              });

			$.post('{{ route('addProductQuantityOreder') }}' ,{
           			"_token": "{{ csrf_token() }}",
           			 quantity: quantity,
           			 product_id: product_id,
           			 fk_order_id: fk_order_id
       		 },function(data , status){
	          	console.log(data);
	          	$('#exampleModalCenterProductID').modal('hide');
	          	alert(data);
	            location.reload();
       		 });
		}

		




	</script>
@stop