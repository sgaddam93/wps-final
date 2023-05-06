<?php
// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("<div style='color:red;'>Connection failed: " . mysqli_connect_error() . "</div>");
}

// check if form was submitted
if (isset($_POST['submit'])) {
    // get form data
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // insert data into database
    $sql = "INSERT INTO groceries (item_name, quantity, price) VALUES ('$item_name', '$quantity', '$price')";
    if (mysqli_query($conn, $sql)) {
        echo "<div style='color:green;'>New record created successfully</div>";
    } else {
        echo "<div style='color:red;'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
    }
}

// retrieve data from database
$sql = "SELECT * FROM groceries";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table>";
    echo "<tr><th>Item Name</th><th>Quantity</th><th>Price</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["item_name"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["price"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<div style='color:red;'>No records found</div>";
}

// close database connection
mysqli_close($conn);
?>

<!-- create HTML form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label for="item_name">Item Name:</label>
    <input type="text" name="item_name"><br>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity"><br>
    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price"><br>
    <input type="submit" name="submit" value="Add" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
</form>

<style>
    form {
        width: 500px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"] {
        padding: 5px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
        width: 100%;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: light blue;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover
{
background-color: #3e8e41;
}
</style>

<!-- add some cosmetic in HTML form -->
<div style="background-color: #f2f2f2; padding: 20px; border-radius: 5px;">
    <h2 style="text-align: center;">Super market invotory</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<title>Button Example</title>
	<style>
		/* CSS for the button */
		.button {
			background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 4px;
		}

		/* CSS for when the button is hovered over */
		.button:hover {
			background-color: #45a049;
		}
	</style>
	
</head>
</html>
