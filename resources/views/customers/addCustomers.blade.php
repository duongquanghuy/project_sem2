@extends('layouts.headerMenu')
<div class="left-sidebar" id="show-nav">
      @include('layouts.menu')
</div>
@section('container-fluid')

	<div class="row">

      <div class="form-group">
        <label class="col-md-4 control-label" for="Name (Full name)">Phone number (phon customer)</label>  
          <div class="col-md-4">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user"></i>
               </div>
               <input class ="phone_number" name="phone_num" type="number" placeholder="phone (phone number )" class="form-control input-md" value="">
               <p>id khach hàng</p>
                <input id="customer_id"   value="">
               
               
            </div>
          </div>
            
      </div>

        <button onclick="summitCustomer()" class="btn" type="submit">submit</button>

  
  </div>
     
 <div class="container" id="customer" style="display: "> 

   <div class="row"> 
      <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
         <legend><a href="http://hocwebgiare.com/"><i class="glyphicon glyphicon-globe"></i></a> thong tin khach hang!
         </legend> 
           <div class="form" > 
                <input id="fullname" name="fullname" type="text" placeholder="fullname" class="form-control input-md" value="">
                 <br> 
                <input class="phone_num" name="phone_num" type="number" placeholder="phone (phone number )" class="form-control input-md phone_number" value="">
              <br> 
              <button onclick="addCustomer()" class="btn btn-lg btn-primary btn-block" > Đăng ký</button> 
           </div> 
      </div> 
   </div>
</div>

@stop
@section('js')
  <script type="text/javascript">

       function summitCustomer(){
          var phone_number = $('.phone_number').val();

          
          alert(phone_number);
          $.post('{{ route('viewPostPhone') }}', {
            "_token": "{{ csrf_token() }}",
      
            phone_number: phone_number,
    
        }, function(data) {

            if(data != '' && data.length > 0){
                 $.each(data, function(item, val) {
         
                $("#customer_id").val(val.customer_id);

              });
            }else{
              $('#customer').css("display" , "inline-block");
              $(".phone_number").val(phone_number);
            }
        });

      }

      function addCustomer(){

        var fullname = $("#fullname").val();
        var phone_num = $(".phone_num").val();

        $.get('{{ route('viewPostCus') }}' ,{
           "_token": "{{ csrf_token() }}",
            fullname: fullname,
            phone_num: phone_num,
        },function(data){

            alert("them khach hang thanh cong")
        });

      }


  </script>


@stop