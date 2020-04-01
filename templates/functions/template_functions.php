<?php
// Output devs to HTML
function showDevs(){
  global $devs;

  foreach($devs as $dev){
    echo '<div class="dev-card" name="'.$dev->github.'"></div>';
  }
}
