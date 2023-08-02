<h1>foreach</h1>
<?php
/* EX 1 */
$pronouns = array(
    'I' => 'code', 
    'You' => 'code', 
    'He/She' => 'codes',
    'We' => 'code', 
    'You' => 'code', 
    'They' => 'code'
);


foreach ($pronouns as $key => $value){
	$pronouns[$key] = ucfirst($value);
}
echo '<pre>';
            print_r($pronouns);
            echo '</pre>';;
?>

<h1>while</h1>
<?php
$count = 1;

while ($count <= 120)
    {
        echo "<span style='max-width: 100vw;'>" . $count . " - </span>";
        $count++;
    }
?>

<h1>for</h1>
<?php
$i = 1;

for($i = 1 ; $i <= 120 ; $i ++) 
    {
        echo "<span style='max-width: 100vw;'>" . $i . " - </span>";
    }
?>


<h1>foreach hamilton</h1>
<?php

$students = ['Cedric', 'Youssef', 'Pauline', 'Camille', 'Pietro', 'Sam', 'Robin', 'etc'];


foreach ($students as $key => $value){
	$students[$key] = ucfirst($value);
}
echo '<pre>';
            print_r($students);
            echo '</pre>';;
?>