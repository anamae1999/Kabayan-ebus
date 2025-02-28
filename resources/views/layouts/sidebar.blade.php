<div class="sidebar-wrapper">
  @if (Auth::user()->role =='Admin' || Auth::user()->role =='Super Admin')
    <ul class="nav">
      <li class="nav-item ">
        <a class="nav-link" href="./list">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item ">
      <a class="nav-link" href="{{route('operator.index')}}">
          <i class="material-icons">content_paste</i>
          <p>operators List</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('bus.index')}}">
          <i class="material-icons">library_books</i>
          <p>Buses List</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./passenger">
          <i class="material-icons">bubble_chart</i>
          <p>Passenger List</p>
        </a>
      </li>
     </ul>
 @endif
  @if (Auth::user()->role =='Dispatcher'   )
    <ul class="nav">
      <li class="nav-item ">
        <a class="nav-link" href="./list">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item ">
      <a class="nav-link" href="{{route('operator.index')}}">
          <i class="material-icons">content_paste</i>
          <p>operators List</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('bus.index')}}">
          <i class="material-icons">library_books</i>
          <p>Buses List</p>
        </a>
      </li>
     </ul>
 @endif
 @if (Auth::user()->role =='Super Admin' )
    <ul class="nav">
      <li class="nav-item ">
        <a class="nav-link" href="./terminal">
          <i class="material-icons">location_ons</i>
          <p>Terminal List</p>
        </a>
      </li>

    </ul>
  @endif
  @if (Auth::user()->role =='Driver' || Auth::user()->role =='Conductor' )
  <ul class="nav">
     <li class="nav-item ">
        <a class="nav-link" href="./driver">
          <i class="material-icons">location_ons</i>
          <p>Assignment</p>
        </a>
      </li>
  </ul>
  @endif
  
  </div>