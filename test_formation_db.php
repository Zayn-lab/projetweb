<?php
// Quick DB check for FormationManager
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/Models/FormationManager.php';

echo "<h1>Formation DB Test</h1>\n";
try {
    $mgr = new FormationManager();
    echo "<p><strong>FormationManager constructed.</strong></p>\n";

    // Test getAll()
    $all = $mgr->getAll();
    echo "<h2>getAll()</h2>\n";
    echo "<p>Rows returned: " . count($all) . "</p>\n";
    if (count($all) > 0) {
        echo "<pre>";
        foreach ($all as $f) {
            echo sprintf("ID: %s | Title: %s\n", $f->getId(), htmlspecialchars($f->getTitle()));
        }
        echo "</pre>\n";
    }

    // Test get(1)
    echo "<h2>get(1)</h2>\n";
    $one = $mgr->get(1);
    if ($one) {
        echo "<p>Found formation ID=" . $one->getId() . " Title=" . htmlspecialchars($one->getTitle()) . "</p>\n";
    } else {
        echo "<p>No formation with ID=1 found.</p>\n";
    }

    echo "<p style=\"color:green\">Database access appears to be working if you saw rows or 'Found formation'.</p>\n";
} catch (Throwable $e) {
    echo "<h2 style=\"color:red\">Error</h2>\n";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "\n\n" . htmlspecialchars($e->getTraceAsString()) . "</pre>\n";
    echo "<p>Common issues: wrong DB credentials in `connection.php`, missing database/table `formations`, or SQL errors in the query.</p>\n";
}

echo "<p>FormationManager uses table name: <code>formations</code>. If your table has a different name, edit <code>Models/FormationManager.php</code>.</p>\n";

?>
