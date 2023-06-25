<!-- https://www.youtube.com/watch?v=Y9yE98etanU Save HTML Form Data to a MySQL Database using PHP -->
<form action="process_form.php" method="post" enctype="multipart/form-data">

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

    <label for="image">Image</label>
    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">

    <br>
    
    <img id="imagePreview" src="#" alt="Image Preview" style="display: none;">

    <br>

    <button>Upload</button>
</form>

<script>
function previewImage(event) {
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.style.display = 'block';
    // imagePreview.style.margin = 'auto';
    // imagePreview.style.width = '100%';
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
}
</script>

