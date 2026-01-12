function validateForm() {
  const companyId = document.getElementById("prn").value.trim();
  const companyName = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("pass").value.trim();

  if (!/^[a-zA-Z0-9]+$/.test(companyId)) {
    alert("Company ID must be alphanumeric with no spaces.");
    return false;
  }

  if (!/^[A-Za-z\s]+$/.test(companyName)) {
    alert("Company name must contain only letters and spaces.");
    return false;
  }

  if (!/^\S+@\S+\.\S+$/.test(email)) {
    alert("Enter a valid email address.");
    return false;
  }

  if (password.length < 8) {
    alert("Password must be at least 8 characters.");
    return false;
  }

  return true;
}
