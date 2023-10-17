const pres = document.querySelector(".presence");
const pres_form = document.querySelector("#presence_form");
const brand = document.querySelector(".brand");
const brand_form = document.querySelector("#brand_form");
const sort = document.querySelector(".sort_btn");
const sort_form = document.querySelector("#sort_form");
const add = document.querySelector(".add");
const add_good_form = document.querySelector(".add_good_form");

pres.addEventListener("click", () => {
    if (pres_form.classList.contains("active") == false) {
        pres_form.classList.add("active");
        pres.classList.add("active");

    } else {
        pres_form.classList.remove("active");
        pres.classList.remove("active");
    }
})

brand.addEventListener("click", () => {
    if (brand_form.classList.contains("active") == false) {
        brand_form.classList.add("active");
        brand.classList.add("active");

    } else {
        brand_form.classList.remove("active");
        brand.classList.remove("active");
    }
})

sort.addEventListener("click", () => {
    if (sort_form.classList.contains("active") == false) {
        sort_form.classList.add("active");
        sort.classList.add("active");

    } else {
        sort_form.classList.remove("active");
        sort.classList.remove("active");
    }
})

add.addEventListener("click", () => {
    if (add_good_form.classList.contains("active") == false) {
        add_good_form.classList.add("active");
    } else {
        add_good_form.classList.remove("active");
    }
})