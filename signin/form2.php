<!-- https://www.youtube.com/watch?v=Y9yE98etanU Save HTML Form Data to a MySQL Database using PHP -->
<form action="update_form.php" method="post" enctype="multipart/form-data">

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>">

    <label for="country">Country</label>
    <input type="text" id="country" name="country" value="<?php echo $row['country'] ?>">

    <label for="description">Description</label>
    <textarea id="description" name="description" placeholder="<?php echo $row['description'] ?>"></textarea>

    <label for="price">Price</label>
    <input type="number" id="price" name="price" value="<?php echo $row['price'] ?>">
    
    <label for="discount_price">Discount Price</label>
    <input type="number" id="discount_price" name="discount_price" value="<?php echo $row['discount_price'] ?>">

    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

    <label for="image">Image</label>
    <input type="file" id="image_<?php echo $row['id']; ?>" name="image" accept="image/*" onchange="previewImage(event, 'imagePreviewUpdate_<?php echo $row['id']; ?>')">
    <br>
    <img style="margin-top: 15px; display: none;" src="#" id="imagePreviewUpdate_<?php echo $row['id']; ?>" alt="Image Preview">

    <img style="margin-top: 15px;border: 3px solid #11c4e2;" src="<?php echo './assets/images/'.($row['image'] ? $row['image'] : 'placeholder image by placehold.co website.png'); ?>" alt="Image Placeholder">

    <br>

    <button>Update</button>
    <button class="delete" type="submit" name="delete">Delete</button>

</form>



<script>
function previewImage(event, previewId) {
    var imagePreview = document.getElementById(previewId);
    imagePreview.style.display = 'block';
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
}
</script>
