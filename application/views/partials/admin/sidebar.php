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
      <i class="fas fa-fw fa-home"></i>
      <span>Homepage</span>
    </a>
    <div id="collapseHomepage" class="collapse" aria-labelledby="headingMember" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Homepage:</h6>
        <a class="collapse-item" href="<?= base_url('admin/services'); ?>"><i class="fas fa-fw fa-hands"></i> Service</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    User
  </div>

  <!-- Nav Item - Project Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProject" aria-expanded="true" aria-controls="collapseProject">
      <i class="fas fa-fw fa-chalkboard-teacher"></i>
      <span>Project</span>
    </a>
    <div id="collapseProject" class="collapse" aria-labelledby="headingProject" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Project:</h6>
        <a class="collapse-item" href="<?= base_url('admin/projects'); ?>"><i class="fas fa-fw fa-project-diagram"></i> Data Project</a>
        <a class="collapse-item" href="<?= base_url('admin/list_projects'); ?>"><i class="fas fa-fw fa-tasks"></i> List of Project</a>
      </div>
    </div>
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
        <a class="collapse-item" href="<?= base_url('admin/members'); ?>"><i class="fas fa-fw fa-user-circle"></i> Data Member</a>
        <a class="collapse-item" href="<?= base_url('admin/portofolios'); ?>"><i class="fas fa-fw fa-file-invoice"></i> Portofolio</a>
        <a class="collapse-item" href="<?= base_url('admin/educations'); ?>"><i class="fas fa-fw fa-graduation-cap"></i> Pendidikan</a>
        <a class="collapse-item" href="<?= base_url('admin/certificates'); ?>"><i class="fas fa-fw fa-certificate"></i> Sertifikat</a>
        <a class="collapse-item" href="<?= base_url('admin/pengalaman_kerjas'); ?>"><i class="fas fa-fw fa-briefcase"></i> Pengalaman Kerja</a>
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
        <a class="collapse-item" href="<?= base_url('admin/categories'); ?>"><i class="fas fa-fw fa-scroll"></i> Skills Category</a>
        <a class="collapse-item" href="<?= base_url('admin/skills'); ?>"><i class="fas fa-fw fa-dice-six"></i> List of Skills</a>
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
