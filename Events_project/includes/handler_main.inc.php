<?php

declare(strict_types=1);

require_once 'includes/dbh.inc.php';

function display_events(){
    try {
        $query = "SELECT * FROM events_1try";
    
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
    
            <div class="event-card">
                <div class="event-title"><?php echo $row['name']?></div>
                <div class="event-date"><?php echo $row['date']?></div>
                <div><?php echo $row['location']?></div>
                <div class="event-description">
                <?php echo $row['description']?>
                </div><?php
        }
    } catch (PDOException $e) {
        die("Querry failed: " . $e->getMessage());
    }
}
