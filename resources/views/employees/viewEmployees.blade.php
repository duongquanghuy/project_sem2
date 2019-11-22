@extends('layouts.headerMenu')
@section('css')
    <style type="text/css">
        .has-search{
            max-width: 40%;
        }
        .inputNumber{
            text-align: right;
            background-color: tomato;
        }
        .container -> .inputNumber{
            text-align: right;
        }
        #edit-employee-modal{
            margin-top: 10%;
        }
        #add-employee-modal{
            margin-top: 10%;
        }
        .modal-body {
            height: 200px;
            margin: 0 auto;
        }
        .input-group{
            margin: 0 auto;
        }
        .center-element{
            text-align: center;
        }
    </style>
@stop

@section('sideber-menu')
    <div class="left-sidebar" id="show-nav">
        @include('layouts.menu')
    </div>
@stop

@section('container-fluid')

<!-- Modal Edit Employee-->
<div class="modal fade" id="edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="edit-employee-modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle"><strong>Edit Employee</strong></h3>
            </div>

      <!-- phan sua thong tin -->
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="empFullName">*Full Name:</label>  
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input id="emp-full-name" name="empFullName" type="text" value="" placeholder="Please fill full name here" class="form-control input-md">
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 control-label" for="empBirthDay">*Birthday:</label>  
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input id="emp-birth-day" name="empBirthDay" type="text" value="" placeholder="Please fill birth day here" class="form-control input-md">
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 control-label" for="empPhoneNumber">*Phone Number:</label>  
                    <div class="col-md-12">
                        <div class="input-group othertop">
                            <div class="input-group-addon">
                                <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>
                            </div>
                            <input id="emp-phone-number" name="empPhoneNumber" type="number" value="" placeholder="Please fill phone number here" class="form-control input-md">
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 control-label" for="empAddress">*Address:</label>  
                    <div class="col-md-12">
                        <div class="input-group othertop">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card fa-1x" style="font-size: 20px;"></i>
                            </div>
                            <input id="emp-address" name="empAddress" type="text" value="" placeholder="Please fill address here" class="form-control input-md">
                        </div>
                    </div>
                </div>
            </div>
      <!-- het sua thong tin -->
            <div class="modal-footer">
                <br>
                <br>
                <br>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button onclick="checkEmployeeUpdatingValidation()" type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Employee -->
<div class="modal fade" id="add-employee-modal" tabindex="-2" role="dialog" aria-labelledby="add-employee-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: auto">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle"><strong>Add Employee</strong></h3>
            </div>

      <!-- Add Employee Area -->
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="empFullNameAdd">*Full Name:</label>  
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input id="emp-full-name-add" name="empFullNameAdd" type="text" value="" placeholder="Please fill full name here" class="form-control input-md">
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 control-label" for="empBirthDayAdd">*Birthday:</label>  
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input id="emp-birth-day-add" name="empBirthDayAdd" type="text" value="" placeholder="Please fill birth day here" class="form-control input-md">
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 control-label" for="empPhoneNumberAdd">*Phone Number:</label>  
                    <div class="col-md-12">
                        <div class="input-group othertop">
                            <div class="input-group-addon">
                                <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>
                            </div>
                            <input id="emp-phone-number-add" name="empPhoneNumberAdd" type="number" value="" placeholder="Please fill phone number here" class="form-control input-md">
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 control-label" for="empAddressAdd">*Address:</label>  
                    <div class="col-md-12">
                        <div class="input-group othertop">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card fa-1x" style="font-size: 20px;"></i>
                            </div>
                            <input id="emp-address-add" name="empAddressAdd" type="text" value="" placeholder="Please fill address here" class="form-control input-md">
                        </div>
                    </div>
                </div>
            </div>
      <!-- het sua thong tin -->
            <div class="modal-footer">
                <br>
                <br>
                <br>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button onclick="checkEmployeeAddingValidation()" type="button" class="btn btn-primary">Add Employee</button>
            </div>
        </div>
    </div>
</div>

<!-- phan homeword -->
<div class="row">
    <div class="col-md-4">
        <ul class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#"> Home</a></li>
            <li class="active"><a href="{{ route('viewEmployees') }}">Employees</a></li>
        </ul>
    </div>
    <div class="col-md-8">
        <ul class="list-inline pull-right mini-stat">
            <li>
                <h5>EMPLOYEES <span class="stat-value color-orang"><i class="fa fa-plus-circle"></i>{{ $employeesListCount }}</span></h5>
            </li>
        </ul>
    </div>
