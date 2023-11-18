const navbar = (toggler) => {
  toggler.addEventListener("click", () => {
    toggler.nextElementSibling.classList.toggle(
      "navbar__profile-menu-list_show"
    );
  });
};

navbar(document.querySelector(".navbar__profile-toggler"));
