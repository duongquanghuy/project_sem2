@extends('layouts.headerMenu')
@section('css')
	<style type="text/css">

	 .control-label{
      padding: 6px;
      text-align: right; 
      font-size: 18px;

   }
   .modal-body{
    height: 150px;
   }
   .modal-body-printorder{
      height: 80px;
   }
   .input-left{
    text-align: left;
   }.product-id-label{
    font-size:24px;
   }
   #phone_number{
      border-radius: 0 5px 5px 0 ;
   }
   #fullnameCustomer{
      color: green;
   }
    #totalProducts{
      display: none;
    }
    #total{
      font-weight: 700;
    }
  @media only screen and (max-width: 900px) {
    .modal-body-printorder{
      height: 100px;
    }
  }


    

	</style>
  }
	
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
            <li><i class="fa fa-home"></i><a href="#" onclick="checkOrderNull()"> Home</a></li>
              <li class="active"><a href="" style="color: #333333">Add Order</a></li>
          </ul>
            </div>
            <div class="col-md-8">
            <ul class="list-inline pull-right mini-stat">
              <li>

                <h5> Total order <span class="stat-value color-orang"><i class="fa fa-plus-circle"></i>
                 </span></h5>
                
              </li>
            </ul>
            </div>
</div>

<!-- note -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Overview (max 120 words)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
       
          <textarea maxlength="120" placeholder="note" class="form-control" rows="10" value="note"  id="OverviewNote" name="Overview"></textarea>
    
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- in hoa don -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenterInOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title " id="exampleModalLongTitleInOrder">Edit Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- phan sua thong tin -->
      <div class="modal-body-printorder"  >
          
            
          <div class="form-group" >
              <label style="text-align: center;" class="col-md-12 control-label" >Print order customer <em id="fullnameCustomer" ></em></label>
          </div>
          <div class="form-group" >
              <label style="text-align: center;" class="col-md-12 control-label" >Order ID <em id="orderIdlabel"></em></label>
          </div>
      </div>
        <!-- het sua thong tin -->
      <div class="modal-footer">
          
          <form method="get" action="{{ route('printOrderID') }}">
              {{ csrf_field() }}
             
              <div class="table-wrapper" style="display: inline-block;">
                    <div class="form-group" style="display: none;">
                      <input  type="number" name="orderId" class="form-control"  value="" id="orderId">
                    </div>
                    <button onclick="deleteOrder()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success">Print</button>
              </div>
          </form>
     
      </div>
     
    </div>
  </div>
</div>
<!-- phan khach them khach hang -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title " id="exampleModalLongTitleCustomer">Edit Customer</h5>
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
<!--   phan them so luong san pham -->
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenterProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title " id="exampleModalLongTitle">Edit Quantity Product <span class="product-id-label"> </span></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- phan sua thong tin -->
      <div class="modal-body">
          
          <div class="form-group" style="display: none;" >
               <input  type="text" name="product_quantity_id" id="product_quantity_id">
          </div>
      <div class="form-group" >
         <label class="col-md-5 control-label input-left" >Quantity</label>  
         <div class="col-md-11 input-left">
 
            <div class="input-group othertop">
              <div class="input-group-addon">
                  <i class="fa fa-sticky-note-o fa-1x" style="font-size: 20px;"></i>
        
              </div>
              <input id="qunatityProduct" name="product" type="number" placeholder=" Secondary Phone number " class="form-control input-md">
            </div>
  
          </div>
        </div>
      </div>
        <!-- het sua thong tin -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="severQuantityProduct()" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <!--  het phan sua so luong -->
    <div class="row">
      <div class="form-group" >

            <label  class="col-md-3 control-label" for="">Product (id)</label>  
            <div class="col-md-4" style="margin-top: 10px">
 
              <div class="input-group othertop">
                  <div class="input-group-addon">
                     <i class="fa fa-archive fa-1x" ></i>
                  </div>
                  <input style="max-width: 500px" id="product-id" name="product-id" type="text" placeholder=" Product (id) >> Enter " class="form-control input-md">
              </div>
  
            </div>
          <div class="col-md-2" style="margin-top: 10px">
              <div class="input-group othertop" >
              
                    <input id="quantity" name="quantity" type="number" placeholder="Quantity" class="form-control input-md" style="border-radius: 5px;" value="1">
              </div>
          </div>
        </div>
     
 
    </div>
    <div class="row">
      <div class="form-group" >

            <label  class="col-md-3 control-label" for="phone_number">Phone number (phone customer)</label>  
            <div class="col-md-4" style="margin-top: 10px">
 
              <div class="input-group othertop">
                  <div class="input-group-addon">
                     <i class="fa fa-user fa-1x" style="font-size: 20px;"></i>
                  </div>
                  <input style="max-width: 500px" id="phone_number" name="phone-number" type="number" placeholder="phone (phone number )" class="form-control input-md" value="">
                  <input style="display: none;" style="" class="customer_id"   value="">
              </div>
  
            </div>
          <div class="col-md-1" style="margin-top: 10px">
              <div class="input-group othertop" >
                    <button   id="submit" onclick="summitCustomer()" class="btn btn-success" type="button" 
                    data-target="" data-title="Edit" data-toggle="modal" >submit</button>
              </div>
          </div>
          <div class="col-md-2" style="margin-top: 10px">
              <div class="input-group othertop" >
              
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                     Note
                    </button>
              </div>
          </div>
         
        </div>


     
 
    </div>
    <div class="row">
    
        
        <div class="col-lg-11 col-md-12 ml-auto mr-auto">
           <h4><small style="font-size: 16px">Simple With Actions</small></h4>
          <div class="table-responsive">
              
              <table  class="table table-striped custab table-hover">
                   <thead>
                      <th class="text-center">#</th>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th style="text-align: center;">Quantity Product</th>
                      <th>total price(Vnđ)</th>
                      <th class="col-md-2" style="text-align: center;">Discount Product(%)</th>
                      <th>Price(1/1)(Vnđ)</th>
                      <th class="text-right">Actions</th>
                    <th> </th>
                   </thead>
                <tbody id="productList" >
                </tbody>
          </table>
        </div>
        <div class="row" >
              <div class="col-md-10"></div>
              <div id="total" class="col-md-2"   >
              </div>
        </div>
      </div>
   </div>
   
