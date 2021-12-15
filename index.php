 <?php
require_once ('DB.php');

$db = new DB();
$data = $db->viewData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, Initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Search</title>
</head>
<body>
<h1>Live Search</h1>

<form action="search.php" method="post">
<input type="text" name="name" placeholder="Search Here..." id="searchbox" oninput="search()" value="">
</form>
<table>
    <th>
        <td>auftragsnummer</td>
        <td>bezeichnung</td>
        <td>details</td>
        <td >status</td>
    </th>
</table>
<ul id="dataViewer">
    <?php
    foreach ($data as $i) {?>
    <li><?= $i['auftragsnummer']. ' '.$i['bezeichnung']. ' '. $i['details']. ' '. $i['statusId']; ?></li>
    <?php } ?>
</ul>
<script src="main.js"></script>
</body>
</html>