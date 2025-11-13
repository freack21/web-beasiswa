document.addEventListener("DOMContentLoaded", function () {
  const fileInput = document.getElementById("berkas");
  const fileLabel = document.querySelector(".file-input-label");
  const fileName = document.querySelector(".file-name");

  if (fileInput) {
    fileInput.addEventListener("change", function (e) {
      const file = e.target.files[0];
      if (file) {
        fileName.textContent = file.name;
        fileLabel.style.borderColor = "var(--success-color)";
        fileLabel.style.backgroundColor = "rgba(16, 185, 129, 0.05)";
      } else {
        fileName.textContent = "Belum ada file dipilih";
        fileLabel.style.borderColor = "var(--border-color)";
        fileLabel.style.backgroundColor = "var(--light-bg)";
      }
    });
  }

  const registrationForm = document.getElementById("registrationForm");

  if (registrationForm) {
    registrationForm.addEventListener("submit", function (e) {
      let isValid = true;
      let errorMessage = "";

      const nama = document.getElementById("nama").value.trim();
      if (nama === "") {
        isValid = false;
        errorMessage += "Nama harus diisi.\n";
      }

      const email = document.getElementById("email").value.trim();
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email === "") {
        isValid = false;
        errorMessage += "Email harus diisi.\n";
      } else if (!emailRegex.test(email)) {
        isValid = false;
        errorMessage += "Format email tidak valid.\n";
      }

      const nomorHp = document.getElementById("nomor_hp").value.trim();
      const phoneRegex = /^[0-9]+$/;
      if (nomorHp === "") {
        isValid = false;
        errorMessage += "Nomor HP harus diisi.\n";
      } else if (!phoneRegex.test(nomorHp)) {
        isValid = false;
        errorMessage += "Nomor HP hanya boleh berisi angka.\n";
      } else if (nomorHp.length < 10 || nomorHp.length > 15) {
        isValid = false;
        errorMessage += "Nomor HP harus antara 10-15 digit.\n";
      }

      const semester = document.getElementById("semester").value;
      if (semester === "") {
        isValid = false;
        errorMessage += "Semester harus dipilih.\n";
      }

      const beasiswa = document.getElementById("beasiswa_id").value;
      if (beasiswa === "") {
        isValid = false;
        errorMessage += "Pilihan beasiswa harus dipilih.\n";
      }

      const berkas = document.getElementById("berkas").files[0];
      if (!berkas) {
        isValid = false;
        errorMessage += "Berkas syarat harus diupload.\n";
      } else {
        const allowedExtensions = ["pdf", "jpg", "jpeg", "png", "zip"];
        const fileExtension = berkas.name.split(".").pop().toLowerCase();
        if (!allowedExtensions.includes(fileExtension)) {
          isValid = false;
          errorMessage += "Format file harus PDF, JPG, PNG, atau ZIP.\n";
        }

        const maxSize = 5 * 1024 * 1024;
        if (berkas.size > maxSize) {
          isValid = false;
          errorMessage += "Ukuran file maksimal 5MB.\n";
        }
      }

      if (!isValid) {
        e.preventDefault();
        alert(errorMessage);
      }
    });
  }

  const ipkInput = document.getElementById("ipk");
  if (ipkInput) {
    const ipk = parseFloat(ipkInput.value);
    const beasiswaSelect = document.getElementById("beasiswa_id");
    const berkasInput = document.getElementById("berkas");
    const submitButton = document.getElementById("submitBtn");

    if (ipk < 3.0) {
      if (beasiswaSelect) beasiswaSelect.disabled = true;
      if (berkasInput) berkasInput.disabled = true;
      if (submitButton) submitButton.disabled = true;
    } else {
      if (beasiswaSelect) {
        beasiswaSelect.disabled = false;
        beasiswaSelect.focus();
      }
      if (berkasInput) berkasInput.disabled = false;
      if (submitButton) submitButton.disabled = false;
    }
  }
});
