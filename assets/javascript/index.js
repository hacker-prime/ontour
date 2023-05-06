/*===== SCROLL SECTIONS ACTIVE LINK =====*/
const sections = document.querySelectorAll('section[id]')
const navLi = document.querySelectorAll("header .nav__menu ul li a");

window.addEventListener('scroll', scrollActive)

function scrollActive(){

    const scrollY = window.pageYOffset
    let current = "";

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 1;
        sectionId = current.getAttribute('id')
        

        if(scrollY > sectionTop && scrollY < sectionTop + sectionHeight){

        // if(scrollY >= sectionTop){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active__menu')
            console.log("scrollY or Scroll Bar Position: " + scrollY);
            // https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/offsetTop
            // https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/offsetParent
            console.log("Section Top or Distance from the top of the document/DOM to the bottom of a particular html element: " + sectionTop);
            console.log("Height of the particular html element: " + sectionHeight );

            // console.log("Current Section ID:" + sectionId);
            sectionId = current.getAttribute('id');
            // document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active__menu')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active__menu')
        }
    })

    // console.log("Current Section ID:" + sectionId);


}

/*===== SCROLL SECTIONS ACTIVE LINK =====*/

console.log("Scroll Bar: " + window.scrollY);

var a = document.getElementById("home");
var topPos = a.offsetTop;
console.log("Home Section - Section Top: " + topPos);


var about = document.getElementById("about");
var topPosAbout = about.offsetTop;
console.log("About Section - Section Top: " + topPosAbout);


var services = document.getElementById("services");
var topPosServices = services.offsetTop;
console.log("Services Section - Section Top: " + topPosServices);


var features = document.getElementById("features");
var topPosFeatures = features.offsetTop;
console.log("Features Section - Section Top: " + topPosFeatures);


var partners = document.getElementById("partners");
var topPosPartners = partners.offsetTop;
console.log("Partners Section - Section Top: " + topPosPartners);


var b = document.getElementById("contact");
var topPos2 = b.offsetTop;
console.log("Contact Section - Section Top: " + topPos2);

// https://developer.mozilla.org/en-US/docs/Web/API/Window/innerHeight
let intViewportHeight = window.innerHeight;
console.log("Height of the Window: " +intViewportHeight);

// https://stackoverflow.com/questions/1145850/how-to-get-height-of-entire-document-with-javascript
var body = document.body,
    html = document.documentElement;

var height = Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
console.log("Height of the entire document: " + height);                      

function show_side_navigation() {

    hamburger_menu = document.querySelector(".hamburger-menu");

    big_wrapper = document.querySelector(".nav");

    hamburger_menu.addEventListener("click", () => {

      big_wrapper.classList.toggle("active");

    });

  }
  
show_side_navigation();

var side_nav = document.getElementsByTagName('li');

var remove_side_navigation = function() {
    //  alert('Side navigation removed.'); 
     big_wrapper = document.querySelector(".nav");
     big_wrapper.classList.remove("active");
}

for (var i = side_nav.length - 1; i >= 0; --i) {
    side_nav[i].onclick = remove_side_navigation;
}

// Pure JS | how to detect swipe direction in html - https://www.youtube.com/watch?v=AiRNt4asPQI
var startingX , startingY , movingX , movingY ;

function touchStart(evt){

    startingX = evt.touches[0].clientX ;
    startingY = evt.touches[0].clientY ;

}

function touchMove(evt){

    movingX = evt.touches[0].clientX ;
    movingY = evt.touches[0].clientY ;

}

function touchEnd(){

    if(startingX+100 < movingX){
    console.log('right');

    big_wrapper = document.querySelector(".nav");
        // https://www.javascripttutorial.net/dom/css/check-if-an-element-contains-a-class/
    if(big_wrapper.classList.contains("active")){
        // alert("YES");
        big_wrapper.classList.toggle("active"); 
    }


    } else if(startingX-100 > movingX){

        console.log('left');

    }

    if(startingY+100 < movingY){

        console.log('down');

    } else if(startingY-100 > movingY){

        console.log('up');

    }

}

