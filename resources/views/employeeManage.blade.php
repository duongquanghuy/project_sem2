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
      <a href=""><button type="button" class="btn btn-success">Show All Employee</button></a>
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
          <th>Join time</th>
          <th>Address</th>
          <th style="width: 60px"></th>
          <th style="width: 60px"></th>
        </tr>
        @foreach ($employee as $item)
        <tr id="fillterData">
          <td>{{ $item->id }}</td>
        {{--   <td>{{ $item->product_name }}</td>
          <td>{{ $item->link_img }}</td>
          <td>{{ $item->category_id }}</td>
          <td>{{ $item->exp_date }}</td>
          <td>{{ $item->quantity }}</td>
          <td>{{ $item->discount_product }}</td>
          <td>{{ $item->original_price }}</td>
          <td>{{ $item->price}}</td> --}}
          <td><a href=""><button class="btn btn-warning">Edit</button></a></td>
          <td><button onclick="deleteProduct('')" class="btn btn-danger">Delete</button></td>
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
      <form method="post" action="">
        {{csrf_field()}}
        <div style="display: none;"> 
          <label for="id">id</label>
          <input type="text" id="id" name="id"  class="form-control" value="{{-- {{ $edit? $id : '' }} --}}">
        </div>
        <div>
          <label for="name">Fullname</label>
          <input required type="text" id="name" name="name"  class="form-control" value="{{-- {{ $edit? $productNameUpdate : ''}} --}}">
        </div>
        <div>
          <label for="urlAvatar">Url avatar</label>
          <input required type="text" id="urlAvatar" name="urlAvatar" value="{{-- {{ $edit? $linkImgUpdate : ''}} --}}" class="form-control">
        </div>
        <div >
          <label for="email">Email</label>
          <input required type="text" id="email" name="email" value="{{-- {{ $edit? $linkImgUpdate : ''}} --}}" class="form-control">
        </div>
        <div >
          <label for="position">Position</label>
          <div>
            <select required class="form-control" id="inputGroupSelect" name="position">
              {{-- @foreach ($category as $item) --}}
              {{-- <option value="{{$item->category_id}}" {{ ($item->category_id == $categoryIdUpdate)?'selected':null }}>{{$item->category_name}}</option> --}}
              {{-- @endforeach --}}
            </select>
          </div>
        </div>
        <div>
          <label for="phone">Phone</label>
          <input required type="number" id="phone" name="phone" value="{{-- {{ $edit? $quantityUpdate : ''}} --}}" class="form-control">
        </div>

        <div style="margin-top: 10px">
          <label for="birthday">Birthday</label>
          <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd"> <input name="birthday" required id="valueDatePicker" class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 

          </div>
        </div>

        <div style="margin-top: 10px">
          <label for="joinTime">Join time</label>
          <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd"> <input name="joinTime" required id="valueDatePicker" class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 

          </div>
        </div>

        <div>
          <label for="address">Address</label>
          <input required type="text" id="address" onfocus="" name="address" value="{{-- {{ $edit? $priceUpdate : ''}} --}}" class="form-control">
        </div>

        <input type="submit"  value="Update" class="btn btn-success myBtn"></input>
          <input style="display: none;" id="dateTest" type="" name="" value="{{-- {{$edit? $expDateUpdate : ''}} --}}"></input>
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

    $( "#originalPrice" ).change(function() {
      $('#price').val(getPrice($('#originalPrice').val(),$('#discount').val()));
    });

    $( "#discount" ).change(function() {
      $('#price').val(getPrice($('#originalPrice').val(),$('#discount').val()));
    });

    function getPrice(originalPrice, discount){
      return parseInt(originalPrice) -  parseInt(originalPrice)*discount/100;
    }

    function deleteProduct(id){
      $.post("{{ route('delete-product') }}",
      {
        '_token' : $('[name=_token]').val(),
        id: id
      },
      () => { 
        window.open('{{ route('product-manage') }}', '_self')
      },
      // (data) => { $('#fillterData').html(data);} // Hi?n th? d? li?u du?c ch?n
      );
    }
  </script>
  @stop