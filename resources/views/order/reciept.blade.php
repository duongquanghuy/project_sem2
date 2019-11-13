<?php
    $order_id;
    $em_roll_no_order;
    $created_at;
    $discount_nullable;
    $total_money;
    $customer_fullname;
    $customer_phone;
    foreach ($order as $item) {
        $order_id = $item->order_id;
        $em_roll_no_order = $item->em_roll_no_order;
        $created_at = $item->created_at;
        $discount_nullable = $item->discount_nullable;
        $total_money = $item->total_money;
        $customer_fullname = $item->customer_fullname;
        $customer_phone = $item->customer_phone;
    }

    $total_money_order =( int)$total_money -  ((int)$total_money * ((int)$discount_nullable / 100));
    $total_money_order_format = number_format($total_money_order);

?>

<!DOCTYPE html>
<html>
<head>
	<title>reciep</title>
	  	<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
			@import "compass/css3";

.image {
  width: 250px;
  float: left;
  margin: 20px;
}
body {
  font-size: small;
  line-height: 1.4;
}
p {
  margin: 0;
}

.performance-facts {
  border: 1px solid black;
  margin: 20px;
  float: left;
  width: 300px;
  padding: 0.5rem;
  table {
    border-collapse: collapse;
  }
}
.performance-facts__title {
  font-weight: bold;
  font-size: 2rem;
  margin: 0 0 0.25rem 0;
}
.performance-facts__header {
  border-bottom: 10px solid black;
  padding: 0 0 0.25rem 0;
  margin: 0 0 0.5rem 0;
  p {
    margin: 0;
  }
}
.performance-facts__table {
  width: 100%;
  thead tr {
    th, td {
      border: 0;
    }
  }
  th, td {
    font-weight: normal;
    text-align: left;
    padding: 0.25rem 0;
    border-top: 1px solid black; 
    white-space: nowrap;
  }
  td {
    &:last-child {
      text-align: right;
    }
  }
  .blank-cell {
    width: 1rem;
    border-top: 0;
  }
  .thick-row {
    th, td {
      border-top-width: 5px;
    }
  }
}
.small-info {
  font-size: 0.8rem;
}

.performance-facts__table--small {
  @extend .performance-facts__table;
  border-bottom: 1px solid #999;
  margin: 0 0 0.5rem 0;
  thead {
    tr {
      border-bottom: 1px solid black; 
    }
  }
  td {
    &:last-child {
      text-align: left;
    }
  }
  th, td {
    border: 0;
    padding: 0;
  }
}

.performance-facts__table--grid {
  @extend .performance-facts__table;
  margin: 0 0 0.5rem 0;
  td {
    &:last-child {
      text-align: left;
      &::before {
        content: "•";
        font-weight: bold;
        margin: 0 0.25rem 0 0;
      }
    }
  }
}

.text-center {
  text-align: center;
}

.thin-end {
  font-size: 14px;
  border-bottom: 1px solid #999;
}
.tdCenter{
  text-align: center;
}
</style>
<body onload="myFunction()" >


<section class="performance-facts">
  <header class="performance-facts__header">
    <h1 class="performance-facts__title text-center" >Big C</h1>
    <h1 class="performance-facts__title text-center" >Supermarket</h1>
    <p style="text-align: center;">Order ID : <?php echo ''.$order_id.'' ?> </p>
    <p>Employee ID : <?php echo ''.$em_roll_no_order.'' ?></p>
    <p>Bill of sale</p>
    <p>Adress : Ha noi</p>
    <p>Phone e: #########</p>

  </header>
  <table class="performance-facts__table" style="min-height: 100px;">
    <thead style="border-bottom: 0.5px solid #999">
      <tr> 
        <th class="small-info"> # </th>
        <th class="small-info"> Product Name</th>
        <th class="small-info"> Unit price(đ)</th>
        <th  class="small-info tdCenter"> Quantity </th>
        <th class="small-info tdCenter"> Total amount(đ) </th>

      </tr>
    </thead>
    <tbody style="border-bottom: 1rem solid #333333 ">
        @foreach($orderList as $item)
          <tr style="border-bottom: 0.5px solid #999">
            <td style="font-size: 8px">{{ $index++ }}</td>
            <td style="max-width: 85px;  word-wrap: break-word; " ><p >{{ $item->product_name }}</p></td>
            <td>{{ number_format($item->price) }}</td>
            <td class="tdCenter">{{ $item->quantity_product }}</td>
            <td class="tdCenter">{{ number_format($item->totalPirice) }}</td>

           </tr>

        @endforeach
      
      
     
    </tbody>
  </table>
  
  <table class="performance-facts__table--grid">
    <tbody>
      <tr>
        <td colspan="2" style="margin-left: 5px ; font-weight: bold;"><p> Cus Name: </p></td>
        <td>
          <?php echo ''.$customer_fullname.'' ?>
        </td>
      </tr>
      <tr class="thin-end">
        <td colspan="2" style="margin-left: 5px ; font-weight: bold;"><p> Cus phone: </p></td>
        <td>
          <?php echo ''.$customer_phone.'' ?>
        </td>
      </tr>
      
    </tbody>
  </table>
  <div class="tdCenter">
      <p style="font-weight: bold;">Total money </p>
      <p style="font-weight: bold;"><?php echo ''.$total_money_order_format.'' ?> (đ)</p>

  </div>
  
  
  <p class="small-info tdCenter" >
      date of creation
  </p>
  <p class="small-info text-center">
      <?php echo ''.$created_at.'' ?>
  </p>
  
</section>


</body>

</html>

<script type="text/javascript">
        
    
    function myFunction() {
        
           window.print(); 

         

         
          window.onbeforeprint = function() {
                console.log('This will be called before the user prints.');
            };
          window.onafterprint = function() {
               window.location.href = '{{ route('viewAddOrders') }}'; 
          };
        
    }   
    
</script>
