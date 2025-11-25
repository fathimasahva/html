<?php

$consumer = "";
$kwh = "";
$bill = "";
$from=$_POST['from'];
$to=$_POST['to'];
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Consumer Number
    if (empty($_POST["consumer"])) {
        $error .= "Please enter Consumer Number!<br>";
    } else {
        $consumer = $_POST["consumer"];
    }


    if (empty($_POST["kwh"])) {
        $error .= "Please enter usage in kWh!<br>";
    } else {
        $kwh = $_POST["kwh"];
        if (!is_numeric($kwh) || $kwh < 0) {
            $error .= "kWh must be a valid number!<br>";
            
        }
    }


    if ($error == "") {


        if ($kwh <= 50) {
            $bill = $kwh * 3;
        } elseif ($kwh <= 150) {
            $bill = (50 * 3) + (($kwh - 50) * 4);
        } else {
            $bill = (50 * 3) + (100 * 4) + (($kwh - 150) * 5);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
    <style>
        form { width: 320px; margin: auto; }
        input { width: 100%; padding: 8px; margin: 5px 0; }
        .error { color: red; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Electricity Bill Calculator</h2>

<form method="POST">

    <label>Consumer Number:</label>
    <input type="text" name="consumer" value="">

    <label> unit consumed(kWh):</label>
    <input type="text" name="kwh" value="">

    <label>from:</label>
    <input type="text" name="from" value="">

    <label>to:</label>
    <input type="text" name="to" value="">
    <span class="error"><?= $error ?></span><br>

    <input type="submit" value="Generate Bill">
</form>

<?php if ($bill !== "" && $error == ""): ?>
    <h3 style="text-align:center; color:blue;">
        Consumer Number: <?= $consumer ?>
    </h3>
      

    <h3 style="text-align:center; color:blue;">
        unit consumed: <?= $kwh ?> kWh
    </h3>
        <h3 style="text-align:center; color:purple;">
        from:  <?php echo $from; ?>
    </h3>
        <h3 style="text-align:center; color:purple;">
        to:   <?php echo $to; ?>
    </h3>

    <h3 style="text-align:center; color:green;">
        Total Electricity Bill: ₹<?= $bill ?>
    </h3>
<?php endif; ?>

</body>
</html>

