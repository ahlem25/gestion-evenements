<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

@role('Admin')
<li class="nav-item">
    <a href="{{ route('events.index') }}" class="nav-link {{ Request::is('events*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-minus"></i>
        <p>Events</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('registrations.index') }}" class="nav-link {{ Request::is('registrations*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Registrations</p>
    </a>
</li>
@endrole

@role('User')
<li class="nav-item">
    <a href="{{ route('events.index') }}" class="nav-link {{ Request::is('events*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-minus"></i>
        <p>Subscribe To Events</p>
    </a>
</li>
@endrole
