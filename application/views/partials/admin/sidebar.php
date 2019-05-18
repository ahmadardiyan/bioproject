<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-user-md"></i>
    </div>
    <div class="sidebar-brand-text mx-3">BIO <sup>PROJECT</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Administrator
  </div>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
      <i class="fas fa-fw fa-chart-line"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Nav Item - Homepage Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHomepage" aria-expanded="true" aria-controls="collapseHomepage">
      <i class="fas fa-fw fa-users"></i>
      <span>Homepage</span>
    </a>
    <div id="collapseHomepage" class="collapse" aria-labelledby="headingMember" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Homepage:</h6>
        <a class="collapse-item" href="<?= base_url('admin/services'); ?>">Service</a>
        <a class="collapse-item" href="<?= base_url('admin/portofolio'); ?>">Portofolio</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    User
  </div>

  <!-- Nav Item - My Profile -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= base_url('user/index') ?>" data-toggle="collapse" data-target="#collapseMyProfile" aria-expanded="true" aria-controls="collapseMyProfile">
      <i class="fas fa-fw fa-user-alt"></i>
      <span>My Profile</span></a>
      <div id="collapseMyProfile" class="collapse" aria-labelledby="headingMyProfile" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Profile:</h6>
          <a class="collapse-item" href="<?= base_url('user/edit_profile'); ?>">Edit My Profile</a>
        </div>
      </div>
  </li>

  <!-- Nav Item - Project -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/project'); ?>">
      <i class="fas fa-chalkboard-teacher"></i>
      <span>Project</span></a>
  </li>

  <!-- Nav Item - Member Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMember" aria-expanded="true" aria-controls="collapseMember">
      <i class="fas fa-fw fa-users"></i>
      <span>Member</span>
    </a>
    <div id="collapseMember" class="collapse" aria-labelledby="headingMember" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Member:</h6>
        <a class="collapse-item" href="<?= base_url('admin/members'); ?>">Data Member</a>
        <a class="collapse-item" href="<?= base_url('admin/portofolios'); ?>">Portofolio</a>
        <a class="collapse-item" href="<?= base_url('admin/pendidikan'); ?>">Pendidikan</a>
        <a class="collapse-item" href="<?= base_url('admin/sertifikat'); ?>">Sertifikat</a>
        <a class="collapse-item" href="<?= base_url('admin/pengalaman_kerja'); ?>">Pengalaman Kerja</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Company -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/companies'); ?>">
      <i class="fas fa-city"></i>
      <span>Company</span></a>
  </li>

  <!-- Nav Item - Skills Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSkills" aria-expanded="true" aria-controls="collapseSkills">
      <i class="fas fa-fw fa-code"></i>
      <span>Skills</span>
    </a>
    <div id="collapseSkills" class="collapse" aria-labelledby="headingSkills" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Skills:</h6>
        <a class="collapse-item" href="<?= base_url('category'); ?>">Skills Category</a>
        <a class="collapse-item" href="<?= base_url('user/skills'); ?>">List of Skills</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Logout -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
