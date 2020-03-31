<?php
// Output devs to HTML
function showDevs(){
  global $devs;

  foreach($devs as $dev){
    echo '<div type="submit" class="dev-card" name="'.$dev->github.'"></div>';
  }
}
