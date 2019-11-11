<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}

    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
       display: block;
       float: none;
      }
     .cancelbtn {
       width: 100%;
      }
    }
 </style>

 <script type="text/javascript">

 </script>

</head>
<body>
  <h2>Register</h2>
  
  <form method="post" action=" {{ route('handler-register') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <label for="email"><b>Email</b></label>
     <input id="email" type="text" placeholder="Enter email" name="email" required oninvalid="this.setCustomValidity('Please enter your email here')">
     @if($errors->get('email'))
        <div class="alert alert-danger">
          @foreach($errors->get('email') as $err)
            <li> {{$err}} </li>
          @endforeach
        </div>
      @endif

     <label for="password"><b>Password</b></label>
     <input id="password" type="password" placeholder="Enter Password" name="password" required oninvalid="this.setCustomValidity('Please enter your password here')">
      @if($errors->get('password'))
        <div class="alert alert-danger">
          @foreach($errors->get('password') as $err)
            <li> {{$err}} </li>
          @endforeach
        </div>
      @endif

      <label for="passwordAgain"><b>Confirm Password</b></label>
     <input id="passwordAgain" type="password" placeholder="Enter Password again" name="passwordAgain" required oninvalid="this.setCustomValidity('Please enter your password here')">
      @if($errors->get('passwordAgain'))
        <div class="alert alert-danger">
          @foreach($errors->get('passwordAgain') as $err)
            <li> {{$err}} </li>
          @endforeach
        </div>
      @endif

      <label for="name"><b>Name</b></label>
     <input id="name" type="text" placeholder="Enter your name" name="name" required oninvalid="this.setCustomValidity('Please enter your name here')">
      @if($errors->get('name'))
        <div class="alert alert-danger">
          @foreach($errors->get('name') as $err)
            <li> {{$err}} </li>
          @endforeach
        </div>
        @endif
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect">Position</label>
        </div>
        <select required class="custom-select" id="inputGroupSelect" name="level">
          <option selected>Select position</option>
          <option value="1">Manager</option>
          <option value="2">Leader</option>
          <option value="3">Employee</option>
        </select>
        @if($errors->get('level'))
        <div class="alert alert-danger">
          @foreach($errors->get('level') as $err)
            <li> {{$err}} </li>
          @endforeach
        </div>
        @endif
     <button type="submit">Register</button>
     @if(session('status'))
        <div class="alert alert-danger">
            {{session('status')}}
        </div>
      @endif

  </div>

</form>

</body>
</html>
