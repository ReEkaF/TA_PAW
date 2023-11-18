<?php

$page = 'categories';
$title = 'Categories';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Categories</h1>
    <div class="admin__actions">
      <a href="./category-add.php" class="admin__button">Add Category</a>
    </div>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Related Products</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1.</td>
            <td>
              <a href="./category-single.php">Category 1</a>
            </td>
            <td>23</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./category-single.php">Category 1</a>
            </td>
            <td>23</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./category-single.php">Category 1</a>
            </td>
            <td>23</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./category-single.php">Category 1</a>
            </td>
            <td>23</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require_once('layouts/footer.php');

?>