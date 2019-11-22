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
      SALES OF COMPANY
    </div>
    <div class="panel-body">
      <form method="get" action="{{ route('sale-total-company') }}">
        <button class="btn btn-info" type="submit">SEE TOTAL SALE OF COMPANY</button>
      </form>
      <form method="get" action="{{ route('sale-by-time') }}">
        {{csrf_field()}}
        <div style="display: flex; flex-direction: row;">
          <div style="margin-top: 10px">
            <label for="from">From</label>
            <div class="input-group date" data-date-format="yyyy-mm-dd"><input name="startDay" class="form-control" type="date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
            </div>
          </div>
          <div style="margin-top: 10px">
            <label for="to">To</label>
            <div class="input-group date" data-date-format="yyyy-mm-dd"><input name="endDay" class="form-control" type="date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-info">SEE RESULT</button>
      </form>
    </div>
  </div>
@stop
