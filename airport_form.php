<form class="form" id="tours_form">
  
  <!-- <div class="form-section">
    <div class="form-row">
      <label for="first-name">First Name:</label>
      <input type="text" id="first-name" name="first-name" required>
    </div>
    <div class="form-row">
      <label for="last-name">Last Name:</label>
      <input type="text" id="last-name" name="last-name" required>
    </div>
    <div class="form-row">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-row">
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>
    </div>
  </div> -->
    
  <div class="form-section">
    
    <div class="form-row datetime-visible">
      <label for="pick-up-date">Pick Up Date & Time:</label>
      <input type="text" id="pick-up-date" name="pick-up-date" required>
      <div class="datetime-invisible">
        <input type="datetime-local"  id="pick-up-date" name="pick-up-date" required></div>
    </div>
    
    <div class="form-row">
      <label for="pick-up-location">Pick Up Location:</label>
      <input type="text" id="pick-up-location" name="pick-up-location" required>
    </div>
    <div class="form-row">
      <label for="drop-off-location">Drop Off Location:</label>
      <input type="text" id="drop-off-location" name="drop-off-location" required>
    </div>
    <div class="form-row">
      <label for="num-persons">Number of Persons:</label>
      <input type="number" id="num-persons" name="num-persons" required>
    </div>
    <div class="form-row">
        <button type="submit">Submit</button>
    </div>
    
  </div>
  
  <!-- <div class="form-section">
    <button type="submit">Submit</button>
  </div> -->
  
</form>
