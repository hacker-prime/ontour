// gallery item filter
//  How to Create a Portfolio Filter Using Html Css & Javascript | Responsive Gallery filter  - https://www.youtube.com/watch?v=be2tYHbvSyg&t=11s
//  This version or way is more complicated - https://www.w3schools.com/howto/howto_js_portfolio_filter.asp

const filterButtons = document.querySelector("#filter-btns").children;
const items = document.querySelector(".portfolio-gallery").children;
 
for (let i = 0; i < filterButtons.length; i++) {
    filterButtons[i].addEventListener("click", function () {
        for (let j = 0; j < filterButtons.length; j++) {
            filterButtons[j].classList.remove("active")
        }
        this.classList.add("active");
        const target = this.getAttribute("data-target")
 
        for (let k = 0; k < items.length; k++) {
            items[k].style.display = "none";
            if (target == items[k].getAttribute("data-id")) {
                items[k].style.display = "block";
            }
            if (target == "all") {
                items[k].style.display = "block";
            }
        }
 
    })
}

// My modifications
 
// The answer with 130 votes - April 28 2012 https://stackoverflow.com/questions/3842614/how-do-i-call-a-javascript-function-on-page-load
document.addEventListener("DOMContentLoaded", function() {

    for (let i = 0; i < filterButtons.length; i++) {
        // https://stackoverflow.com/questions/5898656/check-if-an-element-contains-a-class-in-javascript
        if(filterButtons[i].classList.contains("active")){

            console.log(filterButtons[i]);
            console.log(filterButtons[i].getAttribute("data-target"));

            for (let k = 0; k < items.length; k++) {

                items[k].style.display = "none";

                if (filterButtons[i].getAttribute("data-target") == items[k].getAttribute("data-id")) {

                    items[k].style.display = "block";

                }                

            }

        }

    }

}); 
 
 