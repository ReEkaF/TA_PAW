// fungsi untuk komponen filter, yang melakukan hal berikut:
// 1. submit form ketika elemen select diubah.
const filter = () => {
  const filterForm = document.querySelector("form.filter");
  const button = filterForm.querySelector("button");
  const selects = filterForm.querySelectorAll("select");

  selects.forEach((select) => {
    select.addEventListener("change", () => {
      button.click();
    });
  });
};

window.addEventListener("load", filter);
