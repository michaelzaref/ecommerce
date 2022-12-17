<?php

function get_words($sentence, $count =10 ) {
    preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
    echo $matches[0];
  }
  ?>