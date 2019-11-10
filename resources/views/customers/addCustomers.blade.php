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
               <input class ="phone-number" name="phone_num" type="number" placeholder="phone (phone number )" class="form-control input-md" value="">
               <p>id khach hàng</p>
                <input id="customer_id"   value="">
               
               
            </div>
          </div>
            
      </div>
          
        <button  id="submit" onclick="summitCustomer()" class="btn" type="submit" 
        data-target="" data-title="Edit" data-toggle="modal" >submit</button>

  
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title " id="exampleModalLongTitle">Edit Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- phan sua thong tin -->
      <div class="modal-body">
        <div class="form-group">
      <input type="text" name="cus_id" id="cus-id">
         </div>
        <div class="form-group" >

      <label class="col-md-4 control-label" for="full-Name">Name (Full name)</label>  
        <div class="col-md-12">
        <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
              <input id="full-Name" name="Name" type="text" placeholder="Name (Full name)" class="form-control input-md">
           </div>
      </div>
    </div>
    <div class="form-group" >
        <label class="col-md-4 control-label" for="Phone-number ">Phone number </label>  
        <div class="col-md-12">
 
            <div class="input-group othertop">
              <div class="input-group-addon">
              <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>
        
              </div>
            <input id="Phone-number-edit" name="Secondary Phone number " type="text" placeholder=" Secondary Phone number " class="form-control input-md">
    
          </div>
  
      </div>
    </div>
      </div>
        <!-- het sua thong tin -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="addCustomer()" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('js')
  <script type="text/javascript">

       function summitCustomer(){
          var phone_number = $('.phone-number').val();

          console.log(phone_number);
          
          $.post('{{ route('viewPostPhone') }}', {
            "_token": "{{ csrf_token() }}",
      
            phone_number: phone_number,
    
        }, function(data) {

            if(data != '' && data.length > 0){
                 $.each(data, function(item, val) {
         
                $("#customer_id").val(val.customer_id);

              });
            }else{
              if(phone_number != ''){

                $('#exampleModalCenter').modal({
                  keyboard: false
                 });
              }
              $("#Phone-number-edit").val(phone_number);
            }
        });

      }

      function addCustomer(){

        var fullname = $("#full-Name").val();
     

        if (fullname == '') {
           alert("Tên  không được để trống");
           return false;
        }
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var phonenum = $('#Phone-number-edit').val();
        if(phonenum != ''){
             if (vnf_regex.test(phonenum) == false){
                alert('Số điện thoại của bạn không đúng định dạng!');
                return false;
            }else{
              //
            }
        }else{
            alert('Bạn chưa điền số điện thoại!');
            return false;
        }

        $.get('{{ route('vieweditCustomer') }}' ,{
           "_token": "{{ csrf_token() }}",
            fullname: fullname,
            phonenum: phonenum,
        },function(data){
            alert("them khach hang thanh cong");
            location.reload();
        });

      }


  </script>


@stop