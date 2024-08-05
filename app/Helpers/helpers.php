<?php

function formataDataHora($data, $format='d/m/Y'){
  return Carbon\Carbon::parse($data)->format($format);
}

// formata timestamp para data
function formataData($data, $format='d/m/Y'){
  return Carbon\Carbon::createFromTimestamp($data)->format($format);
}

function formataMoeda($valor){
  return number_format($valor, 2, ',', '.');
}

