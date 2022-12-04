<?php
    ob_start();
?>
<div class="tableDiv">
    <?php
        if (isset($_SESSION['status']) and $_SESSION['role'] == 'admin') {
            echo '<a сlass="insert" href="insertTable">INSERT</a>';
            if(isset($_SESSION['error'])) {echo '<a>'.$_SESSION['error'].'</a>'; unset($_SESSION['error']);}
        }
    ?>
    <table>
        <thead>
            <tr>
                <th onclick="sortById()" style="cursor:pointer">Id</th>
                <th onclick="sortByName()" style="cursor:pointer">Name</th>
                <th onclick="sortBySurname()" style="cursor:pointer">Surname</th>
                <th onclick="sortByAge()" style="cursor:pointer">Age</th>
                <th onclick="sortByheight()" style="cursor:pointer">Height</th>
                <th onclick="sortByWeight()" style="cursor:pointer">Weight</th>
                <?php
                    if (isset($_SESSION['status']) and $_SESSION['role'] == 'admin') {
                        echo '<th>ACTION</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
            for($i = 0; $i < count($response); ++$i) {
            echo '<tr>' .
                '<td>' . $response[$i]['id'] . '</td>' .
                '<td>' . $response[$i]['name'] . '</td>' .
                '<td>' . $response[$i]['surname'] . '</td>' .
                '<td>' . $response[$i]['age'] . ' y.o.</td>' .
                '<td>' . $response[$i]['height'] . 'cm</td>' .
                '<td>' . $response[$i]['weight'] . 'kg</td>';
                if(isset($_SESSION['status']) and $_SESSION['role'] == 'admin'){
                echo '<td><a class="update" href = "updateTable?' . $response[$i]['id'] . '">UPDATE</a> <a class="delete" href = "deleteTable?' . $response[$i]['id'] . '">DELETE</a></td>';
                }
            echo '</tr>';
            }
        ?>
        </tbody>
        <!-- <tfoot></tfoot> -->
    </table>
</div>
<?php
    $content = ob_get_clean();
    include 'view/templates/main.php';
?>