@extends('layouts.headerMenu')
@section('css')

<head>
  <meta charset="UTF-8">
  <title>Sales statistic</title>
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
      Sales Manager
      {{-- <a href="{{ route('sales-manage')}}"><button type="button" class="btn btn-success">Show All Employee</button></a> --}}
      <a href="{{route('sales-manage')}}" class="btn btn-primary btn-info"><span style="color: #FFFFFF" class="glyphicon glyphicon-list-alt"></span> </a>
    </div>
    <div style="/*background-color: red ; */height: 500px" class="panel-body">
      <table class="table table-hover">
        <tr>
          <th>Id</th>
          <th>Full name</th>
          <th>Sales this month ( $ )</th>
        </tr>
        @foreach ($employee as $item)
        <tr id="fillterData">
          <td>{{ $item->userId  }}</td>
          <td>{{ $item->userName }}</td>
          <td>{{ ($item->totalSales == null) ? 0 : $item->totalSales }}</td>
        </tr>
        @endforeach

      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{-- {{ $employee->links() }} --}}
        </ul>
      </nav>
    </div>
  </div>
</div>

<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading" >
      Search sales of employees
    </div>
    <div class="panel-body">
      <form method="post" action="{{route('search-sales')}}">
        {{csrf_field()}}
        <div> 
          <label for="id">id</label>
          <input type="text" id="id" name="id" required=""  class="form-control" value="{{-- {{ $edit? $id : '' }} --}}">
        </div>
        <div style="display: flex; flex-direction: row;">
          <div style="margin-top: 10px">
            <label for="from">From</label>
            <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd"> <input name="from" required id="valueDatePicker" class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 

            </div>
          </div>

          <div style="margin-top: 10px">
            <label for="to">To</label>
            <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd"> <input name="to" required id="valueDatePicker" class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
            </div>
          </div>
        </div>

          @if($errors->get('from'))
          <div style="margin-top: 10px" class="alert alert-danger">
            @foreach($errors->get('from') as $err)
            <li> {{$err}} </li>
            @endforeach
          </div>
          @endif

          @if($errors->get('to'))
          <div class="alert alert-danger">
            @foreach($errors->get('to') as $err)
            <li> {{$err}} </li>
            @endforeach
          </div>
          @endif
        
        

        <button type="submit" style="margin-top: 10px" class="btn btn-info">
          <span class="glyphicon glyphicon-search"></span> Search
        </button>
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
    $("#datepicker1").datepicker({         
      autoclose: true,         
      todayHighlight: true 
    }).datepicker('setDate', $('#dateTest').val());
  });

  $(function () {  
    $("#datepicker2").datepicker({         
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