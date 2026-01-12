function validateRemoveForm() {
    const prn = document.getElementById("student-id").value.trim();
  
    if (!/^[A-Za-z0-9]{8}$/.test(prn)) {
      alert("PRN must be exactly 8 alphanumeric characters.");
      return false;
    }
  
    return true;
  }
  