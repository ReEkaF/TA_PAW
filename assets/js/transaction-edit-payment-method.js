const transactionEditPaymentMethod = () => {
  const methodList = document.querySelectorAll(
    ".transaction-edit-method__method-list label"
  );

  methodList.forEach((methodItem) => {
    methodItem.addEventListener("click", () => {
      methodList.forEach((item) => {
        item.classList.remove("active");
      });

      methodItem.classList.add("active");
    });
  });
};

transactionEditPaymentMethod();
