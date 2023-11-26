// fungsi untuk komponen topbar, yang melakukan hal berikut:
// 1. toggle class ketika elemen profil diklik, untuk menampilkan/menyembunyikan komponen dropdown.
const topbar = (toggler) => {
  toggler.addEventListener("click", () => {
    toggler.nextElementSibling.classList.toggle(
      "topbar__profile-menu-list_show"
    );
  });
};

topbar(document.querySelector(".topbar__profile-toggler"));
