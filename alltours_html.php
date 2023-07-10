<div id="alltours" class="main">
  
    <ul class="cards">
        <!-- https://phpdelusions.net/mysqli_examples/prepared_select -->
        <?php if ($data): ?>

            <?php foreach($data as $row): ?>

                <li class="cards_item">
                <div class="card">
                <div class="card_image"><img src="<?= 'signin/assets/images/' . $row['image'] ?>"></div>
                    <div class="card_content">
                    <h2 class="card_title"><?= $row['name'] ?></h2>
                    <h2 class="card_title2"></h2>
                    <?php
                        // $text = addslashes($row['description']);
                        // $text = str_replace("'", "\\'", $row['description']);
                        // $text = addslashes($text);
                        // var_dump($text);
                        $text =  $row['description'];
                        $textLength = strlen($text);
                        $truncatedText = substr($text, 0, 100);
                    ?>
                    <?php if ($textLength > 100): ?>
                        <p class="card_text" id="card_text"><?php echo $truncatedText; ?> <span id="card_text_ellipsis">...</span></p>

                        <!-- In this code, we use json_encode() to properly encode the value of $text and ensure it's formatted as a valid JavaScript string. Then, htmlspecialchars() is used to escape any special characters in the encoded string, ensuring it won't cause issues with the JavaScript syntax.The htmlspecialchars() function is used with the ENT_QUOTES flag to escape both single quotes and double quotes, making the output safe for being included in HTML attributes. -->
                        <button class="btn card_btn" id="read_more_button" onclick="showFullText(this,<?php echo htmlspecialchars(json_encode($text), ENT_QUOTES, 'UTF-8'); ?>)">Read More</button>
                    <?php endif; ?> 
                </div>
                </div>
                </li>

            <?php endforeach ?>

        <?php endif ?>

    </ul>

</div>

