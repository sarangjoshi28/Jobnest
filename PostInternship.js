function validateForm() {
    let name = document.getElementById("name").value.trim();
    let company = document.getElementById("company").value.trim();
    let duration = document.getElementById("duration").value.trim();
    let stipend = document.getElementById("stipend").value.trim();

    let namePattern = /^[A-Za-z ]+$/;
    let companyPattern = /^[A-Za-z0-9 ]+$/;
    let numberPattern = /^[0-9]+$/;

    if (name === "" || company === "" || duration === "" || stipend === "") {
        alert("All fields are required!");
        return false;
    }

    if (!namePattern.test(name)) {
        alert("Name should contain only letters and spaces.");
        return false;
    }

    if (!companyPattern.test(company)) {
        alert("Company name should contain only letters, numbers, and spaces.");
        return false;
    }

    if (!numberPattern.test(duration) || parseInt(duration) <= 0) {
        alert("Duration should be a positive number.");
        return false;
    }

    if (!numberPattern.test(stipend) || parseInt(stipend) < 0) {
        alert("Stipend should be a non-negative number.");
        return false;
    }

    return true;
}
