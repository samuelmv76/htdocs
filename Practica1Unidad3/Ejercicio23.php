<?php
$familias = [
    "Los Simpson" => [
        "padre" => "Homer Simpson",
        "madre" => "Marge Simpson",
        "hijos" => [
            "Bart Simpson",
            "Lisa Simpson",
            "Maggie Simpson"
        ]
    ],
    "Los Griffin" => [
        "padre" => "Peter Griffin",
        "madre" => "Lois Griffin",
        "hijos" => [
            "Meg Griffin",
            "Chris Griffin",
            "Stewie Griffin"
        ]
    ]
];

echo "<ul>";
foreach ($familias as $familia => $miembros) {
    echo "<li><strong>$familia</strong>";
    echo "<ul>";
    echo "<li><strong>Padre:</strong> ", $miembros["padre"], "</li>";
    echo "<li><strong>Madre:</strong> ", $miembros["madre"], "</li>";
    echo "<li><strong>Hijos:</strong>";
    echo "<ul>";
    foreach ($miembros["hijos"] as $hijo) {
        echo "<li>$hijo</li>";
    }
    echo "</ul></li>"; 
    echo "</ul></li>"; 
}
echo "</ul>";
?>