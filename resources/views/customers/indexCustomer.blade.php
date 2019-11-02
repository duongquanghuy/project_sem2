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

	</style>
	
@stop
@section('sideber-menu')
<div class="left-sidebar" id="show-nav">
      @include('layouts.menu')
</div>

@stop
@section('container-fluid')
<div class="container">
	<div class="row inputNumber" >

		  <div class="form-group has-feedback has-search">
		  	<label>phone number</label>
    		<span class="glyphicon glyphicon-search form-control-feedback"></span>
    		<input id="searchPhoneNum" type="text" class="form-control" placeholder="Search">
    		<button onclick="searchPhonenum()" type="button"><i class="fa fa-search"></i></button>
 		 </div>
	</div>
	<div class="row">
		
        
        <div class="col-md-12">
        	<h4></h4>
        	<div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
	                    
	                   	<th>stt</th>
	                    <th>full Name</th>
	                    <th>phone number</th>
	                    <th>Edit</th>
	                    <th>Delete</th>
                   </thead>
    				<tbody id="customerList">
						@foreach($customerList as $iteme)
			                    <tr>
			                      
			                        <td>{{ $index++ }}   </td>
			                        <td>{{ $iteme->customer_fullname }} </td>
			                        <td>{{ $iteme->customer_phone }}  </td>
			                        <td>
			                        	<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
			                        </td>
    								<td>
    									<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
    								</td>
			                         
			                       
			                    </tr>
			    			@endforeach
   					</tbody>
   				</table>
   				{{ $customerList->links() }}
   			</div>
   		</div>
   </div>
</div>
@stop
@section('js')
	<script type="text/javascript">
	 function searchPhonenum(){
			var phoneNum = $("#searchPhoneNum").val();
			$.post('{{ route('viewSearchPhoneNum') }}', {
            "_token": "{{ csrf_token() }}",
      
            phoneNum: phoneNum,
    
        }, function(data) {

            if(data != '' && data.length > 0){
               $.each(data, function(item, val) {
         			$('#customerList').html("duong huy");
              });
            }else{
            	
            }
        });

	 }

	</script>
@stop