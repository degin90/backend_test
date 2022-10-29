 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <a href="#" class="brand-link">
         <span class="brand-text font-weight-light">BACKEND</span>
     </a>
     <div class="sidebar">
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item {{ request()->is('*panel/user*') ? 'menu-is-opening menu-open' : '' }}">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-user"></i>
                         <p>
                             Users
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('user.add') }}" class="nav-link {{ request()->is('*panel/user/add') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add New</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('user.show') }}" class="nav-link {{ request()->is('*panel/user/show') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Show All</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item {{ request()->is('*panel/student*') ? 'menu-is-opening menu-open' : '' }}">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Student {{ request()->is('')}}
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item ">
                             <a href="{{ route('student.add') }}" class="nav-link {{ request()->is('*panel/student/add') ? 'active':'';}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add New </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('student.show') }}" class="nav-link {{ request()->is('*panel/student/show') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Show All</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('logout')}}" class="nav-link">
                         <i class="nav-icon fas fa-power-off"></i>
                         <p> Logout</p>
                     </a>
                 </li>
             </ul>
         </nav>
     </div>
 </aside>
