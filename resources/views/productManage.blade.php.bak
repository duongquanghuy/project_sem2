@extends('layouts.headerMenu')
@section('css')

<head>
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

{{csrf_field()}}
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading" >
     Search infomation product
   </div>
   <div class="panel-body">
    <form method="post" action="{{ route('search-product')}}">
      {{csrf_field()}}
      <div>
        <label for="id">Product's id</label>
        <input type="text" id="id" name="idSearch"  class="form-control" value="">
      </div>
      <input type="submit" value="Search" class="btn btn-success myBtn"></input>
    </form>
  </div>
</div>
  <div class="panel panel-primary">
    <div class="panel-heading">
      Manage Product
      <a href="{{route('product-manage')}}"><button type="button" class="btn btn-success">Show All Product</button></a>
    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <tr>
          <th>Product's id</th>
          <th>Product's name</th>
          <th>Url image</th>
          <th>Category</th>
          <th>Expiry date</th>
          <th>Quantity</th>
          <th>Discount</th>
          <th>Original price</th>
          <th>Price</th>
          <th style="width: 60px"></th>
          <th style="width: 60px"></th>
        </tr>
        @foreach ($product as $item)
        <tr id="fillterData">
          <td>{{ $item->product_id }}</td>
          <td>{{ $item->product_name }}</td>
          <td>{{ $item->link_img }}</td>
          <td>{{ $item->category_id }}</td>
          <td>{{ $item->exp_date }}</td>
          <td>{{ $item->quantity }}</td>
          <td>{{ $item->discount_product }}</td>
          <td>{{ $item->original_price }}</td>
          <td>{{ $item->price}}</td>
          <td><a href="{{ route('edit-product') }}?id={{ $item->product_id }}"><button class="btn btn-warning">Edit</button></a></td>
          <td><button onclick="deleteProduct('{{ $item->product_id }}')" class="btn btn-danger">Delete</button></td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

<div class="container">
  

<div class="panel panel-primary">
  <div class="panel-heading" >
    Input infomation product
  </div>
  <div class="panel-body">
    <form method="post" action="{{ route('add-product')}}">
      {{csrf_field()}}
      <div>
        <label for="id">Product's id</label>
        <input type="text" id="id" name="id"  class="form-control" value="{{ $edit? $id : '' }}">
      </div>
      <input style="" type="text" id="type" name="type"  class="form-control" value="{{ $edit? $type : '' }}">
      <div>
        <label for="productName">Product's name</label>
        <input required type="text" id="productName" name="name"  class="form-control" value="{{ $edit? $productNameUpdate : ''}}">
      </div>
      <div>
        <label for="urlImage">Url image</label>
        <input required type="text" id="urlImage" name="urlImage" value="{{ $edit? $linkImgUpdate : ''}}" class="form-control">
      </div>
      <div >
        <label for="categoryId">Category id</label>
        <div>
          <select required class="form-control" id="inputGroupSelect" name="categoryId">
            @foreach ($category as $item)
            <option value="{{$item->category_id}}" {{ ($item->category_id == $categoryIdUpdate)?'selected':null }}>{{$item->category_name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div style="margin-top: 10px">
        <label for="expiryDate">Expiry date</label>
        <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd"> <input name="expDate" required id="valueDatePicker" class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 

        </div>
      </div>
      <div>
        <label for="quantity">Quantity</label>
        <input required type="number" id="quantity" name="quantity" value="{{ $edit? $quantityUpdate : ''}}" class="form-control">
      </div>
      <div>
        <label for="originalPrice">Original price</label>
        <input required type="number" id="originalPrice" name="originalPrice" value="{{ $edit? $originalPriceUpdate : ''}}" class="form-control">
      </div>
      <div>
        <label for="discount">Discount (%)</label>
        <input required type="number" step="0.01" id="discount" name="discount" value="{{ $edit? $discountUpdate : ''}}" class="form-control">
      </div>
      <div>
        <label for="price">Price</label>
        <input required type="number" id="price" onfocus="" name="price" value="{{ $edit? $priceUpdate : ''}}" class="form-control">
      </div>
        <input type="submit" {{-- onclick="addProduct($('#id').val(),
          $('#productName').val(), $('#urlImage').val(), $('#inputGroupSelect').val(), $('#valueDatePicker').val(), $('#quantity').val(), $('#originalPrice').val(), $('#discount').val(), $('#price').val()
          )" --}} value="{{ $edit? 'Update' : 'Add'}}" class="btn btn-success myBtn"></input>
          <input style="display: none;" id="dateTest" type="" name="" value="{{$edit? $expDateUpdate : ''}}"></input>
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
      // (data) => { $('#fillterData').html(data);} // Hiển thị dữ liệu được chọn
      );
    }
  </script>
  @stop