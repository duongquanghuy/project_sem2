<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>T1811E Laravel Framework</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
 <style type="text/css">
   body {
    background-color: #f1f1f1;
}
body::-webkit-scrollbar {
    width: 7px;
    background-color: #084951;
}
body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
body::-webkit-scrollbar-thumb {
    background-color: #FFB800;
    outline: 1px solid red;
}

.color-blue{color:#1D92AF}
.color-segreen{color:#3F7577}
.color-orang{color:#CE7B11}

.padding-top > .col-md-6{padding-bottom:15px;}





.wrapper {
    min-height: 2000px;
}
.padding-top {
    padding: 0px;
    padding-top: 15px;
    !important;
}
.no-margin {
    margin: 0px !important;
}
.no-margin {
    margin: 0px !important;
}
/*Top Navbar/////////START///////////*/

.top-bar {
    background-color: #83b762;
    padding: 0px;
    border: solid 0px;
    border-radius: 0px;
    margin-bottom: 0px;
}
.menu-icon {
    float: left;
    height: 50px;
    padding: 10px 15px;
    font-size: 18px;
    font-size: 25px;
    color: #fff;
    cursor: pointer;
}
.navbar-brand {
    float: left;
    height: 50px;
    padding: 8px 15px;
    font-size: 18px;
    line-height: 20px;
}
.top-bar .form-control {
    border-radius: 10px;
    color: #fff;
    background-color: #f1f1f1;
    
}
.top-bar .navbar-form {
    padding: 0px 15px;
    margin-top: 8px;
    margin-right: -15px;
    margin-bottom: 8px;
    margin-left: -15px;
    border-top: 0px solid transparent;
    border-bottom: 0px solid transparent;
    box-shadow: none;
}
.navbar-nav {
    text-align: center;
}
.top-bar .btn-default {
    border-color: #fff;
    color: #fff;
    background-color: #83b762;
    border-radius: 0px;
}
.top-bar .badge {
    display: inline-block;
    min-width: 10px;
    position: absolute;
    top: 9px;
    padding: 2px 5px;
    font-size: 12px;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #FF5722;
    border-radius: 10px;
}
.top-bar .user-profile {
    height: 30px;
    width: 30px;
    border-radius: 100%;
    display: block;
    padding: 11px 0px;
}
.top-bar .user-profile img {
    border-radius: 100px;
}
.navbar-inverse .navbar-nav > li > a {
    color: #fff;
}
@media (max-width: 768px) {
    .nav > li {
        position: relative;
        display: inline-block;
    }
}
/*************begin SIDE NAV *************/


.left-sidebar {
    position: fixed;
    left: 0px;
    top:50px;
    width: 240px;
    height: 100%;
    overflow: hidden;
    -moz-box-shadow: 1px 4px 5px 4px rgba(0,
    0,
    0,
    0.3);
    -webkit-box-shadow: 1px 4px 5px 4px rgba(0,
    0,
    0,
    0.3);
    box-shadow: 1px 4px 5px 4px rgba(0,
    0,
    0,
    0.3);
    overflow-y: scroll;
    transition: 0.5s;
    z-index: 99;
}
.hide-sidebar {
    position: fixed;
    left: -250px;
    top: 50px;
    width: 240px;
    height: 100%;
    overflow: hidden;
    -moz-box-shadow: 1px 4px 5px 4px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 1px 4px 5px 4px rgba(0, 0, 0, 0.3);
    box-shadow: 1px 4px 5px 4px rgba(0, 0, 0, 0.3);
    overflow-y: scroll;
    z-index:99;
}
.left-sidebar::-webkit-scrollbar {
    width: 6px;
    background-color: #ECECEC;
}
.left-sidebar::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
.left-sidebar::-webkit-scrollbar-thumb {
    background-color: #084951;
    outline: 1px solid black;
}
.left-sidebar .side-nav {
    margin: 0px;
    padding: 0px;
}
.left-sidebar .side-nav li {
    width: 100%;
    list-style-type: none;
    padding: 0px;
}
.left-sidebar .side-nav li a {
    display: block;
    padding: 15px;
    text-decoration: none;
}
.panel {
    margin-bottom: 0px;
    background-color: #ECECEC;
    border-top: 1px solid #777;
    border-radius: 0px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}
.panel a {
    color: #000;
}
.panel a:hover {
    background-color: #f3f3f3;
}





/*right-container*****************/
@media (min-width: 768px) {

.left-container{width:18%;float: left;transition:0.5s;}
.right-container{width:82%;float:right;transition:0.5s;margin-top: 70px;}
.less-width{width:0%;transition:0.5s;}
.full-width{width:100%;transition:0.5s;}
} 
.mini-stat h5{
    float: left;
    margin: 0;
    text-align: left;
    font-size: 0.85em;
    color: #888888;
}
.mini-stat li{
    border-left: 1px solid #ddd;   
    padding-left: 10px;
    padding-right: 10px;} 

.mini-stat>li:first-child {
    border-left: none;
}

.mini-stat h5 .stat-value{display:block;font-size:18px;margin-top:4px;}

.right-container .breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color:transparent;
    border-radius: 4px;
}

.main-header {
    margin-bottom: 30px;
}

.main-header h2 {
    display: inline-block;
    vertical-align: middle;
    border-right: 1px solid #ccc;
    margin: 0;
    padding-right: 10px;
    margin-right: 10px;
}

.main-header em {
    color: #bbbbbb;
}

 </style>

<body>
  <!--=============================
                                             NAVIGATION
                                   =============================-->
  <!--top nav start=======-->
  <nav class="navbar navbar-inverse top-bar navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> <span class="menu-icon" id="menu-icon"><i class="fa fa-times" aria-hidden="true" id="chang-menu-icon"></i></span>
        <a class="navbar-brand" href="#"><img src="https://lh3.googleusercontent.com/-N4NB2F966TU/WM7V1KYusRI/AAAAAAAADtA/fPvGVNzOkCo7ZMqLI6pPITE9ZF7NONmawCJoC/w185-h40-p-rw/logo.png" > </a>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="myNavbar" >
          
          <ul class="nav navbar-nav">
              <li style="text-align: right; ">
                <a class="li-a-img" href="#"><img src="http://timvieclamsieuthi.com/upload/images/big-c-tuyen-dung-nhan-su-thang-5.jpg "  width="30px" height="30px" 
                  style="border-radius: 50% ; margin-top: -9px;"> </a>
              </li>
              <li class=""><a href="#"><i class="fa fa-refresh"></i> Start Tour</a> </li>
              <li class=""><a href="#"><i class="fa fa-volume-up"></i></a> </li>
              <li class=""><a href="#"><i class="fa fa-envelope"></i> <span class="badge">5</span></a> </li>
              <li class=""><a href="#"><i class="fa fa-bell"></i> <span class="badge">9</span></a> </li>
              <li class="">
      
          </li>
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sumit          
           <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
              <li> <a href="#"><i class="fa fa-cog"></i> Setting</a> </li>
              <li> <a href="#"><i class="fa fa-power-off"></i> Logout</a> </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--    top nav end===========-->
  <div class="wrapper" id="wrapper">
    <div class="left-container" id="left-container">

      <!-- begin SIDE NAV USER PANEL -->
      <div class="left-sidebar" id="show-nav">
        <ul id="side" class="side-nav">
            <li class="panel">
            <a id="panel1" href="javascript:;" data-toggle="collapse" data-target="#charts"> 
              <i class="fa fa-dashboard"></i> Dashboard
              <i class="fa fa-chevron-left pull-right" id="arow1"></i> </a>
            <ul class="collapse nav" id="charts">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel2" href="javascript:;" data-toggle="collapse" data-target="#charts"> 
              <i class="fa fa-bar-chart-o"></i> Charts
              <i class="fa fa-chevron-left pull-right" id="arow2"></i> </a>
            <ul class="collapse nav" id="charts">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel3" href="javascript:;" data-toggle="collapse" data-target="#calendar"> 
              <i class="fa fa-calendar"></i> calendar
              <span class="label label-danger">new event</span> 
              <i class="fa fa-chevron-left pull-right" id="arow3"></i> </a>
            <ul class="collapse nav" id="calendar">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel4" href="javascript:;" data-toggle="collapse" data-target="#clipboard"> <i class="fa fa-clipboard"></i> clipboard
              <i class="fa fa fa-chevron-left pull-right" id="arow4"></i> </a>
            <ul class="collapse nav" id="clipboard">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel5" href="javascript:;" data-toggle="collapse" data-target="#edit"> <i class="fa fa-edit"></i> edit
              <i class="fa fa fa-chevron-left pull-right" id="arow5"></i>
            </a>
            <ul class="collapse nav" id="edit">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel6" href="javascript:;" data-toggle="collapse" data-target="#inbox"> <i class="fa fa-inbox"></i> inbox
              <span class="label label-primary">new msz</span> <i class="fa fa fa-chevron-left pull-right" id="arow6"></i> </a>
            <ul class="collapse nav" id="inbox">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
            <a id="panel7" href="javascript:;" data-toggle="collapse" data-target="#cogs"> <i class="fa fa-cogs"></i> cogs
              <span class="label label-warning">Warning</span> <i class="fa fa fa-chevron-left pull-right" id="arow7"></i> </a>
            <ul class="collapse nav" id="cogs">
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
              <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
            </ul>
          </li>
          <li class="panel">
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
          </li>
        </ul>
      </div>
      <!-- END SIDE NAV USER PANEL -->
    </div>
    <div class="right-container" id="right-container">
          @yield('container-fluid')
      
    </div>
  </div>
  @yield('js')


   
  <script type="text/javascript">
    $(document).ready(function() {
      $("#panel1").click(function() {
        $("#arow1").toggleClass("fa-chevron-left");
        $("#arow1").toggleClass("fa-chevron-down");
      

      });
        
      $("#panel2").click(function() {
        $("#arow2").toggleClass("fa-chevron-left");
        $("#arow2").toggleClass("fa-chevron-down");
      });
        
      $("#panel3").click(function() {
        $("#arow3").toggleClass("fa-chevron-left");
        $("#arow3").toggleClass("fa-chevron-down");
      });
        
      $("#panel4").click(function() {
        $("#arow4").toggleClass("fa-chevron-left");
          $("#arow4").toggleClass("fa-chevron-down");
      });
        
      $("#panel5").click(function() {
        $("#arow5").toggleClass("fa-chevron-left");
        $("#arow5").toggleClass("fa-chevron-down");
      });
        
      $("#panel6").click(function() {
        $("#arow6").toggleClass("fa-chevron-left");
        $("#arow6").toggleClass("fa-chevron-down");
      });
        
      $("#panel7").click(function() {
        $("#arow7").toggleClass("fa-chevron-left");
        $("#arow7").toggleClass("fa-chevron-down");
      });
        
      $("#panel8").click(function() {
        $("#arow8").toggleClass("fa-chevron-left");
        $("#arow8").toggleClass("fa-chevron-down");
      });
        
      $("#panel9").click(function() {
        $("#arow9").toggleClass("fa-chevron-left");
        $("#arow9").toggleClass("fa-chevron-down");
      });
        
      $("#panel10").click(function() {
        $("#arow10").toggleClass("fa-chevron-left");
        $("#arow10").toggleClass("fa-chevron-down");
      });
        
      $("#panel11").click(function() {
        $("#arow11").toggleClass("fa-chevron-left");
        $("#arow11").toggleClass("fa-chevron-down");
      });
        
      $("#menu-icon").click(function() {
        $("#chang-menu-icon").toggleClass("fa-bars");
        $("#chang-menu-icon").toggleClass("fa-times");
        $("#show-nav").toggleClass("hide-sidebar");
        $("#show-nav").toggleClass("left-sidebar");
          
        $("#left-container").toggleClass("less-width");
        $("#right-container").toggleClass("full-width");
      });
        
     
        
    });
  </script>
</body>

</html>