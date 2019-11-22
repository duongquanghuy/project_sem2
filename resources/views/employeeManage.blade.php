@extends('layouts.headerMenu')
@section('css')

<head>
  <meta charset="UTF-8">
  <title>Employee Manager</title>
  <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
  <style type="text/css">


    .control-label{
      padding: 6px;
      text-align: right; 
      font-size: 18px;

    }
    .modal-body{
      height: 150px;
    }
    .input-left{
      text-align: left;
    }
    .product-id-label{
      font-size:24px;
    }
    #phone_number{
      border-radius: 0 5px 5px 0 ;
    }

    #datepicker{
      width:180px; 
      margin: 0 20px 0px 0px;
    }
    #datepicker > span:hover{
      cursor: pointer;
    }

    .container{
      width: 1300px;
    }

    .panel-heading{
      background-color: #2087bf !important;
      font-weight: 600;
      font-size: 20px;
    }

    th, {
      font-weight: 600;
    }
    th{
      color: #2087bf;
      font-size: 18px;
    }
  </style>
</head>


@stop
@section('sideber-menu')
<div class="left-sidebar" id="show-nav">
  @include('layouts.menu')
</div>

@stop
@section('container-fluid')

<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Employee Manager
      {{-- <a href=""><button type="button" class="btn btn-success">Show All Employee</button></a> --}}
      <a href="{{route('employee-manage')}}" class="btn btn-primary btn-info"><span style="color: #FFFFFF" class="glyphicon glyphicon-list-alt"></span> </a>
    </div>
    <div style="/*background-color: red ; */height: 500px" class="panel-body">
      <table class="table table-hover">
        <tr>
          <th>Id</th>
          <th>Full name</th>
          <th>Email</th>
          <th>Avatar</th>
          <th>Position</th>
          <th>Phone</th>
          <th>Birthday</th>
          <th>Address</th>
          <th></th>
          <th></th>
        </tr>
        @foreach ($employee as $item)
        <tr id="fillterData">
          <td>{{ ($item->userId == null) ? 'No information' : $item->userId }}</td>
          <td>{{ ($item->userName == null) ? 'No infomation' : $item->userName }}</td>
          <td>{{ ($item->userEmail == null) ? 'No infomation' : $item->userEmail }}</td>
          <td><p style="width: 200px">{{ ($item->userAvatar == null) ? 'No information' : $item->userAvatar }} </p></td>
          <td>{{ ($item->userLevel == null) ? 'No infomation' : $item->userLevel }}</td>
          <td>{{ ($item->userPhoneNumber == null) ? 'No infomation' : $item->userPhoneNumber }}</td>
          <td>{{ ($item->userBirthday == null) ? 'No infomation' : $item->userBirthday }}</td>
          <td>{{ ($item->userAddress == null) ? 'No infomation' : $item->userAddress }}</td>
          {{-- <td><a href="{{ route('edit-employee') }}?id={{ $item->userId }}"><button class="btn btn-warning">Edit</button></a></td> --}}
          <td><a href="{{ route('edit-employee') }}?id={{ $item->userId }}" class="btn btn-primary btn-info"><span style="color: #FFFFFF" class="glyphicon glyphicon-pencil"></span> </a></td>
          {{-- <td><button onclick="deleteEmployee({{ $item->userId }})" class="btn btn-danger">Delete</button></td> --}}
          <td><a onclick="deleteEmployee({{ $item->userId }})" class="btn btn-primary btn-danger"><span style="color: #FFFFFF" class="glyphicon glyphicon-trash"></span> </a></td>
        </tr>
        @endforeach

      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{ $employee->links() }}
        </ul>
      </nav>
    </div>
  </div>
</div>

<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading" >
      Input infomation employee
    </div>
    <div class="panel-body">
      <form method="post" action="{{route('update-employee')}}">
        {{csrf_field()}}
        <div style="display: none;"> 
          <label for="id">id</label>
          <input type="text" id="id" name="id"  class="form-control" value="{{ $edit? $idEmployeeUpdate : '' }}">
        </div>
        <div>
          <label for="name">Fullname</label>
          <input required type="text" id="name" name="name"  class="form-control" value="{{ $edit? $nameEmployeeUpdate : ''}}">
        </div>
      <div>
        <label for="urlAvatar">Url avatar</label>
        <input type="text" id="urlAvatar" name="urlAvatar" value="{{ $edit? $avatarEmployeeUpdate : ''}}" class="form-control">
      </div>
      <div >
        <label for="email">Email</label>
        <input required type="text" id="email" name="email" value="{{ $edit? $emailEmployeeUpdate : ''}}" class="form-control">
      </div>
      <div >
        <label for="position">Position</label>
        <div>
          <select required class="form-control" id="inputGroupSelect" name="position">
            <option value="3" {{ ($levelEmployeeUpdate == 3) ? 'selected':null }}>Employee</option>
            <option value="2" {{ ($levelEmployeeUpdate == 2) ? 'selected':null }}>Leader</option>
            <option value="1" {{ ($levelEmployeeUpdate == 1) ? 'selected':null }}>Manager</option>
          </select>
        </div>
      </div>
      <div>
        <label for="phone">Phone</label>
        <input required type="number" id="phone" name="phone" value="{{ $edit? $phoneEmployeeUpdate : ''}}" class="form-control">
      </div>

      <div style="margin-top: 10px">
        <label for="birthday">Birthday</label>
        <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd"> <input name="birthday" required id="valueDatePicker" class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 

        </div>
      </div>

      <div>
        <label for="address">Address</label>
        <input required type="text" id="address" onfocus="" name="address" value="{{ $edit? $addressEmployeeUpdate : ''}}" class="form-control">
      </div>

      {{-- <input type="submit"  value="Update" class="btn btn-success myBtn"></input> --}}
      <button style="margin-top: 10px" type="submit" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-plus-sign"></span>Update
        </button>
      <input style="display: none;" id="dateTest" type="" name="" value="{{$edit? $birthdayEmployeeUpdate : ''}}"></input>
    </form>
  </div>
</div>

</div>

@stop
@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(function () {  
    $("#datepicker").datepicker({         
      autoclose: true,         
      todayHighlight: true 
    }).datepicker('setDate', $('#dateTest').val());
  });

  $(".datetimepicker").prop('readonly', false);

  $( "#originalPrice" ).change(function() {
    $('#price').val(getPrice($('#originalPrice').val(),$('#discount').val()));
  });

  $( "#discount" ).change(function() {
    $('#price').val(getPrice($('#originalPrice').val(),$('#discount').val()));
  });

  function getPrice(originalPrice, discount){
    return parseInt(originalPrice) -  parseInt(originalPrice)*discount/100;
  }

  function deleteEmployee(id){

    var result = confirm("Want to delete employee ID  = "+ id + "?");
    if (result) {
      $.post("{{ route('delete-employee') }}",
      {
        '_token' : $('[name=_token]').val(),
        id: id
      },
      () => { 
        window.open('{{ route('employee-manage') }}', '_self')
      }
      );
    }
  }
</script>
@stop