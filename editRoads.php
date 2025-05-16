<?php
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = -99999; // Make sure this is an actual integer
}

try {
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=postgres;', 'postgres', 'mywindow');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $db->prepare("SELECT id, tree_count, scenic_rating FROM roads WHERE id = :id");
    $sql->execute(['id' => $id]);

    $row = $sql->fetch(PDO::FETCH_ASSOC);
    echo json_encode($row);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
