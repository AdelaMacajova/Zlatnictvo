document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".filter-button");
    const items = document.querySelectorAll(".shop-item");

    buttons.forEach(button => {
        button.addEventListener("click", function() {
            const category = this.getAttribute("data-category");

            items.forEach(project => {
                const projectCategories = project.getAttribute("data-category").split(" ");

                if (category === "all" || projectCategories.includes(category)) {
                    project.style.display = "flex";
                } else {
                    project.style.display = "none";
                }
            });
        });
    });
});