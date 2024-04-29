<?php

namespace App\Services\Api;




class CalculatorService
{
    public function clearenceOfCreatine(int $idade, int $peso, int $creatinina, string $sexo) {
        if($sexo == 'M') {
            $clearence = number_format(((140 - $idade) * $peso) / (72 * ($creatinina / 100)), 2);
        } else {
            $clearence = number_format((((140 - $idade) * $peso) / (72 * ($creatinina / 100)) * 0.85), 2);
        }
        
        return $clearence;

    }
}

