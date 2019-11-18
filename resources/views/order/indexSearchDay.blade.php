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
		            <li class="active"><a href="">Order List</a></li>
	          	</ul>
            </div>
            <div class="col-md-8">
	            <ul class="list-inline pull-right mini-stat">
	              <li>

	                <h5> Total order 
	                	<span class="stat-value color-orang"><i class="fa fa-plus-circle"></i>
	                 </span></h5>
	                
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
					<div  class="alert alert-danger SearchDay">
					</div>
				</div>
			</form>
   		</div>
		
    </div>
       <input style="display: none;" id="noThing" type="" name="" value="">
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
			                        <td>{{ $iteme->em_roll_no_order }} </td>
			                        <td>{{ $iteme->discount_nullable }}  </td>
			                        <td>{{ number_format($iteme->total_money_discount) }}  </td>
			                        <td style="max-width: 100px;  word-wrap: break-word; " >
			                        	{{ $iteme->note }}
			                        </td>
									<td>{{ date('d/m/Y', strtotime($iteme->created_at))  }}  </td>
								
			                        <td>
			                        	<a href="{{ route('editOrderID') }}?id={{ $iteme->order_id	 }}" data-placement="top" data-toggle="tooltip" title="Edit">
			                        		<button 
			                        	 		class="btn btn-primary btn-xs" data-target="#exampleModalCenter" data-title="Edit" data-toggle="modal" data-target="#edit" >
			                        			<span class="glyphicon glyphicon-pencil"></span>
			                        		</button>
			                        	</a>
			                        	<a data-placement="top" data-toggle="tooltip" title="delete">
			                        		<button onclick="deleteOrederId({{ $iteme->order_id }})" class="btn btn-danger btn-xs" data-target="#exampleModalCenter" data-title="Edit" data-toggle="modal" data-target="#delete" >
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

</div>
@stop
@section('js')
	<script type="text/javascript">
	
		
		


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
		
		
	
	


	




	</script>
@stop