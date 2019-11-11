@if(Auth::check())
  <li><a href={{ route('handler-logout')}}>Logout</a></li>
  @if(isset($user))
    {{$user->name}}
  @endif
@endif 
