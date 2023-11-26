<!-- sidebar -->
<div class="sidebar">
  <div class="sidebar__header">
    <a href="./index.php" class="sidebar__brand"><img src="../assets/img/logo.png" alt="FloraFavs" /></a>
  </div>
  <nav class="sidebar__body">
    <ul class="sidebar__menu-list">
      <li class="sidebar__menu-item">
        <a href="./index.php" class="sidebar__menu-link <?= $page === 'home' ? 'sidebar__menu-link_active' : ''; ?>">
          <i class="ph ph-house"></i>
          Home
        </a>
      </li>
      <li class="sidebar__menu-item">
        <a href="./unpaid-transactions.php" class="sidebar__menu-link <?= $page === 'unpaid-transactions' ? 'sidebar__menu-link_active' : ''; ?>">
          <i class="ph ph-fire"></i>
          Unpaid Transactions
        </a>
      </li>
      <li class="sidebar__menu-item">
        <a href="./paid-transactions.php" class="sidebar__menu-link <?= $page === 'paid-transactions' ? 'sidebar__menu-link_active' : ''; ?>">
          <i class="ph ph-receipt"></i>
          Paid Transactions
        </a>
      </li>
    </ul>
  </nav>
</div>
<!-- end sidebar -->