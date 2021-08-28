<form action="" method="post">
    <label>
        <input type="radio" name="radio" value="Lock & Key">Lock & Key
    </label>
    <label>
        <input type="radio" name="radio" value="Umbrella Academy">Umbrella Academy
    </label>
    <label>
        <input type="radio" name="radio" value="Stranger Things">Stranger Things
    </label>
    <label>
        <input type="radio" name="radio" value="Ozark">Ozark
    </label>

    <input type="submit" name="submit" vlaue="Get Values">
</form>

<?php
    $str = $_POST['radio'];
    $query = "INSERT INTO users (type) values ('$str')";
    if(isset($_POST['submit'])){
        if(!empty($_POST['radio'])) {
            echo '  ' . $_POST['radio'];
            echo $query;
        }
        else {
            echo 'Please select the value.';
        }
    }
?>