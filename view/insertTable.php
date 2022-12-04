<?php
    ob_start();
?>
<div class="insertForm">
    <form action="insertToTable" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder='name' required>
        <label for="name">Surname</label>
        <input type="text" name="surname" id="surname" placeholder='surname' required>
        <label for="name">Age</label>
        <input type="number" min = '0' max = '120' name="age" id="age" placeholder='age(whole years)' required>
        <label for="height">Height</label>
        <input type="number" min = '30' max = '250' step="0.1" name="height" id="height" placeholder="height(centimeters)"required>
        <label for="name">Weight</label>
        <input type="number" min='5' max = '200' step="0.1" name="weight" id="weight" placeholder='weight(kg)' required>
        <!-- <div class="buttons_form" style="display:flex;align-items:center;justify-content:center">
            <input onclick="modWindowInsert()" type='button' value="INSERT">
        </div> -->
        <input type="submit" value="INSERT">
    </form>
    <div class="back_Insert">
        <a href="table">---Back---</a>
    </div>
    <?php
        if(isset($_SESSION['error'])) {echo $_SESSION['error']; unset($_SESSION['error']);}
    ?>
</div>
<?php
    $content = ob_get_clean();
    include 'view/templates/main.php';
?>