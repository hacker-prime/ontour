const pickupDateInput = document.querySelector('#pick-up-date');
const datetimeInvisible = document.querySelector('.datetime-invisible');
const datetimeInput = datetimeInvisible.querySelector('input[type=datetime-local]');

document.addEventListener('click', (event) => {
  if (datetimeInvisible.style.display === 'block' && 
      event.target !== pickupDateInput &&
      !datetimeInvisible.contains(event.target)) {
    datetimeInvisible.style.display = 'none';
  }
});

pickupDateInput.addEventListener('click', () => {
  console.log('Pick up date input field selected.');

  // Show the datetime-invisible element by setting its display property to "block"
  datetimeInvisible.style.display = 'block';

});

datetimeInput.addEventListener('input', () => {
  console.log(`Selected date time: ${datetimeInput.value}`);

  const datetime = new Date(datetimeInput.value);
const formattedDateTime = datetime.toLocaleString('en-US', { 
  month: 'long', 
  day: 'numeric', 
  year: 'numeric',
  hour: 'numeric',
  minute: 'numeric',
  hour12: true
});

  
  // Update the pick-up date input value with the selected date time
  pickupDateInput.value = formattedDateTime;
});

datetimeInput.addEventListener('blur', () => {
  console.log('Datetime picker closed.');
  // Apply display:none to the datetimeInvisible element
    datetimeInvisible.style.display = 'none';
});


// ChatGPT
// To make the code dynamic, you can modify it to work with any number of input fields and corresponding lists. Here's an updated version of the code that allows for dynamic handling of multiple input fields and lists:

// Function to show a list
function showList(list) {
  list.style.display = 'block';
}

// Function to hide a list
function hideList(list) {
  list.style.display = 'none';
}

// Function to update an input field and hide the corresponding list when an item is selected
function selectItem(item, inputField, list) {
  inputField.value = item.textContent;
  hideList(list);
}

// Function to attach event listeners to an input field and its corresponding list
function attachEventListeners(inputField, list, items, selectItemFn) {
  // Event listener to show the list when the input field is clicked
  inputField.addEventListener('click', function () {
    showList(list);
  });

  // Event listener to hide the list when clicking outside of it
  document.addEventListener('click', function (event) {
    var target = event.target;
    if (target !== inputField && !list.contains(target)) {
      hideList(list);
    }
  });

  // Event listener for each list item to update the input field and hide the list
  for (var i = 0; i < items.length; i++) {
    items[i].addEventListener('click', function () {
      selectItemFn(this, inputField, list);
    });
  }
}

// Example usage:
var tour_input_field = document.getElementById('tour');
var hotel_input_field = document.getElementById('hotel');
var service_type_input_field = document.getElementById('service_type');

var list_of_tours = document.getElementById('listoftours');
var list_of_hotels = document.getElementById('listofhotels');
var list_of_service_types = document.getElementById('listofservicetypes');

var tour_list_items = list_of_tours.getElementsByTagName('li');
var hotel_list_items = list_of_hotels.getElementsByTagName('li');
var service_types_list_items = list_of_service_types.getElementsByTagName('li');



// Attach event listeners to the tour input field and list
attachEventListeners(tour_input_field, list_of_tours, tour_list_items, function (item, inputField, list) {
  selectItem(item, inputField, list);
});

// Attach event listeners to the hotel input field and list
attachEventListeners(hotel_input_field, list_of_hotels, hotel_list_items, function (item, inputField, list) {
  selectItem(item, inputField, list);
});

// Attach event listeners to the service type field and list
attachEventListeners(service_type_input_field, list_of_service_types, service_types_list_items, function (item, inputField, list) {
  selectItem(item, inputField, list);
});

// With this modification, you can add more input fields and lists by following the same pattern and calling the attachEventListeners function for each pair. It makes the code more flexible and adaptable to handle dynamic scenarios.

