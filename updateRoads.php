<?php
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = -99999;
}

if (isset($_POST['tree_count']) && is_numeric($_POST['tree_count'])) {
    $treeCount = $_POST['tree_count'];
} else {
    $treeCount = -99999;
}

if (isset($_POST['scenic_rating']) && is_numeric($_POST['scenic_rating'])) {
    $scenicRating = $_POST['scenic_rating'];
} else {
    $scenicRating = -99999;
}

try {
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=postgres;', 'postgres', 'mywindow');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $db->prepare("UPDATE roads SET tree_count = :tc, scenic_rating = :sr WHERE id = :id");
    $params = ["tc" => $treeCount, "sr" => $scenicRating, "id" => $id];

    if ($sql->execute($params)) {
        echo json_encode(["status" => "success", "message" => "$id successfully updated"]);
    } else {
        echo json_encode(["status" => "error", "message" => $sql->errorInfo()]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "exception", "message" => $e->getMessage()]);
}
?>
