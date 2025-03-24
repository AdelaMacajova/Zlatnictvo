const accordion = document.getElementsByClassName("accordion");

for (a of accordion) {
    a.addEventListener("click", function (event) {
        if (event.target.classList.contains("question")) {
            this.classList.toggle("active");
        }
    });
}
