  <ul id="side" class="side-nav">
            <li class="panel">
              <a href="{{route('product-manage')}}" id="panel1" href="javascript:;" data-toggle="collapse" data-target="#charts"> 
                <i class="fa fa-dashboard"></i> Product
                {{-- <i class="fa fa-chevron-left pull-right" id="arow1"></i>  --}}
              </a>
          </li>
             <li class="panel">
            <a id="panel2" href="javascript:;" data-toggle="collapse" data-target="#calendar"> 
              <i class="glyphicon glyphicon-sort-by-order"></i> Order Management
              <i class="fa fa-chevron-left pull-right" id="arow2"></i> </a>
            <ul class="collapse nav" id="calendar">
              <li> <a href="{{ route('viewAddOrders') }}"><i class="fa fa-angle-double-right"></i> Create an Order</a> </li>
              <li> <a href="{{ route('displayOrder') }}"><i class="fa fa-angle-double-right"></i> Search orders</a> </li>
            </ul>
          </li>          
  
          <li class="panel">
            <a href="{{route('employee-manage')}}" id="panel4" href="javascript:;" data-toggle="collapse" data-target="#clipboard"> <i class="fa fa-clipboard"></i> Employee
              
          </a>
        </li>
          <li class="panel">
            <a id="panel5" href="javascript:;" data-toggle="collapse" data-target="#edit"> <i class="fa fa-user"></i> Customer
              <i class="fa fa fa-chevron-left pull-right" id="arow5"></i>
            </a>
            <ul class="collapse nav" id="edit">
              <li> 
                <a href="{{ route('displayCus') }}"><i class="fa fa-angle-double-right"></i> List Customer </a>
              </li>
             
            </ul>
          </li>

          <li class="panel">
            <a id="panel6" href="javascript:;" data-toggle="collapse" data-target="#inbox"> <i class="fa fa-inbox"></i> Sales
              <span class="label label-primary"></span> <i class="fa fa fa-chevron-left pull-right" id="arow6"></i> </a>
            <ul class="collapse nav" id="inbox">
              <li> <a href="{{route('sales-manage')}}"><i class="fa fa-angle-double-right"></i>Sales Employee</a> </li>
              <li> <a href="{{route('sale-of-company')}}"><i class="fa fa-angle-double-right"></i>Sales Company</a> </li>
            </ul>
          </li>

          {{-- <li class="panel">
            <a id="panel8" href="javascript:;" data-toggle="collapse" data-target="#paper"> <i class="fa fa-paper-plane"></i> paper
              <i class="fa fa fa-chevron-left pull-right" id="arow8"></i> </a>
            <ul class="collapse nav" id="paper">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel9" href="javascript:;" data-toggle="collapse" data-target="#trash"> <i class="fa fa-trash"></i> Trash
              <i class="fa fa fa-chevron-left pull-right" id="arow9"></i>
            </a>
            <ul class="collapse nav" id="trash">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel10" href="javascript:;" data-toggle="collapse" data-target="#btc">
              <i class="fa fa-btc"></i> paper
              <i class="fa fa fa-chevron-left pull-right" id="arow10"></i>
            </a>
            <ul class="collapse nav" id="btc">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel11" href="javascript:;" data-toggle="collapse" data-target="#pie-Chart">
              <i class="fa fa-bar-chart"></i> Chart
              <span class="label label-success">Supper</span> <i class="fa fa fa-chevron-left pull-right" id="arow11"></i> </a>
            <ul class="collapse nav" id="pie-Chart">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li> --}}
          <li class="panel">
            <a href="{{route('handler-register')}}" id="panel11" href="javascript:;" data-toggle="collapse" data-target="#pie-Chart">
              <i class="fa fa-bar-chart"></i> Add Employee
              </a>
          </li>
        </ul>