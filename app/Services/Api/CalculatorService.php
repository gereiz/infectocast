<?php

namespace App\Services\Api;




class CalculatorService
{   
    public function clearenceOfCreatine($idade,  $peso, $creatinina, $sexo) {
        if($sexo == 'Masc.') {
            $clearence = number_format(((140 - $idade) * $peso) / (72 * ($creatinina / 100)), 2);
        } else {
            $clearence = number_format((((140 - $idade) * $peso) / (72 * ($creatinina / 100)) * 0.85), 2);
        }
        
        return $clearence;

    }
}

