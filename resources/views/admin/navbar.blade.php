<li class="nav-item @yield('nav_return')">
    <a class="nav-link" href="{{ route('return.cloths.page') }}">物品歸還</a>
</li>
<li>
    <a class="nav-link" href="{{ route('system.index') }}">系統設定</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        清單列表
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('report.total') }}">總表清單</a>
        <a class="dropdown-item" href="{{ route('report.not_return') }}">未歸還清單</a>
    </div>
</li>
