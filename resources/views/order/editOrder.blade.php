@extends('layouts.headerMenu')
@section('css')
	<style type="text/css">
	
			.modal-body{
				height: 100px;
			}
		

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
        <h5 class="modal-title " id="exampleModalLongTitle">Edit Quantity Product </h5>

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
        <h5 class="modal-title " id="exampleModalLongTitleID">Edit Quantity Product </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- phan sua thong tin -->
      <div class="modal-body">
          
       
      <div class="form-group" >
      	 <input style="display: none;" id="product_id_button" type="text" name="">
         <label class="col-md-5 control-label input-left" >Quantity : <span id="product-id-label-button"> </span></label>  
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
        <button onclick="severQuantityProductID()" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <!--  het phan sua so luong -->

<div class="row">
            <div class="col-md-4">
            <ul class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#"> Home</a></li>
            <li class="active"><a href="{{ route('displayOrder') }}">Order List</a></li>
            <li class="active"><a href="">Edit Order</a></li>
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
        <div class="col-md-6 col-md-offset-3" style="text-align: center;">
        	<label style=" font-size: 30px;">Order ID : {{ $order_id }}</label>
        	<input style="display: none;" id="fk_order_id" type="text" name="productID" value="{{ $order_id }}">
        	<p> Employee : {{ $em_fullname }} (ID : {{ $em_roll_no }}) ; Number Customer: {{ $customerPhone }}</p>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
			<div class="col-md-3" style="max-width: 300px"  style="margin-top: 5px;"></div>
			<div class="col-md-4" style="max-width: 300px"  style="margin-top: 5px;">
				  <div class="input-group"  style="margin-top: 5px;">
				    <div class="input-group-addon">
				    	 <span class="glyphicon glyphicon-shopping-cart"></span>

	       			</div>
	  					 <input id="orderProduct" name="orderProduct" type="text" placeholder="Citizenship No." class= "form-control input-md">
	      			</div>
      	
  			</div>
  			<div class="col-md-2"  style="margin-top: 5px;" >
              		<div class="input-group othertop" >
                    	<button  id="submit" onclick="addPoduct()" class="btn" type="button" 
                    	 data-title="Edit" data-toggle="modal" >Add Product</button>
              		</div>
         	</div>
         	<div  class="col-md-2"  style="margin-top: 5px;" >
              		<a href="{{ route('printOrderIdIndex') }}?id={{ $order_id }}"  data-toggle="tooltip" title="print">
			            <button  class="btn btn-success"  >
			                <span class="glyphicon glyphicon-print"></span>
			            </button>
			        </a>
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
  	               		<th>Discount</th>
  	               		<th>Quantity</th>
  	               		<th>Total Money(vnđ)</th>
  	               		<th>Action</th>
                   </thead>
    				<tbody>
						@foreach($orderList as $itemes)
			                    <tr>
			                      
			                        <td>{{ $index++ }}   </td>
			                       
									<td>{{ $itemes->product_id }} </td>
			                        <td>{{ $itemes->product_name }} </td>
			                        <td>{{ number_format($itemes->price) }}</td>
			                        <td>{{ $itemes->discount_product }} </td>
			                        <td>{{ $itemes->quantity_product }}  </td>
			                        <td>{{ number_format($itemes->totalPirice) }}  </td>
			                       
									
								
			                        <td>
			                        
			                        	<p style="display: inline-block;" title="Edit">	
  				                        <button onclick="editProductID('{{ $itemes->product_id }}' ,{{ $itemes->quantity_product }})"
  				                        	 	class="btn btn-primary btn-xs" data-title="Edit"   >
  				                        		<span class="glyphicon glyphicon-pencil"></span>
  				                        </button>
			                        	</p>
			                        	
			                        	<p style="display: inline-block;"  data-placement="top" data-toggle="tooltip" >
  			                        		<button title="delete" onclick="deleteProductID('{{ $itemes->product_id }}' ,{{ $itemes->quantity_product }})" class="btn btn-danger btn-xs" data-target="#exampleModalCenter" data-title="Edit" data-toggle="modal" data-target="#delete" >
  			                        			<span class="glyphicon glyphicon-trash"></span>
  			                        		</button>
			                        	</p>
			                        </td>
			            
			                    </tr>
			    			@endforeach
   					</tbody>
   				</table>
   				{{ $orderList->links() }}
   				

   			</div>
        <div class="row" >
              <div class="col-md-10"></div>
              <div id="total" class="col-md-2"   >
                  <span>Total Money </span><span>{{ number_format($total_money_discount) }}</span><span> Vnđ</span>
              </div>
        </div>
   		</div>
   </div>

</div>
@stop
@section('js')
	<script type="text/javascript">
		var fk_order_id = $('#fk_order_id').val();

		function addPoduct(){
      var orde_product_id_str = $('#orderProduct').val();
      var order_product_id = orde_product_id_str.toUpperCase();
      console.log(fk_order_id);
      console.log(order_product_id);
      $.post('{{ route('addProductOreder') }}' ,{
                "_token": "{{ csrf_token() }}",
                 order_product_id: order_product_id,
                 fk_order_id: fk_order_id
           },function(data , status){
                console.log(data);
                if(data != '' && data.length > 0){
                   
                    $.each(data ,  function(index, el) {
                            alert('san pham da ton tai : '+ el.fk_product_id +' : ban co the cap nhat so san pham muon sua');
                            $('#exampleModalCenterProduct').modal({
                                      keyboard: false
                                 });
                            $('#quantity-label').text(el.quantity_product);
                            return false;
                    });
                  
                }else{
                    $.post('{{ route('checkProductID') }}' ,{
                          "_token": "{{ csrf_token() }}",
                          order_product_id: order_product_id
                          
                      },function(data1 , status){
                        console.log(data);
                            if(data1 != '' && data1.length > 0){
                                 alert('them so luong cho san pham moi');
                                      $('#exampleModalCenterProduct').modal({
                                      keyboard: false
                                 });
                            }else{
                              alert('san pham ko ton tai');
                            }

                      });
                }
           });
    }

		//sua so luong san pham da ton tai
		function severQuantityProduct(){
			var quantity = $('#qunatityProduct').val();
			var order_product_id = $('#orderProduct').val();
		
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
		function editProductID(order_product_id , quantity_product){
		
		
			$('#product-id-label-button').text(quantity_product);
			$('#product_id_button').val(order_product_id);
	
			$('#exampleModalCenterProductID').modal({
               keyboard: false
              });

		}
		function severQuantityProductID(){
			var quantity = $('#qunatityProductID').val();
			var order_product_id =$('#product_id_button').val();

			$.post('{{ route('addProductQuantityOreder') }}' ,{
           			"_token": "{{ csrf_token() }}",
           			 quantity: quantity,
           			 order_product_id: order_product_id,
           			 fk_order_id: fk_order_id
       		 },function(data , status){
	          	console.log(data);
	          	$('#exampleModalCenterProductID').modal('hide');
	          	alert(data);
	          	location.reload();
	       
       		 });

		}
    function deleteProductID(order_product_id , quantity_product){
        var check = confirm('You are late deleting product ID:' + order_product_id);

        if (check) {
             $.post('{{ route('deleteProductInOrder') }}' ,{
                "_token": "{{ csrf_token() }}",
                 quantity_product: quantity_product,
                 order_product_id: order_product_id,
                 fk_order_id: fk_order_id
           },function(data , status){
              alert(status);
              location.reload();
         
           });
        }else{
          //
        }
       
    }

			

		

		




	</script>
@stop