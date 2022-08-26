<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{ url('/dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
           
        </p>
      </a>
      
    </li>

    <li class="nav-item">
        <a href="{{ url('/catagories') }}" class="nav-link {{ (request()->is('catagories')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
           Catagories
             
          </p>
        </a>
        
      </li>
      <li class="nav-item">
        <a href="{{ url('/tasks') }}" class="nav-link {{ (request()->is('tasks')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
           Tasks
             
          </p>
        </a>
        
      </li>
  </ul>