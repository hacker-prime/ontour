<!-- https://www.youtube.com/watch?v=Y9yE98etanU Save HTML Form Data to a MySQL Database using PHP -->
<form action="process_form.php" method="post">

    <?php echo !empty($submit_status) ? $submit_status : ""; ?>

    <label for="name">Name</label>
    <input type="text" id="name" name="name">

    <label for="country">Country</label>
    <input type="text" id="country" name="country">

    <label for="description">Description</label>
    <textarea id="description" name="description"></textarea>

    <label for="price">Price</label>
    <input type="number" id="price" name="price">
    
    <label for="discount_price">Discount Price</label>
    <input type="number" id="discount_price" name="discount_price">

    <!-- <label for="priority">Priority</label>
    <select id="priority" name="priority">
        <option value="1">Low</option>
        <option value="2" selected>Medium</option>
        <option value="3">High</option>
    </select>

    <fieldset>
        <legend>Type</legend>

        <label>
            <input type="radio" name="type" value="1" checked>
            Complaint
        </label>

        <br>

        <label>
            <input type="radio" name="type" value="2">
            Suggestion
        </label>

    </fieldset>

    <label>
        <input type="checkbox" name="terms">
        I agree to the terms and conditions
    </label> -->

    <br>

    <button>Send</button>
</form>
