window.addEventListener("load", function() {
    // Make a copy of nav
    let menu = document.querySelector(".menu").cloneNode(true);
    menu.style.display = "none";

    document.querySelector(".menu").parentElement.appendChild(menu);

    document.querySelector(".burger").addEventListener("click", function(event) {
        menu.style.display = "block";
    }.bind(this));
});

// $( ".burger" ).click(function() {
//     $( ".menu" ).slideToggle();
// });

// $( ".menu__item" ).click(function() {
//     $( ".menu" ).slideToggle();
// });
