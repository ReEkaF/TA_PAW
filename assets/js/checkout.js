// fungsi untuk halaman checkout, yang melakukan hal berikut:
// 1. toggle class ketika elemen item pada daftar metode pembayaran diklik, untuk menampilkan/menyembunyikan state aktif (berupa warna).
const checkout = () => {
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

checkout();
