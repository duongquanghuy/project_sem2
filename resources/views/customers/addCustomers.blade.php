@extends('layouts.headerMenu')

@section('container-fluid')

	<div class="row">
    <form>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Name (Full name)">Phone number (Full name)</label>  
          <div class="col-md-4">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user"></i>
               </div>
               <input id="phone_number (Full name)" name="phone_num" type="text" placeholder="Name (Full name)" class="form-control input-md">
            </div>
          </div>
      </div>
      <button class="btn" type="submit">submit</button>
    </form>
  </div>

@stop
@section('js')