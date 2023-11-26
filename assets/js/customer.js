// fungsi untuk komponen navbar, yang melakukan hal berikut:
// 1. toggle class ketika elemen profil diklik, untuk menampilkan/menyembunyikan komponen dropdown.
const navbar = (toggler) => {
  toggler.addEventListener("click", () => {
    toggler.nextElementSibling.classList.toggle(
      "navbar__profile-menu-list_show"
    );
  });
};

navbar(document.querySelector(".navbar__profile-toggler"));
