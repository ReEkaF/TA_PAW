const transactionEditPaymentMethod = () => {
  const methodList = document.querySelectorAll(".checkout__method-list label");

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
