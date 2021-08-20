<h2>Welcome, {{ Auth::user()->name }}!</h2>
<br>
<a href="{{ route('admin.main') }}">Admin</a>
<br>
<a href="{{ route('logout') }}">Exit</a>
