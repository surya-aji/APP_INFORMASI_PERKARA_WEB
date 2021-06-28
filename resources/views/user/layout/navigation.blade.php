<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="<?=url("user/{$data->perkara_id}")?>">
                    <div>
                        <img src="{{asset('public/images/logo.png')}}" alt="element 04" width=30">
                    </div>
                    <h2 class="brand-text white mb-0">S I P P</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                    <li class="{{ Request::segment(3) === 'dataumum' ? 'active' : null }}">
                        <a href="<?=url("user/{$data->perkara_id}/dataumum")?>"><i class="feather icon-users"></i><span class="menu-item" data-i18n="eCommerce">Data Umum</span></a>
                    </li>
                    <li class="{{ Request::segment(3) === 'penetapan' ? 'active' : null }}">
                        <a href="<?=url("user/{$data->perkara_id}/penetapan")?>"><i class="feather icon-feather"></i><span class="menu-item" data-i18n="eCommerce">Penetapan</span></a>
                    </li>
                    <li class="{{ Request::segment(3) === 'jadwal' ? 'active' : null }}">
                        <a href="<?=url("user/{$data->perkara_id}/jadwal")?>"><i class="feather icon-calendar"></i><span class="menu-item" data-i18n="eCommerce">Jadwal Sidang</span></a>
                    </li>
                    <li class="{{ Request::segment(3) === 'putusan' ? 'active' : null }}">
                        <a href="<?=url("user/{$data->perkara_id}/putusan")?>"><i class="feather icon-check-square"></i><span class="menu-item" data-i18n="eCommerce">Putusan Akhir</span></a>
                    </li>
                    <li class="{{ Request::segment(3) === 'biaya' ? 'active' : null }}">
                        <a href="<?=url("user/{$data->perkara_id}/biaya")?>"><i class="feather icon-credit-card"></i><span class="menu-item" data-i18n="eCommerce">Biaya Perkara</span></a>
                    </li>
                </ul>
            </li>
            
            {{-- <li class="nav-item">
                <a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">User</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="app-user-list.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">List</span></a>
                    </li>
                    <li>
                        <a href="app-user-view.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">View</span></a>
                    </li>
                    <li>
                        <a href="app-user-edit.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Edit</span></a>
                    </li>
                </ul>
            </li>
            --}}
    </div>
</div>

<script>
    

</script>