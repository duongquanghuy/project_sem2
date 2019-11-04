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
     margin: 0 auto;
   }
   .center-element{
    text-align: center;
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title " id="exampleModalLongTitle">Edit Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- phan sua thong tin -->
      <div class="modal-body">
       <div class="form-group" style="">
         <input type="number" name="empRollNo" id="emp-roll-no">
       </div>
       <div class="form-group" >
        <label class="col-md-4 control-label" for="empFullName">*Full Name:</label>  
        <div class="col-md-12">
         <div class="input-group">
          <div class="input-group-addon">
           <i class="fa fa-user"></i>
         </div>
         <input id="emp-full-name" name="emp-full-name" type="text" placeholder="Please fill full name here" class="form-control input-md">
       </div>
     </div>
   </div>
   <div class="form-group" >
        <label class="col-md-4 control-label" for="empBirthDay">*Birthday:</label>  
        <div class="col-md-12">
         <div class="input-group">
          <div class="input-group-addon">
           <i class="fa fa-calendar"></i>
         </div>
         <input id="emp-birth-day" name="empBirthDay" type="text" placeholder="Please fill birth day here" class="form-control input-md">
       </div>
     </div>
   </div>
   <div class="form-group" >
     <label class="col-md-4 control-label" for="empPhoneNumber">*Phone Number:</label>  
     <div class="col-md-12">
       <div class="input-group othertop">
         <div class="input-group-addon">
          <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>
        </div>
        <input id="emp-phone-number" name="empPhoneNumber" type="number" placeholder="Please fill phone number here" class="form-control input-md">
      </div>
    </div>
  </div>
  <div class="form-group" >
     <label class="col-md-4 control-label" for="empAddress">*Address:</label>  
     <div class="col-md-12">
       <div class="input-group othertop">
         <div class="input-group-addon">
          <i class="fa fa-address-card fa-1x" style="font-size: 20px;"></i>
        </div>
        <input id="emp-address" name="empAddress" type="text" placeholder="Please fill address here" class="form-control input-md">
      </div>
    </div>
  </div>
</div>
<!-- het sua thong tin -->
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button onclick="checkEmployee()" type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>
<!-- phan homeword -->
<div class="row">
  <div class="col-md-4">
    <ul class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="#"> Home</a></li>
      <li class="active"><a href="{{ route('viewEmployees') }}">Employees</a></li>
    </ul>
  </div>
  <div class="col-md-8">
    <ul class="list-inline pull-right mini-stat">
      <li>

        <h5>EMPLOYEES <span class="stat-value color-orang"><i class="fa fa-plus-circle"></i>
        {{ $employeesListCount }}</span></h5>

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
      <form method="get" action="" class="search-form">
        <div class="form-group has-feedback">
          <label for="search" class="sr-only">Search</label>
          <input type="text" class="form-control" name="empNameSearch" id="emp-name-search" placeholder="Enter employee's name here">
          <span class="glyphicon glyphicon-search form-control-feedback"></span>
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
         <th>Employee(s) Roll No</th>
         <th>Full Name</th>
         <th>Birth Day</th>
         <th>Phone Number</th>
         <th>Username</th>
         <th>Address</th>
         <th>System Authorization</th>
         <th>Join Time</th>
         <th>Retired Time</th>
         <th>Edit</th>
       </thead>
       <tbody>
        @foreach($employeesList as $item)
        <tr>
         <td class="center-element">{{ $item->em_roll_no }}</td>
         <td>{{ $item->fullName }}</td>
         <td>{{ $item->birth_day }}</td>
         <td>{{ $item->phone_number }}</td>
         <td>{{ $item->username }}</td>
         <td>{{ $item->address }}</td>
         <td class="center-element">{{ $item->system_authorization }}</td>
         <td>{{ $item->join_time }}</td>
         <td>{{ $item->retired_time }}</td>
         <td>
          <p data-placement="top" data-toggle="tooltip" title="Edit">
            <button onclick="editCustomerId({{ $item->em_roll_no }})" class="btn btn-primary btn-xs" data-target="#exampleModalCenter" data-title="Edit" data-toggle="modal" data-target="#edit" >
              <span class="glyphicon glyphicon-pencil"></span>
            </button>
          </p>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $employeesList->links() }}
</div>
</div>
</div>
</div>
@stop
@section('js')
<script type="text/javascript">
  function checkEmployee(){
   var idCus = $("#cus-id").val();
   var phonenum = $('#Phone-number').val();
   var fullname = $("#full-Name").val();

   if (fullname == '') {
    alert("Tên  không được để trống");
    return false;
  }
  var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;

  if(phonenum != ''){
   if (vnf_regex.test(phonenum) == false){
    alert('Số điện thoại của bạn không đúng định dạng!');
    return false;
  }else{

  }
}else{
  alert('Bạn chưa điền số điện thoại!');
  return false;
}



$.post('{{ route('viewPostPhone') }}', {
  "_token": "{{ csrf_token() }}",
  idCus: idCus,
  fullname: fullname,
  phonenum: phonenum,

}, function(data , status) {
  alert(data);
  location.reload();

});

}


function editCustomerId(id){
 $.post('{{ route('vieweditCustomerID') }}' ,{
   "_token": "{{ csrf_token() }}",
   id: id

 },function(data){
  $.each(data ,function(item, val) {
   $("#full-Name").val(val.customer_fullname);
   $("#Phone-number").val(val.customer_phone);
   $("#cus-id").val(val.customer_id);
 });
});

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





</script>
@stop