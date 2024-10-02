<div class="sidebar" id="sidebar">
    <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
        <i class="fa fa-home" aria-hidden="true"></i> Dashboard
    </a>
    <a href="{{ route('manage-user') }}" class="{{ Request::routeIs('manage-user') ? 'active' : '' }}">
        <i class="fa fa-user" aria-hidden="true"></i> Manajemen User
    </a>
    <a href="{{ route('manage-product') }}" class="{{ Request::routeIs('manage-product') ? 'active' : '' }}">
        <i class="fa fa-book" aria-hidden="true"></i> Manajemen Produk
    </a>
</div>
