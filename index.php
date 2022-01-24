<?php
    include_once 'scripts/db.php';
?>


<!doctype html>
<html lang="en">
<head>
    <title>Inventory</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
</head>


<body>
    <div class="table-db">
        <table class="database">
            <tr>
                <th class="database-th">Product ID</th>
                <th class="database-th">Quantity</th>
                <th class="database-th">Name</th>
                <th class="database-th">Description</th>
                <th class="database-th">Choose Item</th>
            </tr>

            <?php
            $sql = "SELECT * FROM inventoryList";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                    $id = $row["prod_id"];
                    echo "<tr onclick='displayData(this);'><td>" . $row["prod_id"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . "<input name='radAnswer' type='radio' id='select' value='<?php echo htmlspecialchars($id); ?>'>" . "</td></tr>";
                }
            }
            else {
                echo "No Results";
            }
            // $conn->close();  
            ?>
            
        </table>
    </div>

    
    <div class="buttons">
        <div class="operation">
            <label for="fname" id="label-operation">Operation: None Selected</label>
            <!-- <input type="text" id="operation" name="operation"> -->
        </div>

        <div>
            <button class="button" type="button" onclick="deleteData()">Delete</button>
            <button class="button" type="button" onclick="insertData()">Insert</button>
            <button class="button" type="button" onclick="updateData()">Edit/Update</button>
        </div>
    </div>

    
    <form class="form1" action="scripts/commit.php" method="POST">
        <table class="display-selected">
        <tbody>
            <tr>
            <td>Product ID: <br>
                <input readonly class="data" type="text" id="prod_id" name="prod_id" value=""/>
            </td>
            <td>Quantity: <br>
                <input readonly class="data" type="text" id="quantity" name="quantity" value=""/>
            </td>
            <td>Name: <br>
                <input readonly class="data" type="text" id="name" name="name" value=""/>
            </td>
            <td>Description: <br>
                <input readonly class="data" type="text" id="description" name="description" value=""/>
            </td>
            </tr>
        </tbody>
        </table>

        <input type="hidden" id="operation" name="operation" value=""/>

        <div class="submitButton">
            <input type="submit" name="submit" onclick="return commitData()" value="Commit"/>
        </div>
    </form>
    

    <form class="form2" action="scripts/generate_csv.php" method="POST">
        <input type="submit" name="submit" value="Export to CSV"/>
    </form>


    <form class="form2" action="scripts/generate_pdf.php" method="POST">
        <input type="submit" name="submit" value="Export to PDF"/>
    </form>


    <!-- JavaScript -->
    <script src="scripts/index.js"></script>
    
    
</body>
</html>