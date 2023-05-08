/*===== SCROLL SECTIONS ACTIVE LINK =====*/
const sections = document.querySelectorAll('section[id]')
const navLi = document.querySelectorAll("header .nav__menu ul li a");

// if(window.scrollY <= 79 && window.scrollY >= 0){
//   document.querySelector('.nav__menu a[href*=' + sections[0].id + ']').classList.add('active__menu')
//   document.querySelector('.nav__menu a[href*=' + sections[sections.length-1].id + ']').classList.remove('active__menu')
// }


window.addEventListener('scroll', scrollActive)

function scrollActive(){

  if(window.scrollY < 109){


    var element = document.getElementById('airport');
    element.style.height = 'auto';
  
    // Scroll To Top
    // window.scrollTo({
    //   top: 0,
    //   behavior: 'smooth' 
    // });
    
  }

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
            console.log("Current Section ID:" + sectionId);
            // document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active__menu')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active__menu')
        }

        if(window.scrollY <= 115 && window.scrollY >= 0){
          document.querySelector('.nav__menu a[href*=' + sections[0].id + ']').classList.add('active__menu')
          document.querySelector('.nav__menu a[href*=' + sections[sections.length-1].id + ']').classList.remove('active__menu')

        }
       

    })

    // console.log("Current Section ID:" + sectionId);


}

document.querySelector('.nav__menu a[href*=' + sections[0].id + ']').addEventListener("click",function(){

  if(window.scrollY > 109){


    var element = document.getElementById('airport');
    element.style.height = '110vh';

    // Scroll To Top
    // window.scrollTo({
    //   top: 0,
    //   behavior: 'smooth' 
    // });
    
  } 

  if(window.scrollY < 109){


    var element = document.getElementById('airport');
    element.style.height = 'auto';

    // Scroll To Top
    // window.scrollTo({
    //   top: 0,
    //   behavior: 'smooth' 
    // });
    
  }

})





// var button = document.getElementById('airport');
// button.addEventListener('click', scrollToTop);

// function scrollToTop() {
//   window.scrollTo({
//     top: 0,
//     behavior: 'smooth'
//   });
// }


// menuitems = document.querySelectorAll('section[id]');
// document.querySelector('.nav__menu a[href*=' + sections[0].id + ']').classList.add('active__menu')



/*===== SCROLL SECTIONS ACTIVE LINK =====*/

console.log("Scroll Bar: " + window.scrollY);



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

// ChatGPT
var bar = document.getElementById('bar');
bar.addEventListener('click', function(){

    // To change the colors of the .bar::before and .bar::after pseudo-elements, you can dynamically insert new CSS rules using the insertRule() method. 
    // In this approach, we create a new <style> element using document.createElement('style'). We set the innerHTML property of the <style> element to define new CSS rules targeting the .bar::before and .bar::after pseudo-elements and set the desired background-color values using !important to override any existing styles.
    // Finally, we append the <style> element to the <head> element using document.head.appendChild(styleElement).
    // To apply the new colors, you can call the changeColors() function. This will dynamically insert the new CSS rules, overriding the existing styles for the .bar::before and .bar::after pseudo-elements.
    // Make sure you have the .bar element and its ::before and ::after pseudo-elements defined in your HTML and CSS code for this approach to work correctly.

    // In this updated function, we use barElement.classList.toggle('selected') to toggle the selected class on the .bar element. By checking the return value of toggle(), we determine if the class was added or removed.
    // If the class selected was added (indicating the first click), we set the background-color of the .bar::before and .bar::after pseudo-elements to blue.
    // If the class selected was removed (indicating the second click), we set the background-color of the .bar::before and .bar::after pseudo-elements to white.
    // By creating a new <style> element and inserting the appropriate CSS rules, we dynamically change the colors of the pseudo-elements.
    // Make sure to have the .bar element and its ::before and ::after pseudo-elements defined in your HTML and CSS code for this approach to work correctly.

    const barElement = document.querySelector('.bar');
    const styleElement = document.createElement('style');
    const isBlue = barElement.classList.toggle('selected');
  
    if (isBlue) {
      styleElement.innerHTML = `
        .bar::before {
          background-color: var(--on-tour-logo-color-2);
        }
        .bar::after {
          background-color: var(--on-tour-logo-color-2);
        }
      `;
    } else {
      styleElement.innerHTML = `
        .bar::before {
          background-color: var(--white-color);
        }
        .bar::after {
          background-color: var(--white-color);
        }
      `;
    }
  
    document.head.appendChild(styleElement);
})