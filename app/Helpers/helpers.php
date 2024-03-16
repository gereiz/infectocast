<?php

function formataDataHora($data, $format='d/m/Y'){
  return Carbon\Carbon::parse($data)->format($format);
}



