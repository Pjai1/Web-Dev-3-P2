@if (Auth::guest())
       
@else
<div class="admin-nav">
    <a href="/admin/dashboard">Dashboard</a>
    <a href="{{url('/logout')}}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
@endif