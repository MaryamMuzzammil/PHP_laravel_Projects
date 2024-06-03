 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      {{-- @php
        $permissionUser = App\Models\PermissionRole::getPermission('User',Auth::user()->role_id);
        $permissionRole = App\Models\PermissionRole::getPermission('Role',Auth::user()->role_id);
        // $permissionCategory = App\Models\PermissionRole::getPermission('Category',Auth::user()->role_id);
        // $permissionSubCategory = App\Models\PermissionRole::getPermission('Sub Category',Auth::user()->role_id);
        // $permissionProduct = App\Models\PermissionRole::getPermission('Product',Auth::user()->role_id);
        // $permissionSetting = App\Models\PermissionRole::getPermission('Setting',Auth::user()->role_id);
      @endphp --}}
      <li class="nav-item">
        <a class="nav-link " href="{{route('panel.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      {{-- @if (!empty($permissionUser)) --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="/panel/user">
          <i class="bi bi-person"></i>
          <span>User</span>
        </a>
      </li>
      {{-- @endif --}}
     

      {{-- @if (!empty($permissionRole)) --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="/panel/role">
          <i class="bi bi-person"></i>
          <span>Role</span>
        </a>
      </li>
      {{-- @endif --}}

      {{-- @if (!empty($permissionCategory)) --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('editblog')}}">
          <i class="bi bi-person"></i>
          <span>Blogs</span>
        </a>
      </li>
      {{-- @endif --}}
        {{-- @if (!empty($permissionCategory)) --}}
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('testimonial_edit')}}">
            <i class="bi bi-person"></i>
            <span>Testimonials</span>
          </a>
        </li>
        {{-- @endif --}}

      {{-- @if (!empty($permissionSubCategory)) --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('editevent')}}">
          <i class="bi bi-person"></i>
          <span>Events</span>
        </a>
      </li>
      {{-- @endif --}}
        {{-- @if (!empty($permissionSubCategory)) --}}
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('donation.form')}}">
            <i class="bi bi-person"></i>
            <span>Forms For Donations</span>
          </a>
        </li>
        {{-- @endif --}}

      {{-- @if (!empty($permissionProduct)) --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('donations.index')}}">
          <i class="bi bi-person"></i>
          <span>Donations</span>
        </a>
      </li>
      {{-- @endif --}}

      {{-- @if (!empty($permissionSetting)) --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Settings</span>
        </a>
      </li>
      {{-- @endif --}}

    </ul>

  </aside><!-- End Sidebar-->