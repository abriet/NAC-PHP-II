<?php


function criar_mesagem($msg){
  return  base64_encode($msg);
}

function ver_mesagem($msg){
  return  base64_decode($msg);
}
