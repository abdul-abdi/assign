<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's input
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    // Validate the input
    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Invalid input. Please enter valid numbers.";
    } else {
        // Perform the calculation based on the selected operation
        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                if ($num2 == 0) {
                    $error = "Division by zero is not allowed.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            case "exponentiate":
                $result = pow($num1, $num2);
                break;
            case "percentage":
                $result = ($num1 / $num2) * 100;
                break;
            case "square_root":
                if ($num1 < 0) {
                    $error = "Square root of a negative number is not allowed.";
                } else {
                    $result = sqrt($num1);
                }
                break;
            case "logarithm":
                if ($num1 <= 0 || $num2 <= 0) {
                    $error = "Logarithm of a non-positive number is not allowed.";
                } else {
                    $result = log($num1, $num2);
                }
                break;
            default:
                $error = "Invalid operation selected.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Calculator</h1>
    <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="text" name="num1" placeholder="Enter first number" required>
        <select name="operation">
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="exponentiate">Exponentiation</option>
            <option value="percentage">Percentage</option>
            <option value="square_root">Square Root</option>
            <option value="logarithm">Logarithm</option>
        </select>
        <input type="text" name="num2" placeholder="Enter second number" required>
        <input type="submit" value="Calculate">
    </form>
    <?php if (isset($result)) { ?>
        <p class="result">Result: <?php echo $result; ?></p>
    <?php } ?>
</body>
</html>
