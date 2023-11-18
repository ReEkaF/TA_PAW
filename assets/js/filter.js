const filter = () => {
  const filterForm = document.querySelector("form.filter");
  const button = filterForm.querySelector("button");
  const selects = filterForm.querySelectorAll("select");
  const dateInputs = filterForm.querySelectorAll("input[type='date']");

  selects.forEach((select) => {
    select.addEventListener("change", () => {
      button.click();
    });
  });

  dateInputs.forEach((input) => {
    input.addEventListener("input", () => {
      button.click();
    });
  });
};

window.addEventListener("load", filter);
