window.addEventListener("load", function() {
    // Make a copy of nav
    let burgerMenu = document.querySelector(".menu").cloneNode(true);
    burgerMenu.classList.add("menu--burger");

    document.querySelector(".menu").parentElement.appendChild(burgerMenu);

    document.querySelector(".burger").addEventListener("click", function(event) {
        burgerMenu.classList.toggle("menu--burger-visible");
    });

    Array.from(burgerMenu.children).forEach(function(menuItem) {
        menuItem.addEventListener("click", function(event) {
            burgerMenu.classList.toggle("menu--burger-visible");
        });
    });
});
