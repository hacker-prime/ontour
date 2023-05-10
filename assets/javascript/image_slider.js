var sliders = document.querySelectorAll('.slider');

sliders.forEach((slider) => {
  var slides = slider.querySelectorAll('.slide');
  var btns = slider.querySelectorAll('.btn');
  slider.currentSlide = 0; // Store the current slide index as a property of the slider element

  // Javascript for image slider manual navigation
  var manualNav = function(manual){
    slides.forEach((slide) => {
      slide.classList.remove('active');
    });

    btns.forEach((btn) => {
      btn.classList.remove('active');
    });

    slides[manual].classList.add('active');
    btns[manual].classList.add('active');
    slider.currentSlide = manual; // Update the current slide for this slider
  };

  btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
      manualNav(i);
    });
  });

  // Javascript for image slider autoplay navigation
  var repeat = function(activeClass){
    let active = slider.getElementsByClassName('active');

    var repeater = () => {
      setTimeout(function(){
        [...active].forEach((activeSlide) => {
          activeSlide.classList.remove('active');
        });

        slides[slider.currentSlide].classList.add('active');
        btns[slider.currentSlide].classList.add('active');
        slider.currentSlide++;

        if (slider.currentSlide === slides.length) {
          slider.currentSlide = 0;
        }
        if (slider.currentSlide >= slides.length) {
          return;
        }
        repeater();
      }, 10000);
    };
    repeater();
  };
  repeat();
});




// ChatGPT - adjust width of one element based on the width of another element as the screens width changes with javascript 
// Add the event listener
window.addEventListener('resize', resizeElement2);

// Call the event listener function once
resizeElement2();

// Event listener function
function resizeElement2() {
  var element1Width = document.getElementById('airport_form').offsetWidth;
  document.getElementById('img-slider').style.width = element1Width + 'px';
}

// window.addEventListener('resize', resize_element_height);

// // Call the event listener function once
// resize_element_height();

// // Event listener function
// function resize_element_height() {
//   var element1Height = document.getElementById('l-header').offsetHeight;
//   document.getElementById('airport').style.height = element1Height + 'vh';
// }

// function adjustHeight() {
//     var element1 = document.getElementById('l-header');
//     var element2 = document.getElementById('airport');
    
//     var element1Bottom = element1.offsetTop + element1.offsetHeight;
//     var element2Top = element2.offsetTop;
    
//     var desiredHeight = element2Top - element1Bottom;
    
//     if (desiredHeight > 0) {
//       element2.style.height = desiredHeight + 'px';
//     } else {
//       element2.style.height = '0';
//     }
//   }
  
//   window.addEventListener('resize', adjustHeight);

