<?php
$name = 'Tim Charlier';
$age = '26';
$family = array(
    'father' => 'Jean-Claude',
    'mother' => 'Marie',
    'sister' => 'Alexandra',
    'brother' => 'Tom',
);
$isHungry = true;
?>


<h1>Aloha <?php echo $name; ?>!</h1>
<p>My age is <?php echo $age; ?> </p>
<p>The first person in my family is <?php echo $family['father']; ?> </p>
<p>Hungry state: <?php echo $isHungry ;?> </p>