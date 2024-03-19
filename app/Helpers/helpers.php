<?php

// function formataDataHora($date){
// 	if ( ! $date) 
// 	  {
// 		  return '';
// 	  }
  
// 	  $date = substr($date, 0, 10);
  
// 	  return implode('/', array_reverse(explode('-', $date)));
  
// }

function formataDataHora($data, $format='d/m/Y'){
  return Carbon\Carbon::parse($data)->format($format);
}



