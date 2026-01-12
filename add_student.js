function validateForm() {
  const prn = document.getElementById("prn").value.trim();
  const name = document.getElementById("name").value.trim();
  const pass = document.getElementById("pass").value.trim();

  if (!prn || !name || !pass) {
    alert("All fields are required!");
    return false;
  }

  if (!/^[A-Za-z0-9]{8}$/.test(prn)) {
    alert("PRN must be exactly 8 alphanumeric characters (letters and numbers only).");
    return false;
  }

  if (!/^[A-Za-z\s]+$/.test(name)) {
    alert("Name must contain only letters and spaces.");
    return false;
  }

  if (pass.length !== 8) {
    alert("Password must be exactly 8 characters long.");
    return false;
  }

  return true;
}
