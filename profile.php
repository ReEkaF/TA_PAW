<?php

$title = 'Profile';

require_once('layouts/header.php');

?>

<!-- content -->
<main class="profile container">
  <div class="profile__header">
    <h1>My Profile</h1>
  </div>
  <div class="profile__body">
    <div class="profile__left">
      <img src="./assets/img/profiles/profile-2.png" alt="" />
    </div>
    <form action="./profile.php" method="post" class="profile__right">
      <div class="profile__form">
        <div>
          <label for="name" class="input-label">Name</label>
          <input type="text" id="name" class="input" />
          <div class="input-error">Invalid name.</div>
        </div>
        <div>
          <label for="email" class="input-label">Email</label>
          <input type="text" id="email" class="input" />
          <div class="input-error">Invalid email.</div>
        </div>
        <div>
          <label for="phone" class="input-label">Phone</label>
          <input type="text" id="phone" class="input" />
          <div class="input-error">Invalid phone.</div>
        </div>
        <div>
          <label for="photo" class="input-label">Photo</label>
          <input type="file" id="photo" class="input" />
          <div class="input-error">Invalid photo.</div>
        </div>
        <div>
          <button type="submit" class="profile__button">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</main>
<!-- end content -->

<?php

require_once('layouts/footer.php');

?>