document.addEventListener("DOMContentLoaded", () => {
    const listContainer = document.getElementById("material-list");

    fetch("getStudyMaterial.php")
        .then(response => {
            if (!response.ok) throw new Error("Network error");
            return response.json();
        })
        .then(data => {
            listContainer.innerHTML = "";

            if (data.length === 0) {
                listContainer.innerHTML = "<p>No study material available.</p>";
                return;
            }

            data.forEach(item => {
                const card = document.createElement("div");
                card.className = "internship-card";
                card.innerHTML = `
                    <h3>${item.subject}</h3>
                    <p><strong>Topic:</strong> ${item.topic}</p>
                    <p><strong>Description:</strong> ${item.description}</p>
                    <a href="${item.file_path}" target="_blank" class="view-btn">📥 View PDF</a>
                `;
                listContainer.appendChild(card);
            });
        })
        .catch(error => {
            console.error("Error:", error);
            listContainer.innerHTML = "<p>Failed to load study material.</p>";
        });
});
