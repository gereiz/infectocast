<?php

function formataDataHora($data, $format='d/m/Y'){
  return Carbon\Carbon::parse($data)->format($format);
}

function formataMoeda($valor){
  return number_format($valor, 2, ',', '.');
}

