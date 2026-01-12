function validateMaterialForm() {
    const subject = document.getElementById("subject").value.trim();
    const topic = document.getElementById("topic").value.trim();
    const description = document.getElementById("description").value.trim();
    const pdfFile = document.getElementById("pdfFile").value;

    if (!/^[A-Za-z\s]+$/.test(subject)) {
        alert("Subject should only contain letters and spaces.");
        return false;
    }

    if (!/^[A-Za-z\s]+$/.test(topic)) {
        alert("Topic should only contain letters and spaces.");
        return false;
    }

    if (description.length < 10) {
        alert("Description should be at least 10 characters.");
        return false;
    }

    if (pdfFile === "" || !pdfFile.endsWith(".pdf")) {
        alert("Please upload a valid PDF file.");
        return false;
    }

    return true;
}
