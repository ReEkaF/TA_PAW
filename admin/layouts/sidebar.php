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
      <li class="sidebar__menu-item">
        <a href="./products.php" class="sidebar__menu-link <?= $page === 'products' ? 'sidebar__menu-link_active' : ''; ?>">
          <i class="ph ph-package"></i>
          Products
        </a>
      </li>
      <li class="sidebar__menu-item">
        <a href="./categories.php" class="sidebar__menu-link <?= $page === 'categories' ? 'sidebar__menu-link_active' : ''; ?>">
          <i class="ph ph-tag"></i>
          Categories
        </a>
      </li>
      <li class="sidebar__menu-item">
        <a href="./suppliers.php" class="sidebar__menu-link <?= $page === 'suppliers' ? 'sidebar__menu-link_active' : ''; ?>">
          <i class="ph ph-truck"></i>
          Suppliers
        </a>
      </li>
      <li class="sidebar__menu-item">
        <a href="./customers.php" class="sidebar__menu-link <?= $page === 'customers' ? 'sidebar__menu-link_active' : ''; ?>">
          <i class="ph ph-users"></i>
          Customers
        </a>
      </li>
      <li class="sidebar__menu-item">
        <a href="./referral-codes.php" class="sidebar__menu-link <?= $page === 'referral-codes' ? 'sidebar__menu-link_active' : ''; ?>">
          <i class="ph ph-barcode"></i>
          Referral Codes
        </a>
      </li>
    </ul>
    <a href="./unpaid-transactions.php" class="sidebar__cta">
      View unpaid transactions
      <i class="ph ph-arrow-right"></i>
    </a>
  </nav>
</div>
<!-- end sidebar -->