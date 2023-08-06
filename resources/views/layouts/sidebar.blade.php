<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> <div id="pcoded" class="pcoded">
    <nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
    <div class="navbar-logo">
    <a href="index-2.html">
    <img class="img-fluid" src="{{asset('files/assets/images/logo.png')}}" alt="Theme-Logo" />
    </a>
    </div>
    <div class="pcoded-main-container">
    <div class="pcoded-wrapper">
    
    <nav class="pcoded-navbar">
    <div class="nav-list">
    <div class="pcoded-inner-navbar main-menu">
    <div class="pcoded-navigation-label">Navigation</div>
    <ul class="pcoded-item pcoded-left-item">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}" data-toggle="collapse" data-target="#masterUsersCollapse" aria-expanded="true" aria-controls="masterUsersCollapse">
                <i class="fas fa-users fa-fw"></i>
                <span>Master Users</span>
            </a>
            <div id="masterUsersCollapse" class="collapse{{ Request::is('admin/role', 'admin/user') ? ' show' : '' }}" aria-labelledby="headingMasterUsers" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('role.index') }}">Role</a>
                </div>
            </div>
            <div id="masterUsersCollapse" class="collapse{{ Request::is('admin/role', 'admin/user') ? ' show' : '' }}" aria-labelledby="headingMasterUsers" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('user.index') }}">User</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('admin/menu*') ? ' active' : '' }}" href="#" data-toggle="collapse" data-target="#masterMenuCollapse" aria-expanded="false" aria-controls="masterMenuCollapse">
                <i class="fas fa-bars fa-fw"></i>
                <span>Master Menu</span>
            </a>
            <div id="masterMenuCollapse" class="collapse" aria-labelledby="headingMasterMenu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="dropdown-item{{ Request::routeIs('menu.index') ? ' active' : '' }}" href="{{ route('menu.index') }}">Menu</a>
                </div>
            </div>
        </li>
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
      <!-- Tempat form akan ditampilkan -->
      <div id="menuFormDiv" class="mt-3"></div>
      <script>
          function showMenuForm(menu) {
              var formDiv = document.getElementById('menuFormDiv');
              formDiv.innerHTML = ''; // Kosongkan konten form sebelum menampilkan form baru
      
              if (menu === 'subMenu') {
                  // Buat form untuk sub menu
                  var form = document.createElement('form');
                  // Atur action dan method form sesuai kebutuhan Anda
                  form.action = '{{ route("menu.store") }}'; // Ganti route dengan yang sesuai
                  form.method = 'POST'; // Ganti method dengan yang sesuai
      
                  // Tambahkan input, label, atau elemen form lainnya sesuai kebutuhan Anda
                  // Contoh: Input untuk nama submenu
                  var submenuNameInput = document.createElement('input');
                  submenuNameInput.type = 'text';
                  submenuNameInput.name = 'submenu_name';
                  // ...
                  // Tambahkan elemen lainnya sesuai kebutuhan Anda
      
                  // Tambahkan tombol Submit untuk mengirim form
                  var submitButton = document.createElement('button');
                  submitButton.type = 'submit';
                  submitButton.textContent = 'Submit'; // Ganti teks tombol dengan yang sesuai
      
                  // Tambahkan elemen-elemen ke dalam form
                  form.appendChild(submenuNameInput);
                  // ...
                  form.appendChild(submitButton);
      
                  formDiv.appendChild(form);
              } else {
                  formDiv.style.display = 'none'; // Sembunyikan form jika tidak ada menu yang dipilih
              }
          }
          
          
      </script>