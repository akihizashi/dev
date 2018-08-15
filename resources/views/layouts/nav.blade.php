<nav class="navbar navbar-light background-light">
  <div class="container w-75">
    <a href="/tasks" class="navbar-brand">
      {{--<img src="{{ URL::asset('/images/teamlab.png') }}" width="60" height="60" alt="">--}}
      Task Manager
    </a>
    <form method="get" action="/search" class="form-inline my-2 my-lg-3 mr-auto">
      {{ csrf_field() }}
      <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="Search for something" required>
      <button class="btn btn-light" type="submit"><i class="fas fa-search py-1"></i></button>
    </form>
    @if (Auth::check())
      <div class="form-inline ml-auto">Hi <a class="px-2"href="">{{ Auth::user()->name }}</a>
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    @endif
  </div>
</nav>
