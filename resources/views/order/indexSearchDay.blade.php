@extends('layouts.headerMenu')
@section('css')
	<style type="text/css">
		.has-search{
			max-width: 40%;

		}
		.inputNumber{
			text-align: right;
			background-color: tomato;
		}
		.container -> .inputNumber{
			text-align: right;
		}
		#exampleModalCenter{
			margin-top: 10%;
		
		}
		.modal-body {
			height: 200px;
			margin: 0 auto;

		}
		.input-group{
			margin: 0 auto;-
		}
		
		

		.selectpicker {
		  color: #333333;
		  text-align: right;
		  width: 200px;
		  padding: 6px;
		  font-weight: 500;
		  border: 1px solid #ccc;
		  border-radius: 5px;
		  float: left;
		  margin-right: 10px;
		}
		
		.from-inline{
			width: 60%;
			padding: 5px;
			border: 1px solid #ccc;

			border-radius: 5px;
		}
		
		.SearchDay{
			display: none;
			height: auto;
			padding: 6px;
		}
		.SearchDayID{
			display: none;
			height: auto;
			padding: 6px;
		}

	</style>
		
	
@stop
@section('sideber-menu')
<div class="left-sidebar" id="show-nav">
      @include('layouts.menu')
</div>

@stop
@section('container-fluid')


<div class="row">
            <div class="col-md-4">
	            <ul class="breadcrumb">
		            <li><i class="fa fa-home"></i><a href="#"> Home</a></li>
		            <li class="active"><a href="{{ route('displayOrder') }}">Order List</a></li>
		            <li class="active"><a href="{{ route('searchDaytime') }}">Search Day Order</a></li>
	          	</ul>
            </div>
            <div class="col-md-8">
	            <ul class="list-inline pull-right mini-stat">
	              <li>

	                
	                
	              </li>
	            </ul>
            </div>
</div>
<!-- het phan homeword -->
<div class="container">
	
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        </div>
    </div>
    <div class="row">
         <div class="col-md-4 col-md-offset-3">
           	<form method="get" action="{{ route('displayOrder') }}" class="search-form">
                <div class="form-group has-feedback">
            		<label for="search" class="sr-only" >Search Oreder ID </label>
            		<input  type="number" class="form-control" name="search" id="search" placeholder="Search Oreder ID >> Enter">
              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
					<div class="alert alert-danger SearchDayID">
					</div>
            	</div>
            </form>
        </div>
     
       	<div class="col-md-4 col-md-offset-3">
	       	<form method="get" action="{{ route('searchDaytime') }}">
				<div class="form-group has-feedback">
					<input class="from-inline" id="date" type="date" name="bday" min="2000-01-02" >
					<button   class="btn btn-success">Search Day</button>
					
				</div>
				<div  class="alert alert-danger SearchDay">
				</div>
			</form>
   		</div>
		
    </div>
	<div class="row">
        <div class="col-md-12">
        	<h4></h4>
        	<div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
	                    
	                   	<th>#</th>
	                    <th>Order ID</th>
	                    <th>employee ID</th>
	                    <th>Discount (%)</th>
	               		<th>Total Money(vnđ)</th>
	               		<th>Note</th>
	               		<th>Creasted at</th>
	               		<th>Actions</th>
                   </thead>
    				<tbody id="orderList">
						@foreach($orderLists as $iteme)
			                    <tr>
			                        <td>{{ $index++ }}   </td>
			                        <td>{{ $iteme->order_id }} </td>
			                        <td>{{ $iteme->id }} </td>
			                        <td>{{ $iteme->discount_nullable }}  </td>
			                        <td>{{ number_format($iteme->total_money_discount) }}  </td>
			                        <td style="max-width: 100px;  word-wrap: break-word; " >
			                        	{{ $iteme->note }}
			                        </td>
									<td>{{ date('d/m/Y', strtotime($iteme->created_at))  }}  </td>
								
			                        <td>
			                        	<a href="{{ route('editOrderID') }}?id={{ $iteme->order_id	 }}"   title="Edit" style="text-decoration:none;" data-toggle="tooltip">
			                        		<button 
			                        	 		class="btn btn-primary btn-xs" >
			                        			<span class="glyphicon glyphicon-pencil"></span>
			                        		</button>
			                        	</a>
			                        	<a href="{{ route('printOrderIdIndex') }}?id={{ $iteme->order_id	 }}"  title="print" style="text-decoration:none;" data-toggle="tooltip">
			                        		<button  class="btn btn-success btn-xs" >
			                        			<span class="glyphicon glyphicon-print"></span>
			                        		</button>
			                        	</a>
			                        	<a style="text-decoration:none;" data-toggle="tooltip" title="delete">
			                        		<button onclick="deleteOrederId({{ $iteme->order_id }})" class="btn btn-danger btn-xs" >
			                        			<span class="glyphicon glyphicon-trash"></span>
			                        		</button>
			                        	</a>
			                        </td>
			            
			                    </tr>
			    			@endforeach
   					</tbody>
   				</table>
   				{{ $orderLists->onEachSide(1)->links() }}
   			</div>

   		</div>
   </div>
	<input style="display: none;" id="noThing" type="" name="" value="{{ $noThing }}">
</div>
@stop
@section('js')
	<script type="text/javascript">
			var noThing =  $('#noThing').val();
			console.log(noThing);
			if(noThing == 4){
				$('.SearchDay').text('khong tim thay ket qua nao!');
				$('.SearchDay').css('display' , 'block');

			}
		
		


		 $('#search').keypress(function(event) {
			 	var keycode = (event.keyCode ? event.keyCode : event.which);
			 	var search = $('#search').val();
				 if(keycode == '13'){
			 		if (search != '') {

			 		}else{
			 			alert('You pressed a "enter" key in textbox');
			 		}
       	   
    			}
		});
		 function deleteOrederId(id){
			console.log(id);

			var checkDelete = confirm('You sure you want to Delete ? ID : ' + id);
						if (checkDelete) {
				$.post('{{ route('deleteOrderID') }}', {
                          "_token": "{{ csrf_token() }}",
                         	id: id
    
                      },function(data , status){
                      	  console.log(data);
                          alert(status);
                          location.reload();
                     });
			}else{
				////
			}
		}


		$('[data-toggle="tooltip"]').tooltip(); 
		
		
	
	


	




	</script>
@stop