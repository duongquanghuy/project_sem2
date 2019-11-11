<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
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
  <div>
  <h2>Login Form</h2>
  
  <form method="post" action=" {{ route('handler-login') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <label for="email"><b>Email</b></label>
     <input id="email" type="text" placeholder="Enter email" name="email" required>
     @if($errors->get('email'))
        <div class="alert alert-danger">
          @foreach($errors->get('email') as $err)
            <li> {{$err}} </li>
          @endforeach
        </div>
      @endif

     <label for="password"><b>Password</b></label>
     <input id="password" type="password" placeholder="Enter Password" name="password" required>
      @if($errors->get('password'))
        <div class="alert alert-danger">
          @foreach($errors->get('password') as $err)
            <li> {{$err}} </li>
          @endforeach
        </div>
      @endif
     <button type="submit">Login</button>
     @if(session('status'))
        <div class="alert alert-danger">
            {{session('status')}}
        </div>
      @endif
     <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</div>
</body>
</html>
