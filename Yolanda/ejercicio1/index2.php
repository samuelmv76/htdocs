<?php
//function create3DArray() {
    $oxo = array(
        array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9)
        ),
        array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9)
        ),
        array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9)
        )
    );
//}
//function create2DArrayNames() {
    $names = ["personas"=>[
            "nombre"=>"Yolanda", "apellidos"=>"Perez", "edad"=>18
        ]
    ];
//}

//create3DArray();
//create2DArrayNames();

echo $oxo[0][1][0];
echo $names["personas"]["apellidos"];

?>