@stop
@section('js')
  
	<script type="text/javascript">
          var productList = [];
          var productQuantity = [];
          var option =1;
          var indexItem;

		   $('#product-id , #quantity').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            var product_id_str = $('#product-id').val();
            var product_id = product_id_str.toUpperCase();
            var quantity = $('#quantity').val();
            var total = $('#total').val();

            //
        if(keycode == '13'){
             var vnf_regex = /^[A-Z0-9_-]{3,16}$/;
              if (product_id != ''){
                if(vnf_regex.test(product_id) == false){
                   alert(" toi thieu 3 ky tu");
                   return false;
                }
                if(quantity <= 0){
                    alert("number quantity not false!");
                    return false;
                }
              //check dieu kien
              $.get('{{ route('viewAddProduct') }}' ,{
                 "_token": "{{ csrf_token() }}",
                  product_id: product_id
               
              },function(data , status){
                  if (data == '' && data.length == 0) {
                      alert('san pham ko ton tai');
                      return false;
                  }
               
                  if (productList == '' && productList.length == 0) {
                         option = 4;
                   }else{
                  
                        $.each(productList ,function(index, el) {
                            for (var i = 0; i < el.length ; i++){
                              if(el[i].product_id == product_id){
                                  option = 3;
                                  return false;
                                }

                              }
                            option = 2;
                        });
                        // lưa chon option
                        if (option == 2) {
                           console.log(productList);

                          if (data != '' && data.length > 0) {
                             
                              productList.push(data);
                              var  array = [];
                              
                              $.each(data,  function(index, el) {
                                  // them so luong
                                  var price =  el.price ;
                             
                                  var discount =  el.discount_product;
                                  var discount_price = price - (price * (discount/100));

                                  console.log(discount_price);

                                  var totalPirice = Number(discount_price) * Number(quantity) ;
                                 
                                  array = {
                                        product_id: el.product_id,
                                        quantity: Number(quantity),
                                        price: price,
                                        totalPirice: totalPirice,
                                        discount: discount,

                                   };
                                   productQuantity.push(array) ;
                                   console.log(productQuantity);
                                // 
                              
                                var stringprices = formatNumber(el.price);
                                var stringtotalPirices = formatNumber(totalPirice);
                              $('tbody').append('<tr id="item'+el.product_id+'"><td class="indexItem"></td><td>'+ el.product_id +'</td><td>'+ el.product_name +'</td><td><div style="text-align: center" id="pro'+el.product_id+'">'+quantity+'</div><td ><div id="price'+el.product_id+'">'+stringtotalPirices+'</div></td><td><p style="text-align: center">'+
                                el.discount_product +'</p></td><td >'+stringprices+'</td><td class="text-right"><from><input style="display:none" id="'+el.product_id+'" value="'+el.product_id+'" ><button onclick="editProductItem('+el.product_id+')" type="button" style="margin-right: 10px" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span</button><button onclick="deleteProductItem('+el.product_id+')" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></from></td></tr>');


                              });

                              totalQuantityproduct();
                             

                          }else{
                            alert('san pham ko ton tai');
                          }
                        
                          
                        }
                        if(option == 3){
                           option = 2;
                         
                           $.each(productQuantity, function(index, val) {

                                  if(val.product_id == product_id){
                                      console.log(val.product_id);
                                     
                                      val.quantity = Number(val.quantity) + Number(quantity) ;
                                      
                                      
                                      var discount_price = Number(val.price) - (Number(val.price) * (Number(val.discount)/100));

                                      val.totalPirice = Number(discount_price) * Number(val.quantity);

                                      var stringtotalPirice = formatNumber(val.totalPirice);

                                      $('#pro'+product_id+'').text(val.quantity);
                                      $('#price'+product_id+'').text(stringtotalPirice);
                                      console.log(val.quantity);
                                      return false;
                                  }
                           });
                           totalQuantityproduct();
                            
                        }
                 
                  }
                    if (option == 4 ) {
                       productList.push(data);
                       console.log(productList);
                          var  array = [];
                          var totals;
                          var id;
                         $.each(data,  function(index, el) {
                              var id = el.product_id;
                              var price =  el.price ;
                             
                              var discount =  el.discount_product;
                              var discount_price = price - (price * (discount/100));

                              console.log(discount_price);

                              var totalPirice = discount_price * quantity ;
                              totals = totalPirice;
                              var stringTotal = formatNumber(totals) ; 
                              $('#total').html('<span>Total Money </span><span>'+stringTotal+'</span><span> Vnđ</span><input id="totalProducts" name="totalProducts" value="'+totals+'">');
                              console.log(totalPirice);
                              // them so luong
                              array = {
                                        product_id: el.product_id,
                                        quantity: Number(quantity),
                                        price: price,
                                        totalPirice: totalPirice,
                                        discount: discount,
                                      
                                   };
                              productQuantity.push(array) ;
                              console.log(productQuantity);
                              console.log(productList);
                              //
                              var stringprice = formatNumber(el.price);
                              var stringtotalPirice = formatNumber(totalPirice);
                              $('tbody').append('<tr id="item'+el.product_id+'">  <td class="indexItem"></td><td>'+ el.product_id +'</td><td>'+ el.product_name +'</td><td><div style="text-align: center" id="pro'+el.product_id+'">'+quantity+'</div><td ><div id="price'+el.product_id+'">'+stringtotalPirice+'</div></td><td><p style="text-align: center">'+
                                el.discount_product +'</p></td><td >'+stringprice+'</td><td class="text-right"><from><input style="display:none" id="'+el.product_id+'" value="'+el.product_id+'" ><button onclick="editProductItem('+el.product_id+')" type="button" style="margin-right: 10px" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span</button><button onclick="deleteProductItem('+el.product_id+')" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></from></td></tr>');
                                
                          });



                    }
                 
               
              });


          }else{
            alert('You pressed a "enter" key in textbox');
            return false;
         }
           
        }

        });
        function deleteProductItem(id){

          var idProduct = $(id).val(); 
          console.log(idProduct);
          var count = 0;
          var countQuantity = 0;
          $.each(productList ,  function(index, val) {

                for (var i = 0; i < val.length; i++) {
                  console.log(val[i].product_id);
                  if (idProduct == val[i].product_id) {
                      $('#item'+val[i].product_id+'').remove();
                      count++;
                  }
                }
                if(count > 0){
                  productList.splice(index ,1);
                
                  return false;
                }
            
          });
          if (count > 0) {
              $.each(productQuantity ,function(index, el) {
                 if(el.product_id ==  idProduct){
                   countQuantity++;
                 }
                  if (countQuantity > 0) {
                    productQuantity.splice(index ,1);
                    alert('xoa thanh cong');
                    totalQuantityproduct();
                    return false;
                  }
              });
              console.log(productList);
              console.log(productQuantity);

        
          }else{
              alert('xoa that bai');
          }
        }
        function editProductItem(id){
          var idProduct = $(id).val(); 

          $.each(productQuantity,function(index, el) {
            $('#exampleModalCenterProduct').modal({
                  keyboard: false
                 });
              if (el.product_id == idProduct) {
                $('#product_quantity_id').val(el.product_id );
                $('.product-id-label').text(el.product_id);
                $('#qunatityProduct').val(el.quantity);
                return false;
              }
          });
        }
        //luu ket qua
        function severQuantityProduct(){


            var id =    $('#product_quantity_id').val();
            var quantity =    $('#qunatityProduct').val();
            if(quantity <= 0 ){
                alert('so luong ko hop le');
                return false;
            }
            $.each(productQuantity , function(index, el) {
                  if (id == el.product_id) {
                      el.quantity = quantity; 
                      el.totalPirice = el.price * el.quantity;
                      $('#pro'+id+'').text(el.quantity);
                      $('#price'+id+'').text(el.totalPirice);
                      console.log(el.quantity);
                      console.log(el.totalPirice);
                      
                      $('#exampleModalCenterProduct').modal('hide');
                 
                      return false;
                  }
            });
            totalQuantityproduct();


        }
        // tổng tiền tất cac các mặt hàng có trong hóa đờn
        function totalQuantityproduct(){
              var totals = 0;
              for (var i = 0; i < productQuantity.length; i++) {
                  totals +=   Number(productQuantity[i].totalPirice);
              }
          var stringTotal = formatNumber(totals) ;              
          $('#total').html('<span>Total Money </span><span>'+stringTotal+'</span><span> Vnđ</span><input id="totalProducts" name="totalProducts" value="'+totals+'">');
        }
        ////////////////////// PHAN KHACH HANG //////////////////////////////////////
        function summitCustomer(){
          var vnf_regex_number = /((09|03|07|08|05)+([0-9]{8})\b)/g;
          var phonenumber = $('#phone_number').val();

          
           if(phonenumber != ''){
             if (vnf_regex_number.test(phonenumber) == false){
                alert('Số điện thoại của bạn không đúng định dạng!');
                return false;
              }else{
                 //
              }
            }else{
                alert('Bạn chưa điền số điện thoại!');
                 return false;
            }
          
          
          $.post('{{ route('viewOrderPostPhone') }}', {
              "_token": "{{ csrf_token() }}",
      
              phonenumber: phonenumber,
    
        }, function(data) {
            console.log(data);
            if(data != '' && data.length > 0){
              console.log(data);
              var check_id_customer;
              var fullname_Customer;
              $.each(data, function(item, val) {
         
                check_id_customer = $(".customer_id").val(val.customer_id);
                fullname_Customer = val.customer_fullname;

              });

              /////////////////// thuc hien supmit don hang////////////////////////////////

              if(check_id_customer != '' ){
                  if(productQuantity == '' && productQuantity.length == 0){
                      alert('not product!');
                      return false;
                  }
                 var totalProducts = $('#totalProducts').val();
                 var customer_id = $('.customer_id').val();

                var note ;
                if ($.trim($('#OverviewNote').val()) == '') {
                     note =  'nothing';
                }else{
                    note =  $('#OverviewNote').val();
                }
               
                 console.log(note);
                 var checkSupmit = confirm('Thuc Hien supmit Don Hang :' + fullname_Customer +'');
                  if (checkSupmit) {
                      $.post('{{ route('viewOrderPostProduct') }}', {
                          "_token": "{{ csrf_token() }}",
                          totalProducts: totalProducts,
                          customer_id: customer_id,
                          productQuantity: productQuantity,
                          productList: productList,
                          note: note
    
                      },function(data , status){

                          console.log(data);
                          if(data != '' ){
                             
                                $('#exampleModalCenterInOrder').modal({
                                      keyboard: false
                                 });
                                $('#fullnameCustomer').text(fullname_Customer);
                                $('#orderId').val(data);
                                $('#orderIdlabel').text(data);
                          }
                       

                      });

                  }else{
                    //
                  }
              }
              //
            }else{
              if(data == '' && data.length == 0){
                $('#exampleModalCenter').modal({
                  keyboard: false
                 });
              }
              $("#Phone-number-edit").val(phonenumber);
            }
        });

      }

      function addCustomer(){
        var vnf_regex_number = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var fullname = $("#full-Name").val();
        var phonenum = $('#Phone-number-edit').val();

        if (fullname == '') {
           alert("Tên  không được để trống");
           return false;
        }
      
        
        if(phonenum != ''){
             if (vnf_regex_number.test(phonenum) == false){
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
          if(data != '' && data.length > 0 ){
            alert("them khach hang thanh cong");
            $.each(data,function(index, el) {
                 $(".customer_id").val(el.customer_id);
            });
           
            $('#exampleModalCenter').modal('hide');
          }else{
              alert('them khach hang that bai');
          }
           
            

        });

      }
      /////////////////////////deldete///////order/////////////
      function deleteOrder(){

        location.reload();

      }
     /// format nu ber//////////////////
      function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
      }

      function checkOrderNull(){
          if (productQuantity != '' && productQuantity.length > 0) {
              var  checkHome = confirm('Would you like to go back to the homepage? Agree orders will be canceled!');
              if(checkHome){
                 /*  window.location.href = '';*/
              }else{
                //
              }
          } else{
             /*    window.location.href = '';*/
          }
       
      }

      //////////////////////////////////////phan trang//////////////////////////////////////////////
   

	</script>
@stop