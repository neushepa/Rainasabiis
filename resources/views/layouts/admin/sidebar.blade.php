<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/" target="_blank"><img src="/assets/beka/img/logo.png.png" alt="Sahabat BK" height="100%"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FFSK</a>
        </div>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="/dashboard" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Dashboard
            </a>
            <ul class="sidebar-menu">
                <li><a class="nav-link" href="/todo"><i class="fas fa-calendar"></i> <span>To Do</span></a></li>
                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'mentor')
                <li class="dropdown active">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-edit"></i> <span>Artikel</span></a>
                    <ul class="dropdown-menu" style="display: none;">
                        <li class="active"><a class="nav-link" href="/post">Posting</a></li>
                        <li class="active"><a class="nav-link" href="{{ route('category.index') }}">Kategori</a></li>
                    </ul>
                <li><a class="nav-link" href="{{ route('gallery.index') }}"><i class="fas fa-image"></i> <span>Galeri</span></a></li>
                </li>
                @endif
                <li><a class="nav-link" href="{{ route('testimoni.index') }}"><i class="fas fa-image"></i> <span>Testimoni</span></a></li>

                <li>
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'mentor')
                <li class="dropdown active">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Pengguna</span></a>
                    @endif
                    <ul class="dropdown-menu" style="display: none;">
                        @if(Auth::user()->role == 'admin')
                        <li class="active"><a class="nav-link" href="{{ route('mentor.index') }}">Mentor</a></li>
                        @endif
                        @if(Auth::user()->role == 'mentor')
                        <li class="active"><a class="nav-link" href="/admin/user/student">Siswa</a></li>
                        @endif
                    </ul>
                </li>
                </li>
                <li>
                <li class="dropdown active">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-comment-dots"></i> <span>Konsultasi</span></a>
                    <ul class="dropdown-menu" style="display: none;">
                        <li class="active"><a class="nav-link" href="/admin/consult-session">Kelola Jadwal</a></li>
                    </ul>
                </li>
                </li>
                <li>
                <li class="dropdown active">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
                    <ul class="dropdown-menu" style="display: none;">
                        <li class="active"><a class="nav-link" href="{{ route('profile.edit', Auth::user()->id) }}">Kelola Profile</a></li>
                        <li class="active"><a class="nav-link" href="#">Backup</a></li>
                        <li class="active"><a class="nav-link" href="#">Import</a></li>
                        <li class="active"><a class="nav-link" href="#">Ganti Password</a></li>
                    </ul>
                </li>
                </li>
                <li><a class="nav-link" href="/credit"><i class="fas fa-fire"></i> <span>Credits</span></a></li>
            </ul>
    </aside>
</div>
