<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
        <i class="fas fa-envelope me-2"></i> Quản lý liên hệ
    </a>
</li> 