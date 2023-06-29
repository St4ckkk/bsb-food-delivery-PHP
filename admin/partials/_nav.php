<link href='https://unpkg.com/css.gg@2.0.0/icons/css/shopping-cart.css' rel='stylesheet'>
<style>
  .nav__logo-icon,
  .nav__icon {
    color: #c9d1d9;
  }

  .nav__logo-name,
  .nav__name {
    color: #c9d1d9;
  }

  .nav__link {
    color: #c9d1d9;
    transition: background-color 0.3s;
  }

  .nav__link:hover,
  .nav__link.active {
    background-color: #2f363d;
  }

  .nav__link:hover .nav__icon,
  .nav__link.active .nav__icon {
    color: #fff;
  }

  .nav__link:hover .nav__name,
  .nav__link.active .nav__name {
    color: #fff;
  }

  .l-navbar {
    width: 70px;
    left: 0px;
    background-color: #24292e;
    transition: left 0.5s;
  }

  .nav {
    left: 0;
    transition: left 0.5s;
  }

  .nav.active {
    width: 280px;
    left: 0px;
    background-color: #24292e;
    transition: left 0.5s;

  }

  .l-navbar.active {
    width: 280px;
    top: 0;
    left: 0px;
    background-color: #24292e;
    transition: left 0.5s;

  }

  .header {
    background-color: transparent;
    transition: left 0.5s;
  }

  .header.active {
    left: 200px;
  }

  .header__toggle {
    color: #24292e;
  }

  @media (max-width: 768px) {
    .header {
      width: 100%;
      background-color: white;
      transition: 0.5s ease;
      left: 80px;
    }

    .header.active {
      left: 280px;
    }
  }
</style>

<header class="header" id="header">
  <div class="header__toggle">
    <i class='bx bx-menu' id="header-toggle"></i>
  </div>
</header>

<div class="l-navbar" id="nav-bar">
  <nav class="nav" id="nav">
    <div>
      <a href="index.php" class="nav__logo">
        <i class='bx bx-layer nav__logo-icon'></i>
        <span class="nav__logo-name ">Bing's Scoops & Bites</span>
      </a>

      <div class="nav__list">
        <a href="index.php" class="nav__link nav-home">
          <i class='bx bx-grid-alt nav__icon'></i>
          <span class="nav__name">Home</span>
        </a>
        <a href="index.php?page=orderManage" class="nav__link nav-orderManage">
          <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
          <span class="nav__name">Orders</span>
        </a>
        <a href="index.php?page=categoryManage" class="nav__link nav-categoryManage">
          <i class='bx bx-folder nav__icon'></i>
          <span class="nav__name">Category List</span>
        </a>
        <a href="index.php?page=menuManage" class="nav__link nav-menuManage">
          <i class='bx bx-message-square-detail nav__icon'></i>
          <span class="nav__name">Menu</span>
        </a>
        <a href="index.php?page=contactManage" class="nav__link nav-contactManage">
          <i class="fas fa-hands-helping"></i>
          <span class="nav__name">Contact Info</span>
        </a>
        <a href="index.php?page=userManage" class="nav__link nav-userManage">
          <i class='bx bx-user nav__icon'></i>
          <span class="nav__name">Users</span>
        </a>
        <a href="index.php?page=siteManage" class="nav__link nav-siteManage">
          <i class="fas fa-cogs"></i>
          <span class="nav__name">Site Settings</span>
        </a>
      </div>
    </div>
    <a href="partials/_logout.php" class="nav__link">
      <i class='bx bx-log-out nav__icon'></i>
      <span class="nav__name">Log Out</span>
    </a>
  </nav>
</div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
  <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
  $('.nav-<?php echo $page; ?>').addClass('active');

  $(document).ready(function() {
    $('#header-toggle').click(function() {
      $('#nav').toggleClass('active');
      $('#nav-bar').toggleClass('active');
      $('.header__toggle').toggleClass('active');
      $('header.header').toggleClass('active');
    });
  });
</script>