
fetch('placed_students.php')
  .then(response => response.json())
  .then(data => {
    const studentsTable = document.getElementById('studentsTable').getElementsByTagName('tbody')[0];

    data.forEach(student => {
      const row = studentsTable.insertRow();

      const prnCell = row.insertCell(0);
      const nameCell = row.insertCell(1);
      const yearCell = row.insertCell(2);
      const companyCell = row.insertCell(3);

      prnCell.textContent = student.PRN;
      nameCell.textContent = student.name;
      yearCell.textContent = student.year;
      companyCell.textContent = student.company;

      row.addEventListener('click', () => showStudentDetails(student));
    });
  })
  .catch(error => console.error('Error:', error));

function showStudentDetails(student) {
  document.getElementById('studentPRN').textContent = student.PRN;
  document.getElementById('studentName').textContent = student.name;
  document.getElementById('studentYear').textContent = student.year;
  document.getElementById('studentCompany').textContent = student.company;

  document.getElementById('studentDetails').style.display = 'block';
}

document.getElementById('studentDetails').addEventListener('click', (event) => {
  if (event.target === document.getElementById('studentDetails')) {
    document.getElementById('studentDetails').style.display = 'none';
  }
});
