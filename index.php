<?php

require('class/TimeTravel.php');

// ------- TEST 1 --------------
$start = new DateTimeImmutable(); // now
$end = new DateTime('-3 years -5 days');
$timeTravel = new \Wcs\TimeTravel($start,$end);

?>
    <h2>Etape n°1 :</h2>
<p><?php
echo $timeTravel->getTravelInfo();
    ?></p><?php

// ---------- TEST 2 ---------------
$timeTravel= new \Wcs\TimeTravel();
$start = new DateTimeImmutable('1985-12-31');
$timeTravel->setStart($start);
?><h2>Etape n°2 : </h2><p><?php
echo 'Doc est en ce moment même en '. $timeTravel->findDate('-1000000000 seconds');
?></p><?php

// -------- TEST 3 ------------
$timeTravel= new \Wcs\TimeTravel($end,new DateTime());

?><h2>Etape 3:</h2><?php
$data = $timeTravel->backToFutureStepByStep('P1M8D');
?><p>Liste des sauts :</p>
<ul><?php



foreach($data as $date){
    echo '<li>'.$date."</li>";
}?>
</ul>
