
  function validateRemoveForm() {
    const companyName = document.getElementById("name").value.trim();
  
    if (!companyName) {
      alert("❌ Please enter the company name.");
      return false;
    }
  
    const regex = /^[A-Za-z\s]+$/;
  
    if (!regex.test(companyName)) {
      alert("❌ Company name should only contain alphabets and spaces.");
      return false;
    }
  
    return true; 
  }
  