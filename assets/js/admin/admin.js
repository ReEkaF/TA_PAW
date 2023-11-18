const sidebar = () => {
  const dropdowns = document.querySelectorAll(
    ".sidebar__menu-list .sidebar__menu-link + .sidebar__menu-list"
  );

  dropdowns.forEach((dropdown) => {
    dropdown.previousElementSibling.addEventListener("click", () => {
      dropdown.previousElementSibling.classList.toggle(
        "sidebar__menu-link_collapse"
      );
      dropdown.classList.toggle("sidebar__menu-list_show");
    });
  });
};

sidebar();

const topbar = (toggler) => {
  toggler.addEventListener("click", () => {
    toggler.nextElementSibling.classList.toggle(
      "topbar__profile-menu-list_show"
    );
  });
};

topbar(document.querySelector(".topbar__profile-toggler"));
