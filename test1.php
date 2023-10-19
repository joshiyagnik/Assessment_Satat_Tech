<?php
   $cardTypes = ['C', 'H', 'D', 'S'];
   $cardRanks = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
   
   $deck = [];
   foreach ($cardTypes as $type) {
       foreach ($cardRanks as $rank) {
           $deck[] = [$type, $rank];
       }
   }
   
   echo "Total cards by type and rank in ascending order:";
   foreach ($deck as $card) {
       echo $card[0] . $card[1] . "\n";
   }
   
   echo "Total cards by type and rank in descending order:";
   for ($i = count($deck)-1; $i >= 0; $i--) {
       echo $deck[$i][0] . $deck[$i][1] . "\n";
   }
   
   shuffle($deck);
   
   echo "Shuffled cards:";
   foreach ($deck as $card) {
       echo $card[0] . $card[1] . "\n";
   }   
?>