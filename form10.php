

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<br>
<div class="container">
    <?php
    $Data = [
        "John Smith" => ["Jenny Smith", "Pearl Smith", "Luca Smith"],
        "Claire Temple" => ["Enrique Clark", "Paul Clark"]
    ];

    if (isset($_POST['submit'])) {
        $parent_name = $_POST['parent_name'];
        $children_name = $_POST['children_name'];

        if (array_key_exists($parent_name, $Data)) {
            if (in_array($children_name, $Data[$parent_name])) {
                echo "Found  <br>";
            } else {
                echo "Not Found <br>";
            }
        } else {
            echo "Not Found <br>";
        }
    }
    ?>
<br>
<div class="container">
    <table class="table table-bordered">
        <thead >
            <tr>
                <th>Parent Name</th>
                <th>Children's Names</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Smith</td>
                <td>Jenny Smith, Pearl Smith, Luca Smith</td>
            </tr>
            <tr>
                <td>Claire Temple</td>
                <td>Enrique Clark, Paul Clark</td>
            </tr>
        </tbody>
    </table>
    <div class="container w-50">
        <br>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="parent_name" placeholder="Parent Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="children_name" placeholder="Children Name">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
