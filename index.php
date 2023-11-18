<?php

require_once('layouts/header.php');

?>

<!-- content -->
<main>
  <form action="./index.php" method="get" class="filter container">
    <div class="filter__search">
      <label for="search">
        <i class="ph ph-magnifying-glass"></i>
      </label>
      <input type="search" name="search" id="search" placeholder="Search for plants" />
      <button type="submit">Search</button>
    </div>
    <div class="filter__list">
      <div class="filter__item">
        <label for="category">
          <i class="ph ph-tag"></i>
        </label>
        <select name="category" id="category">
          <option value="" selected>All categories</option>
          <option value="category-1">Category 1</option>
          <option value="category-2">Category 2</option>
          <option value="category-3">Category 3</option>
        </select>
      </div>
      <div class="filter__item">
        <label for="sort">
          <i class="ph ph-funnel-simple"></i>
        </label>
        <select name="sort_by" id="sort_by">
          <option value="" selected>Default sort</option>
          <option value="sort_by-1">Sort by 1</option>
          <option value="sort_by-2">Sort by 2</option>
          <option value="sort_by-3">Sort by 3</option>
        </select>
      </div>
    </div>
  </form>
  <div class="products container">
    <div class="products__body">
      <div class="products__card">
        <div class="products__card-top">
          <img src="./assets/img/plants/plant-1.png" alt="" class="products__card-img" />
        </div>
        <div class="products__card-body">
          <p class="products__card-price">Rp77.000</p>
          <h3 class="products__card-name">Nama Produk</h3>
          <p class="products__card-info">
            <i class="ph ph-tag"></i>
            Category 1
            <i class="ph ph-package"></i>
            25 stock
          </p>
          <hr />
          <div class="products__card-actions">
            <a href="./index.php" class="products__card-action-button">
              <i class="ph ph-plus-circle"></i>
              Add to Cart
            </a>
            <a href="./cart.php" class="products__card-action-button products__card-action-button_primary">
              <i class="ph ph-shopping-cart-simple"></i>
              Buy Now
            </a>
          </div>
        </div>
      </div>
      <div class="products__card">
        <div class="products__card-top">
          <img src="./assets/img/plants/plant-2.png" alt="" class="products__card-img" />
        </div>
        <div class="products__card-body">
          <p class="products__card-price">Rp65.000</p>
          <h3 class="products__card-name">Pahlawan Futsal</h3>
          <p class="products__card-info">
            <i class="ph ph-tag"></i>
            Category 1
            <i class="ph ph-package"></i>
            25 stock
          </p>
          <hr />
          <div class="products__card-actions">
            <a href="./index.php" class="products__card-action-button">
              <i class="ph ph-plus-circle"></i>
              Add to Cart
            </a>
            <a href="./cart.php" class="products__card-action-button products__card-action-button_primary">
              <i class="ph ph-shopping-cart-simple"></i>
              Buy Now
            </a>
          </div>
        </div>
      </div>
      <div class="products__card">
        <div class="products__card-top">
          <img src="./assets/img/plants/plant-3.png" alt="" class="products__card-img" />
        </div>
        <div class="products__card-body">
          <p class="products__card-price">Rp70.000</p>
          <h3 class="products__card-name">Tenis Indoor 01</h3>
          <p class="products__card-info">
            <i class="ph ph-tag"></i>
            Category 1
            <i class="ph ph-package"></i>
            25 stock
          </p>
          <hr />
          <div class="products__card-actions">
            <a href="./index.php" class="products__card-action-button">
              <i class="ph ph-plus-circle"></i>
              Add to Cart
            </a>
            <a href="./cart.php" class="products__card-action-button products__card-action-button_primary">
              <i class="ph ph-shopping-cart-simple"></i>
              Buy Now
            </a>
          </div>
        </div>
      </div>
      <div class="products__card">
        <div class="products__card-top">
          <img src="./assets/img/plants/plant-4.png" alt="" class="products__card-img" />
        </div>
        <div class="products__card-body">
          <p class="products__card-price">Rp87.000</p>
          <h3 class="products__card-name">Badminton Indoor 01</h3>
          <p class="products__card-info">
            <i class="ph ph-tag"></i>
            Category 1
            <i class="ph ph-package"></i>
            25 stock
          </p>
          <hr />
          <div class="products__card-actions">
            <a href="./index.php" class="products__card-action-button">
              <i class="ph ph-plus-circle"></i>
              Add to Cart
            </a>
            <a href="./cart.php" class="products__card-action-button products__card-action-button_primary">
              <i class="ph ph-shopping-cart-simple"></i>
              Buy Now
            </a>
          </div>
        </div>
      </div>
      <div class="products__card">
        <div class="products__card-top">
          <img src="./assets/img/plants/plant-5.png" alt="" class="products__card-img" />
        </div>
        <div class="products__card-body">
          <p class="products__card-price">Rp90.000</p>
          <h3 class="products__card-name">Tenis Indoor 03</h3>
          <p class="products__card-info">
            <i class="ph ph-tag"></i>
            Category 1
            <i class="ph ph-package"></i>
            25 stock
          </p>
          <hr />
          <div class="products__card-actions">
            <a href="./index.php" class="products__card-action-button">
              <i class="ph ph-plus-circle"></i>
              Add to Cart
            </a>
            <a href="./cart.php" class="products__card-action-button products__card-action-button_primary">
              <i class="ph ph-shopping-cart-simple"></i>
              Buy Now
            </a>
          </div>
        </div>
      </div>
      <div class="products__card">
        <div class="products__card-top">
          <img src="./assets/img/plants/plant-6.png" alt="" class="products__card-img" />
        </div>
        <div class="products__card-body">
          <p class="products__card-price">Rp82.000</p>
          <h3 class="products__card-name">Sila Futsal Timur</h3>
          <p class="products__card-info">
            <i class="ph ph-tag"></i>
            Category 1
            <i class="ph ph-package"></i>
            25 stock
          </p>
          <hr />
          <div class="products__card-actions">
            <a href="./index.php" class="products__card-action-button">
              <i class="ph ph-plus-circle"></i>
              Add to Cart
            </a>
            <a href="./cart.php" class="products__card-action-button products__card-action-button_primary">
              <i class="ph ph-shopping-cart-simple"></i>
              Buy Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- end content -->

<!-- js customs -->
<script src="./assets/js/filter.js"></script>

<?php

require_once('layouts/footer.php');

?>