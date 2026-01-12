document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("internship-list");
    container.innerHTML = "Loading...";

    fetch("internship.php")
        .then(response => {
            if (!response.ok) throw new Error("Network error");
            return response.json();
        })
        .then(data => {
            container.innerHTML = "";
            if (data.length === 0) {
                container.innerHTML = "<p>No internships available.</p>";
                return;
            }

            data.forEach(internship => {
                const card = document.createElement("div");
                card.className = "internship-card";
                card.innerHTML = `
                    <h3>${internship.name}</h3>
                    <p><strong>Company:</strong> ${internship.companyName}</p>
                    <p><strong>Duration:</strong> ${internship.duration} months</p>
                    <p><strong>Stipend:</strong> ₹${internship.stipend}</p>
                    <a class="view-btn apply-btn" href="#">Apply</a>
                    <p class="applied-msg" style="display:none; color:green; font-weight:bold; margin-top:8px;">Internship Applied!</p>
                `;

                container.appendChild(card);

                const applyBtn = card.querySelector(".apply-btn");
                const message = card.querySelector(".applied-msg");

                applyBtn.addEventListener("click", (e) => {
                    e.preventDefault();
                    applyBtn.style.display = "none";
                    message.style.display = "block";
                });
            });
        })
        .catch(error => {
            console.error("Error:", error);
            container.innerHTML = "<p>Failed to load internships.</p>";
        });
});
