 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      @php
        $permissionUser = App\Models\PermissionRole::getPermission('User',Auth::user()->role_id);
        $permissionRole = App\Models\PermissionRole::getPermission('Role',Auth::user()->role_id);
        $permissionBlogs = App\Models\PermissionRole::getPermission('Blogs',Auth::user()->role_id);
        $permissionTestimonials = App\Models\PermissionRole::getPermission('Testimonials',Auth::user()->role_id);
        $permissionEvents = App\Models\PermissionRole::getPermission('Events',Auth::user()->role_id);
        $permissionForms_For_Donations = App\Models\PermissionRole::getPermission('Forms For Donations',Auth::user()->role_id);
         $permissionDonations = App\Models\PermissionRole::getPermission('Donations',Auth::user()->role_id);
        $permissionSettings = App\Models\PermissionRole::getPermission('Settings',Auth::user()->role_id);
      @endphp


      <li class="nav-item">
        <a class="nav-link " href="{{route('panel.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @if (!empty($permissionUser))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('roleslist')}}">
          <i class="bi bi-person"></i>
          <span>Role</span>
        </a>
      </li>
      @endif
     

      @if (!empty($permissionRole))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('userslist')}}">
          <i class="bi bi-person"></i>
          <span>User</span>
        </a>
      </li>
      @endif

      @if (!empty($permissionBlogs))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('editblog')}}">
          <i class="bi bi-person"></i>
          <span>Blogs</span>
        </a>
      </li>
      @endif
        @if (!empty($permissionTestimonials))
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('testimonial_edit')}}">
            <i class="bi bi-person"></i>
            <span>Testimonials</span>
          </a>
        </li>
        @endif

      @if (!empty($permissionEvents))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('editevent')}}">
          <i class="bi bi-person"></i>
          <span>Events</span>
        </a>
      </li>
      @endif
        @if (!empty( $permissionForms_For_Donations))
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('donation.form')}}">
            <i class="bi bi-person"></i>
            <span>Forms For Donations</span>
          </a>
        </li>
        @endif

      @if (!empty($permissionDonations))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('donations.index')}}">
          <i class="bi bi-person"></i>
          <span>Donations</span>
        </a>
      </li>
      @endif

      @if (!empty($permissionSettings))
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Settings</span>
        </a>
      </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->