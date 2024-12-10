// Pilih semua input OTP
const otpInputs = document.querySelectorAll(".otp-input");

otpInputs.forEach((input, index) => {
  // Event untuk navigasi otomatis saat input diisi
  input.addEventListener("input", () => {
    const value = input.value;

    // Batasi hanya 1 karakter
    input.value = value.length > 1 ? value[0] : value;

    // Pindah ke input berikutnya jika terisi
    if (value.length === 1 && index < otpInputs.length - 1) {
      otpInputs[index + 1].focus();
    }
  });

  // Event untuk navigasi mundur saat Backspace ditekan
  input.addEventListener("keydown", (e) => {
    if (e.key === "Backspace") {
      // Kosongkan input jika Backspace ditekan
      if (input.value === "" && index > 0) {
        otpInputs[index - 1].focus();
        otpInputs[index - 1].value = ""; // Kosongkan input sebelumnya
      }
    }
  });

  // Pastikan input bersih saat di-load ulang
  input.addEventListener("focus", () => {
    if (input.value.length > 1) {
      input.value = "";
    }
  });
});
