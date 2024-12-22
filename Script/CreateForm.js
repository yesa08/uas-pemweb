class CreateForm {
  // Mengubah warna border saat fokus
  static handleFocus(element) {
    element.style.backgroundColor = "#f0f8ff"; 
    element.style.border = "2px solid #5b9bd5";
    element.style.outline = "none";
  }

  // Mengembalikan warna border saat kehilangan fokus
  static handleBlur(element) {
    element.style.backgroundColor = "";
    element.style.border = "";
    element.style.outline = "";
  }

  // Validasi client-side saat submit
  static validateForm() {
    var namaMatkul = document.getElementById("nama_matkul").value;
    var waktu = document.getElementById("waktu").value;
    var dosen = document.getElementById("dosen").value;
    var ruang = document.getElementById("ruang").value;
    var errorMessages = [];

    // Menghapus pesan error sebelumnya
    document.getElementById("error-messages").innerHTML = "";

    // Validasi "Nama Matkul" sudah di isi
    if (namaMatkul.trim() === "") {
      errorMessages.push("Nama Mata Kuliah harus diisi.");
    }

    // Validasi panjang minimal "Nama Matkul"
    if (namaMatkul.length < 5) {
      errorMessages.push("Nama Mata Kuliah minimal 5 karakter.");
    }

    // Validasi "Waktu" sudah di isi
    if (waktu.trim() === "") {
      errorMessages.push("Waktu harus diisi.");
    }

    // Validasi panjang minimal "Waktu"
    if (waktu.length < 5) {
      errorMessages.push("Waktu minimal 5 karakter.");
    }

    // Validasi "Dosen" sudah di isi
    if (dosen.trim() === "") {
      errorMessages.push("Nama Dosen harus diisi.");
    }

    // Validasi "Ruang" sudah di isi
    if (ruang.trim() === "") {
      errorMessages.push("Ruang harus diisi.");
    }

    // Validasi panjang minimal "ruang"
    if (ruang.length < 4) {
      errorMessages.push("Ruang minimal 4 karakter.");
    }

    // Menampilkan error jika ada
    if (errorMessages.length > 0) {
      var errorMessageList = "<ul>";
      errorMessages.forEach(function (message) {
        errorMessageList += "<li>" + message + "</li>";
      });
      errorMessageList += "</ul>";
      document.getElementById("error-messages").innerHTML = errorMessageList;
      return false; // Menghentikan form submission
    }
  }
}
