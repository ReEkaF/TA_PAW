// fungsi untuk halaman transaction edit payment method, yang melakukan hal berikut:
// 1. toggle class ketika elemen item pada daftar metode pembayaran diklik, untuk menampilkan/menyembunyikan state aktif (berupa warna).
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
