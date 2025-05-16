<?php
//  foreach ($_POST as $key=>$val){
//         echo "key: {$key}-{$val}<br>";
//     }

        $text = $_POST['input']; 
        $db = new PDO('pgsql:host=localhost;port=5432;dbname=postgres;','postgres','mywindow');
        $sql = $db->prepare("select id,tree_count,ST_AsGeoJSON(geom) as geom from roads where tree_count <= :x ");
        $sql->execute(["x"=>$text]);

        $features = [];
        $tableRows = [];
        
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $feature = ['type' => "Feature"];
            $feature['geometry'] = json_decode($row['geom']);
            unset($row['geom']);
            $feature['properties'] = $row;
        
            // For the table (return clean data, not HTML here)
            $tableRows[] = $row;
            $features[] = $feature;
        }
        
        $featureCollection = ['type' => "FeatureCollection", 'features' => $features];
        
        echo json_encode([
            'tableData' => $tableRows,
            'geojson' => $featureCollection
        ]);
?>
