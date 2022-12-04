<?php
    ob_start();
?>
<div class="deleteForm">
    <?php
        if(isset($_SESSION['error'])) {echo $_SESSION['error']; unset($_SESSION['error']);}
    ?>
    <form action=<?php echo '"deleteInTable?'.$element['id'].'"'?> method="post">
        <label for="Id">ID</label>
        <input type="text" name="Id" id="Id" placeholder=<?php echo $element['id']?> value = <?php echo $element['id']?> required disabled>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder=<?php echo $element['name']?> value = <?php echo $element['name']?> required disabled>
        <label for="name">Surname</label>
        <input type="text" name="surname" id="surname" placeholder=<?php echo $element['surname']?> value = <?php echo $element['surname']?> required disabled>
        <label for="name">Age</label>
        <input type="number" min = '0' max = '120' name="age" id="age" placeholder=<?php echo '"'.$element['age'].' y.o."'?> value = <?php echo '"'.$element['age'].' y.o."'?> required disabled>
        <label for="height">Height</label>
        <input type="number" min = '30' max = '250' name="height" id="height" step="0.1" placeholder=<?php echo '"'.$element['height'].'cm"'?> value = <?php echo '"'.$element['height'].'cm"'?> required disabled>
        <label for="name">Weight</label>
        <input type="number" min='5' max = '200' name="weight" step="0.1" id="weight" placeholder=<?php echo '"'.$element['weight'].'kg"'?> value =<?php echo '"'.$element['weight'].'kg"'?> required disabled>
        <div class="buttons_form" style="display:flex;align-items:center;justify-content:center">
            <input onclick="modWindowDelete()" type='button' value="DELETE">
        </div>
    </form>
    <div class="back_Insert">
        <a href="table">---Back---</a>
    </div>
</div>
<?php
    $content = ob_get_clean();
    include 'view/templates/main.php';
?>