</div>
<!-- het phan homeword -->

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3"></div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <div class="form-group has-feedback">
                <label for="empNameSearch" class="sr-only">*Search: </label>
                <input type="text" class="form-control" name="empNameSearch" id="emp-name-search" placeholder="Enter employee's name here">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-success" data-target="#add-employee-modal" data-toggle="modal">ADD EMPLOYEE</button>
    <div class="row">
        <div class="col-md-12">
            <h4></h4>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>Birth Day</th>
                        <th>Phone Number</th>
                        <th>E-Mail</th>
                        <th>Username</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Join Time</th>
                        <th>Retired Time</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                        @foreach($employeesList as $item)
                            <tr>
                                <td class="center-element">{{ $item->id }}</td>
                                <th>{{ $item->name }}</th>
                                <td>{{ $item->birth_day }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->address }}</td>
                                <td class="center-element">{{ $item->level }}</td>
                                <td>{{ $item->join_time }}</td>
                                <td>{{ $item->retired_time }}</td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button onclick="editEmployeeById({{ $item->id }})" class="btn btn-primary btn-xs" data-target="#edit-employee-modal" data-toggle="modal" type="button">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $employeesList->links() }}
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
    <script type="text/javascript">

        /*ADD EMPLOYEE*/
        function checkEmployeeAddingValidation(){
            var empFullNameAdd = $('#emp-full-name-add').val();
            var empBirthDayAdd = $('#emp-birth-day-add').val();
            var empPhoneNumberAdd = $('#emp-phone-number-add').val();
            var empAddressAdd = $('#emp-address-add').val();

            if (empFullNameAdd == ''){
                alert("Fullname cannot be null!");
                return false;
            }
            
            var phoneNumberRegex = /^[0-9]+$/;
            if (empPhoneNumberAdd != ''){
                if(phoneNumberRegex.exec(empPhoneNumberAdd) == false || empPhoneNumberAdd.length > 13){
                    alert('Wrong Phone Number Format!');
                    return false;
                }
            }

            var birthDayRegex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
            if (empBirthDayAdd != ''){
                if(birthDayRegex.exec(empBirthDayAdd) == false){
                    alert('Wrong Date Time Format!');
                    return false;
                }
            }

            $.get('{{ route('addEmployee') }}', {
                "_token": "{{ csrf_token() }}",
                empFullNameAdd: empFullNameAdd,
                empBirthDayAdd: empBirthDayAdd,
                empPhoneNumberAdd: empPhoneNumberAdd,
                empAddressAdd: empAddressAdd,
            }, function(data, status) {
                alert(data);
                location.reload();
            });
        }
        /*ADD EMPLOYEE - END*/


        /*EDIT & UPDATE EMPLOYEE*/
        function checkEmployeeUpdatingValidation(){
            var empFullName = $("#emp-full-name").val();
            var empBirthDay = $("#emp-birth-day").val();
            var empPhoneNumber = $("#emp-phone-number").val();
            var empAddress = $("#emp-address").val();
            var empRollNo = $("#emp-roll-no").html();

            if (empFullName == ''){
                alert("Fullname cannot be null!");
                return false;
            }
            
            var phoneNumberRegex = /^[0-9]+$/;
            if (empPhoneNumber != ''){
                if(phoneNumberRegex.exec(empPhoneNumber) == false || empPhoneNumber.length > 13){
                    alert('Wrong Phone Number Format!');
                    return false;
                }
            }

            var birthDayRegex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
            if (empBirthDay != ''){
                if(birthDayRegex.exec(empBirthDay) == false){
                    alert('Wrong Date Time Format!');
                    return false;
                }
            }

            $.post('{{ route('updateEmployee') }}', {
                "_token": "{{ csrf_token() }}",
                empRollNo: empRollNo,
                empFullName: empFullName,
                empBirthDay: empBirthDay,
                empPhoneNumber: empPhoneNumber,
                empAddress: empAddress,
            }, function(data, status) {
                alert(data);
                location.reload();
            });
        }

        function editEmployeeById(id){
            $.post('{{ route('editEmployee') }}', {
                "_token": "{{ csrf_token() }}",
                id: id
            },function(data){
                $.each(data, function(item, val) {
                    $("#emp-full-name").val(val.name);
                    $("#emp-birth-day").val(val.birth_day);
                    $("#emp-phone-number").val(val.phone_number);
                    $("#emp-address").val(val.address);
                    $("#emp-roll-no").html(val.id);
                });
            });
        }
        /*EDIT & UPDATE EMPLOYEE - END*/



        /*SEARCH EMPLOYEE*/
        function searchEmployee(stringSearch){
            $.post('{{ route('searchEmployee') }}' ,{
                "_token": "{{ csrf_token() }}",
                stringSearch: stringSearch,
            }, function(data){

            });
        }

        $('#emp-name-search').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            var searchString = $('#emp-name-search').val();
            
            if(keycode == '13'){
                if (searchString == '') {
                    alert('You need fill the Search textbox to searching!');
                } else {
                    searchEmployee(searchString);
                }
            }
        });
        /*SEARCH EMPLOYEE - END*/
    </script>
@stop