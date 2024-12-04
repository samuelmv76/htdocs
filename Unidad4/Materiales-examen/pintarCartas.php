<?php
    session_start();

    

    function pintar($levanta) {
        $comb = [
            ["copas_03","copas_02","copas_02","copas_03","copas_05","copas_05"],
            ["copas_02","copas_02","copas_05","copas_03","copas_05","copas_03"],
            ["copas_02","copas_03","copas_05","copas_05","copas_03","copas_02"]
        ];
        for ($i=0; $i<6; $i++) {
            if ($i==$levanta) {
                $archivo = $comb[$_SESSION['combinacion']][$i].".jpg";
                echo<<<_END
                    <img src='$archivo'>
                _END;
            } else {
                echo<<<_END
                    <img src='boca_abajo.jpg'>
                _END;
            }
        }
    }
?>