<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(
    DB_HOST,
    DB_NAME,
    DB_USERNAME,
    DB_PASSWORD
);

$records = fetchAll($db);
?>

<html>
    <head>
        <title>Select all from MYSQL table</title>
    </head>
    <body>
        <h1>A simple table from docker in motion</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Description</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        if(count($records) > 0):
            foreach($records as $record): ?>
               <tr>
                   <td><?php echo $record->id; ?></td>
                   <td><?php echo $record->first_name; ?></td>
                   <td><?php echo $record->last_name; ?></td>
                   <td><?php echo $record->description; ?></td>
                   <td><?php echo $record->age; ?></td>
                   <td><a href="delete.php?id=<?php echo $record->id;?>">Delete</a></td>
               </tr>
        <?php endforeach;

        else: ?>
            <tr>
                <td colspan="5">Cannot find any records</td>
            </tr>
        <?php endif ?>
        </tbody>
    </table>
    </body>
</html>

