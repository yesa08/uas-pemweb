class LoginForm {

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
    var email = document.getElementById("email").value;
    var katasandi = document.getElementById("katasandi").value;
    var errorMessages = [];

    // Menghapus pesan error sebelumnya
    document.getElementById("error-messages").innerHTML = "";

    // Validasi "Nama Matkul" sudah di isi
    if (email.trim() === "") {
      errorMessages.push("Email harus diisi.");
    }

    // Validasi panjang minimal "Nama Matkul"
    if (email.length < 5) {
      errorMessages.push("Email minimal 5 karakter.");
    }

    if (email.indexOf("@") === -1) {
      errorMessages.push("Email tidak valid.");
    }

    // Validasi "Katasandi" sudah di isi
    if (katasandi.trim() === "") {
      errorMessages.push("Katasandi harus diisi.");
    }

    // Validasi panjang minimal "Katasandi"
    if (katasandi.length < 5) {
      errorMessages.push("Katasandi minimal 5 karakter.");
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
