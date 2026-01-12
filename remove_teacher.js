function validateForm() {
    const teacherName = document.getElementById("teacher_name").value.trim();

    if (teacherName === "") {
        alert("Teacher name is required.");
        return false;
    }

    return true;
}
