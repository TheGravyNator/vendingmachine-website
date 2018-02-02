<div class='topnav'>
  <a href='/' class={{ Request::is('/') ? 'active' : ''}}>Home</a>
  <a href='/order' class={{ Request::is('order') ? 'active' : ''}}>Bestel</a>
  <a href='/expenses' class={{ Request::is('expenses') ? 'active' : ''}}>Mijn Uitgaven</a>
  <a href='/all-expenses' class={{ Request::is('all-expenses') ? 'active' : ''}}>Alle Uitgaven</a>
  @if (Auth::check())
    @if (Auth::user()->admin == 1)
      <a href='/admin/admin' class={{ Request::is('admin/admin') || Request::is('admin/admin-overview') || Request::is('admin/admin-rights') || Request::is('admin/admin-price') || Request::is('admin/admin-sodatype') ? 'active' : ''}}>Admin Panel</a>
    @endif
  @endif


  <div class='user'>
          @guest
              <a href="{{ route('login') }}" class={{ Request::is('login') ? 'active' : ''}}>Login</a>
              <a href="{{ route('register') }}" class={{ Request::is('register') ? 'active' : ''}}>Register</a>
          @else
            <div class="dropdown show">
              <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
              </div>
            </div>

          @endguest
  </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
