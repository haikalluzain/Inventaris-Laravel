@php
$route = Route::currentRouteName();
@endphp

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="dashboard-ecommerce.html">Inventaris</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="dashboard-ecommerce.html">IV</a>
    </div>
      <ul class="sidebar-menu">
        @if($level == 'admin')
            <li class="menu-header">Dashboard</li>
            <li class="{{ ($route == 'home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Content</li>
            {{-- Employee --}}
            <li class="{{ ($route == 'employee.index' || $route == 'employee.create' || $route == 'employee.edit') ? 'active' : '' }}"><a class="nav-link" href="{{ route('employee.index') }}"><i class="fas fa-user-tie"></i> <span>Employee</span></a></li>

            {{-- Room --}}
            <li class="{{ ($route == 'room.index' || $route == 'room.create' || $route == 'room.edit') ? 'active' : '' }}"><a class="nav-link" href="{{ route('room.index') }}"><i class="fas fa-door-open"></i> <span>Room</span></a></li>

            {{-- Type --}}
            <li class="{{ ($route == 'type.index' || $route == 'type.edit' || $route == 'type.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('type.index') }}"><i class="fas fa-th-large"></i> <span>Type</span></a></li>

            {{-- Item --}}
            <li class="{{ ($route == 'item.index' || $route == 'item.create' || $route == 'item.edit' || $route == 'item.show' || $route == 'item.supply') ? 'active' : '' }}"><a class="nav-link" href="{{ route('item.index') }}"><i class="fas fa-archive"></i> <span>Item</span></a></li>

            {{-- Supply --}}
            {{-- <li class="{{ ($route == 'supply.index' || $route == 'supply.create' || $route == 'supply.edit') ? 'active' : '' }}"><a class="nav-link" href="{{ route('supply.index') }}"><i class="fas fa-truck-loading"></i> <span>Supply</span></a></li> --}}

            {{-- Borrow --}}
            <li class="{{ ($route == 'borrow.index' || $route == 'borrow.create' || $route == 'borrow.edit' || $route == 'borrow.show' || $route == 'borrow.detail' || $route == 'borrow_detail.show') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('borrow.index') }}"><i class="fas fa-dolly"></i> <span>Borrow</span></a></li>

            {{-- Maintenance --}}
            <li class="{{ ($route == 'maintenance.index' || $route == 'maintenance.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('maintenance.index') }}"><i class="fas fa-hand-holding-heart"></i> <span>Maintenance</span></a></li>

            {{-- Report --}}
            <li class="{{ ($route == 'report' || $route == 'report.room' || $route == 'report.type' || $route == 'report.period') ? 'active' : '' }}"><a class="nav-link" href="{{ route('report') }}"><i class="far fa-file-alt"></i> <span>Report</span></a></li>

        @elseif($emp)
            <li class="menu-header">Employee</li>
            <li class="{{ ($route == 'emp.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('emp.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            {{-- Borrow --}}
            <li class="{{ ($route == 'borrow.index' || $route == 'borrow.create' || $route == 'borrow.edit' || $route == 'borrow.show' || $route == 'borrow_detail.show') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('borrow.index') }}"><i class="fas fa-dolly"></i> <span>Borrow</span></a></li>
        
        @elseif($level == 'operator')
            <li class="menu-header">Operator</li>
            <li class="{{ ($route == 'home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

            {{-- Borrow --}}
            <li class="{{ ($route == 'borrow.index' || $route == 'borrow.create' || $route == 'borrow.edit' || $route == 'borrow.show' || $route == 'loan_detail.show') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('borrow.index') }}"><i class="fas fa-dolly"></i> <span>Borrow</span></a></li>

        @elseif($level == 'maintainer')
            <li class="menu-header">Maintainer</li>
            <li class="{{ ($route == 'home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

            <li class="{{ ($route == 'maintenance.index' || $route == 'maintenance.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('maintenance.index') }}"><i class="fas fa-hand-holding-heart"></i> <span>Maintenance</span></a></li>
        @endif
      </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="#" class="btn bg-white btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Contact Developer
      </a>
    </div>        
  </aside>
</div>