<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-family: sans-serif;
            background-color: #eee;
            color: #111;
        }

        header {
            position: sticky;
            top: 0;
            left:0;
            width: 100%;
            height: 80px;
            background-color: #111;
            color: #eee;
        }


        h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 3rem;
            margin: 0;
        }

        h2 {
            text-decoration: underline;
            font-size: 2rem;
            margin-left: 2rem;
        }
        p {
            font-size: 1rem;
            margin: 1em;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .nav li a {
            text-decoration: none;
            color: #eee;
            display: none;
        }

        .nav li {
            display: none;
        }

        footer a {
            text-align: center;
        }

        h2{
            margin: 1rem;
        }
        .container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            border: 1px solid black;
        }
        .original {
            color: red;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .new {
            color: green;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .refresh {
            font-size: 2rem;
            overflow: no-wrap;
            background-color: transparent;
            color: #111;
            padding: 0.25rem 0.5rem;
            justify-self: center;
        }

    </style>
</head>
<body>
    <header>
        <h1>Functions</h1>
        <ol class="nav">
            <li><a href="#ex1">Transorm a string</a></li>
            <li><a href="#ex2">Capitalizes the first letter</a></li>
            <li><a href="#ex3">Display date</a></li>
            <li><a href="#e4">Sum of two num</a></li>
            <li><a href="#ex5">Acronymizer</a></li>
            <li><a href="#ex6">Change ae</a></li>
<!--             <li><a href="#ex7">Capitalizes the first letter</a></li>
            <li><a href="#ex8">Capitalizes the first letter</a></li> -->
        </ol>
    </header>
    <main>
        <?php
            $button = '&#9851;'
        ?>
        <div>
            <h2 id="ex1">Transform a string</h2>
            <?php
                $sentence = "According to a researcher (sic) at Cambridge University, it doesn't matter in what order the letters in a word are, the only important thing is that the first and last letter be at the right place. The rest can be a total mess and you can still read it without problem. This is because the human mind does not read every letter by itself but the word as a whole.";
                $words = explode(" ", $sentence);
                function shuffleWord($word) {
                    if (strlen($word) <= 2) {
                        return $word; 
                    }
                    $firstLetter = $word[0];
                    $lastLetter = $word[strlen($word) - 1];
                    $middlePart = substr($word, 1, -1);     
                    $shuffledMiddlePart = str_shuffle($middlePart);
                    $shuffledWord = $firstLetter . $shuffledMiddlePart . $lastLetter;
                    return $shuffledWord;
                }
                for ($i = 0; $i < count($words); $i++) {
                    $words[$i] = shuffleWord($words[$i]);
                }
                
                $shuffledSentence = implode(" ", $words);                    
            ?>
            <div class="container">
                <p class="original">
                    <?php echo $sentence;?>
                </p>
                <p class="refresh" style="text-align:center; font-weight:bold;"> 
                    <?php
                       echo $button;
                    ?>
                </p>
                <p class="new">
                    <?php echo $shuffledSentence;?>
                </p>
            </div>
        </div>
        <div>
            <h2 id="ex2">Capitalize the first letter</h2>
            <?php
            function genWord($length = 8) {
                $char = 'abcdefghijklmnofpqrstuvwxyz';
                $ranWord = '';
                $charLen = strlen($char);
                for ($i = 0; $i < $length; $i++) {
                    $ranWord .= $char[rand(0, $charLen - 1)];
                }
                return $ranWord;
            }

            function capitalizeWord($yay) {
                if (is_string($yay) && strlen($yay) > 0) {
                    return ucfirst($yay);
                } else {
                    return $yay;
                }
            }
            $myRandomWord = genWord();
            $myCapitalizedWord = capitalizeWord($myRandomWord);
            ?>
            <div class="container">
                <p class="original">
                    <?php echo $myRandomWord;?>
                </p>
                <p style="text-align:center;" class="refresh">                    
                 <?php
                    echo $button;
                 ?>
                </p>
                <p class="new">
                    <?php echo $myCapitalizedWord;?>
                </p>
            </div>
        </div>
        <div>
            <h2 id="ex3">Display date</h2>
            <div class="container">
                <?php
                    $fullDate = date('l, F j, Y');
                    $today1 = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
                    $today2 = date("m.d.y");                         // 03.10.01
                    $today3 = date("j, n, Y");                       // 10, 3, 2001
                    $today4 = date("Ymd");                           // 20010310
                    $today5 = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
                    $today6 = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
                    $today7 = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
                    $today8 = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
                    $today9 = date("H:i:s");                         // 17:16:18
                    $today10 = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
                    $today = [$today1, $today2, $today3, $today4, $today5, $today6, $today7, $today8, $today9, $today10];
                    $randomIndex = array_rand($today);
                    $randomDate = $today[$randomIndex]; 
                ?>
                <p class="original"><?php echo $fullDate ?></p>
                <p style="text-align:center;" class="refresh"><?php echo $button;?></p>
                <p class="new"><?php echo $randomDate?></p>
            </div>
        </div>
        <div>
            <h2 id="ex4">Sum of two numbers</h2>
            <div class="container">
                <?php
                    $randomNumber1 = random_int(1,100);
                    $randomNumber2 = random_int(1,100);
                    function sum($randomNumber1, $randomNumber2) {
                        $total = $randomNumber1 + $randomNumber2;
                        return $total;
                    }
                    $result = sum($randomNumber1, $randomNumber2);
                ?>
                <p class="original">
                    <?php echo $randomNumber1 ?> + <?php echo $randomNumber2 ?> = 
                </p>
                <p style="text-align:center;" class="refresh"><?php echo $button;?></p>
                <p class="new">
                    <?php echo $result ?>
                </p>
            </div>
        </div>
        <div>
            <h2 id="ex5">Give acronym</h2>
            <div class="container">
                <?php
                    $techno = array(
                        'API' => 'Application Programming Interfaces',
                        'AJAX' => 'Asynchronous Javascript and XML',
                        'JSON' => 'JavasScript Object Notation',
                        'OOP' => 'Object Oriented Programming',
                        'SQL' => 'Structured Query Language',
                        'ASCII' => 'American Standard Code for Information Interchange',
                        'CAPTCHA' => 'Completely Automated Public Turing Test to tell Computers and Humans',
                        'CSS' => 'Cascading Style Sheets',
                        'DVD' => 'Digital Video Disc',
                        'GUI' => 'Graphical User Interface',
                        'ISO' => 'International Organization For Standardization'
                    );
                    $randomKey = array_rand($techno);
                ?>
                <p class="original"><?php echo $techno[$randomKey] ?> </p>
                <p style="text-align:center;" class="refresh"><?php echo $button;?></p>
                <p class="new"><?php echo $randomKey ?></p>
            </div>
        </div>
        <div>
            <h2 id="ex6">Check for ae and æ</h2>
            <div class="container">
                <?php
                    $randomNum = rand(0, 3);
                    $normal = ["caecotrophie", "chaenichthys", "microsphaera", "sphaerotheca"];
                    $strange = ["cæcotrophie", "chænichthys", "microsphæra", "sphærotheca"];

                    function toStrange($normal, $strange, $randomNum) {
                        if (strpos($normal[$randomNum], "ae") !== false) {
                            return $strange[$randomNum];
                        } else {
                            return $normal[$randomNum];
                        }
                    }

                    function toNormal($normal, $strange, $randomNum) {
                        if (strpos($strange[$randomNum], "æ") !== false) {
                            return $normal[$randomNum];
                        } else {
                            return $strange[$randomNum];
                        }
                    }

                    $normalized = toNormal($strange, $normal, $randomNum);
                    $strangified = toStrange($normal, $strange, $randomNum);

                ?>

                <p class="original"><?php echo $normal[$randomNum]?><br><?php echo $strange[$randomNum]?></p>
                <p style="text-align:center;" class="refresh"><?php echo $button;?></p>
                <p class="new"><?php echo $strangified ?><br><?php echo $normalized ?></p>
            </div>
        </div>
<!--         <div>
            <h2 id="ex7"></h2>
            <div class="container">
                <p class="original"></p>
                <p style="text-align:center;" class="refresh"><?php echo $button;?></p>
                <p class="new"></p>
            </div>
        </div> -->
<!--         <div>
            <h2 id="ex8"></h2>
            <div class="container">
                <input type="checkbox" ></input>
                <input type="checkbox"></input>
                <input type="checkbox"></input>
                <p class="original"></p>
                <p style="text-align:center;" class="refresh"><?php echo $button;?></p>
                <p class="new"></p>
            </div>
        </div> -->
    </main>
    <footer>
        <a href="#ex1">Back to top</a>
    </footer>
</body>
</html>