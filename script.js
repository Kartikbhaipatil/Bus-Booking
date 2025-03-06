document.addEventListener("DOMContentLoaded", function () {
    // Swap 'From' and 'To' locations
    document.querySelector(".swap").addEventListener("click", function () {
        let from = document.getElementById("from");
        let to = document.getElementById("to");
        [from.value, to.value] = [to.value, from.value];
    });

    // Highlight selected date
    let dateButtons = document.querySelectorAll(".date-btn");
    dateButtons.forEach(button => {
        button.addEventListener("click", function () {
            dateButtons.forEach(btn => btn.style.background = "white");
            this.style.background = "#007aff";
            this.style.color = "white";
        });
    });
});
/*--------------------------------seat-layout------------------------*/
document.addEventListener("DOMContentLoaded", function() {
    let seats = document.querySelectorAll(".seat");

    seats.forEach(seat => {
        seat.addEventListener("click", function() {
            if (!seat.classList.contains("unavailable") && !seat.classList.contains("female")) {
                seat.classList.toggle("selected");
            }
        });
    });
});


