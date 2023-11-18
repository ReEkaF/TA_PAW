<?php

$page = 'referral-codes';
$title = 'Referral Codes';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Referral codes</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <form action="./categories.html" method="post" class="page-single">
        <div>
          <label for="email" class="input-label">Code</label>
          <input type="text" id="email" class="input" />
          <div class="input-help">
            Password harus berupa angka, alfabet, dan 1 karakter
            khusus.
          </div>
          <div class="input-error">
            Harus terdapat 1 karakter khusus.
          </div>
        </div>
        <div class="page-single__actions">
          <button type="submit" class="page-single__button page-single__button_primary">
            Add
          </button>
        </div>
      </form>
    </div>
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Code</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1.</td>
            <td>23</td>
            <td>
              <a href="./referral-codes.html" class="button">Delete</a>
            </td>
          </tr>
          <tr>
            <td>1.</td>
            <td>23</td>
            <td>
              <a href="./referral-codes.html" class="button">Delete</a>
            </td>
          </tr>
          <tr>
            <td>1.</td>
            <td>23</td>
            <td>
              <a href="./referral-codes.html" class="button">Delete</a>
            </td>
          </tr>
          <tr>
            <td>1.</td>
            <td>23</td>
            <td>
              <a href="./referral-codes.html" class="button">Delete</a>
            </td>
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