<?php

class IpkHelper
{
  public static function generateRandom($min = 0.0, $max = 4.0)
  {
    $random = $min + mt_rand() / mt_getrandmax() * ($max - $min);

    return round($random, 2);
  }
}
