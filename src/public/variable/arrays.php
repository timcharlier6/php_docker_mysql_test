<?php
$myArray = ['father','mother','brother','sister'];
$myRecipes = ['honey pie', 'onion soup', 'couscous'];
$myMovies = ['2001', 'Stalker', 'Koyanisqatsi'];
$me = ['gaming', 'reading', 'coding'];
$mother = ['watching movies', 'reading', 'cooking'];
$me['mother'] = $mother;
$me['newhobby'] = 'Taxidermy';
$myArray[0] = 'JC';
$web_development = array(
    'frontend' => [],
    'backend' => [],
);
$web_development['frontend'][0] = 'html';
$web_development['frontend'][1] = 'css';
$web_development['frontend'][2] = 'js';
$web_development['backend'][0] = 'php';
$web_development['backend'][1] = 'sql';
?>
<html>
    <body>
        <ol>
            <li>Web dev : <?php print_r($web_development)?></li>
            <li>Family : <?php print_r($myArray)?></li>
            <li>Recipes: <?php print_r($myRecipes)?></li>
            <li>Movies: <?php print_r($myMovies)?></li>
            <li>Favorite Movie: <?php print_r($myMovies[2])?></li>
            <li>Using 'pre' syntax: <?php echo '<pre>';
            print_r($myArray);
            echo '</pre>'; ?></li>
            <li>Using var_dump syntax: <?php  var_dump($myArray); ?></li>
            <li>Nested array:<?php echo '<pre>';
            print_r($me);
            echo '</pre>'; ?></li>
        </ol>

    </body>
</html>