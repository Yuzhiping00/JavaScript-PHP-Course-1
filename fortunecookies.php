<!-- Author:Zhiping Yu, Student number : 000822513  September 24, 2020
    This file is to receive the parameters from user and display the information they required -->
<!DOCTYPE html>
<?php
    $username = filter_input(INPUT_GET, "name", FILTER_SANITIZE_SPECIAL_CHARS); // user's name
    $quantityofcookies = filter_input(INPUT_GET, "quantity", FILTER_VALIDATE_INT); // the number of cookies
    $cookiescolor= filter_input(INPUT_GET, "color",FILTER_SANITIZE_STRING); // color of cookies
    $minvalue = filter_input(INPUT_GET, "minvalue",  FILTER_VALIDATE_INT); // minimum value in fortune numbers 
    $maxvalue = filter_input(INPUT_GET, "maxvalue",  FILTER_VALIDATE_INT); // maximum value in fortue numbers
    // This is an messages array which holds 55 fortune messages 
    $messages = [
    "A beautiful, smart, and loving person will be coming into your life.",
    "A dubious friend may be an enemy in camouflage.",
    "A faithful friend is a strong defense.",
    "A feather in the hand is better than a bird in the air.", 
    "A fresh start will put you on your way.",
    "A friend asks only for your time not your money.",
    "A friend is a present you give yourself.",
    "A gambler not only will lose what he has, but also will lose what he doesn’t have.",
    "A golden egg of opportunity falls into your lap this month.",
    "A good friendship is often more important than a passionate romance.",
    "A good time to finish up old tasks.",
    "A hunch is creativity trying to tell you something.",
    "A lifetime friend shall soon be made.",
    "A lifetime of happiness lies ahead of you.",
    "A light heart carries you through all the hard times.",
    "A new perspective will come with the new year.",
    "A person is never to (sic) old to learn.",
    "A person of words and not deeds is like a garden full of weeds.",
    "A pleasant surprise is waiting for you.",
    "A short pencil is usually better than a long memory any day.",
    "A small donation is call for. It’s the right thing to do.",
    "A smile is your personal welcome mat.",
    "A smooth long journey! Great expectations.",
    "A soft voice may be awfully persuasive.",
    "A truly rich life contains love and art in abundance.",
    "Accept something that you cannot change, and you will feel better.",
    "Adventure can be real happiness.",
    "Advice is like kissing. It costs nothing and is a pleasant thing to do.",
    "Advice, when most needed, is least heeded.",
    "All the effort you are making will ultimately pay off.",
    "All the troubles you have will pass away very quickly.",
    "All will go well with your new project.",
    "All your hard work will soon pay off.",
    "Allow compassion to guide your decisions.",
    "An acquaintance of the past will affect you in the near future.",
    "An agreeable romance might begin to take on the appearance.",
    "An important person will offer you support.",
    "An inch of time is an inch of gold.",
    "Any decision you have to make tomorrow is a good decision.",
    "At the touch of love, everyone becomes a poet.",
    "Be careful or you could fall for some tricks today." ,
    "Beauty in its various forms appeals to you.",
    "Because you demand more from yourself, others respect you deeply.",
    "Believe in yourself and others will too.",
    "Believe it can be done.",
    "Better ask twice than lose yourself once.",
    "Carve your name on your heart and not on marble.",
    "Change is happening in your life, so go with the flow!",
    "Competence like yours is underrated.",
    "Congratulations! You are on your way.",
    "Could I get some directions to your heart?",
    "Courtesy begins in the home.",
    "Courtesy is contagious.",
    "Curiosity kills boredom. Nothing can kill curiosity.",
    "Do not underestimate yourself. Human beings have unlimited potentials."];
    $numbers = [];// an integer array which is used to store 7 integers
    for($i =1; $i<=7; $i++){
        $number = rand($minvalue,$maxvalue); // get an integer from the range randomly
        array_push($numbers,$number); // put an integer into the integer array
    }
    ?>
<html>

<head>
    <meta charset='UTF-8'>
    <title>Fortune Cookies</title>
    <style>
        /* warning message provided to user in case their input is invalid */
        .warning {
                color: red;
            }
        /* heading of the webpage */
        #output{
            margin:0 auto;
            font-size: 30px;
            border:5px solid hotpink;
            width:600px;
            text-align: center;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        #name{
            color:<?=$cookiescolor?>;
            font-size: 40px;
        }
        
        /* the mooncake container */
        #box{
        width:55%;
        margin:0 auto;
        border-radius: 5%;
        border: 1px solid red;
        padding: 15px;
    }
        /* mooncake */
        .mooncake {
        position: relative;
        display: inline-block; 
        width:40px;
        height:40px;
        margin: 10px;
        border:5px dotted burlywood;
        border-radius: 50%;
        background-color: <?=$cookiescolor?>;
        }

        /* mooncake fortune message and lucky numbers */
        .mooncake .information {
            visibility: hidden;
            width: 120px;
            background-color: #FFFFFF;
            color: <?=$cookiescolor?>;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;
            font-size: 20px;
            bottom: 150%;
            margin-left: -60px;
            position: absolute;
            left: 60%;
            z-index: 2;
        }

            /* Show the mooncake fortune message and lucky numbers when you mouse over the tooltip container */
            .mooncake:hover .information {
            visibility: visible;
            opacity: 1;
            }
        
    </style>
</head>

<body>
    <p class="warning">
            <!-- Indicate how to handle users' invalid input -->
            <?php
            if ($username === null) {
                echo "Name not received! ";
            }
            if ($quantityofcookies === false || $quantityofcookies === null|| $quantityofcookies<= 0) {
                echo "number of cookies not received or invalid!<br>";
            }
            if($cookiescolor === null){
                echo "please pick a color for your cookies</br>";
            }
            if ($minvalue === null || $minvalue === false) {
                echo "the minimum of lucky number not received or invalid!<br>";
            }
            if ($maxvalue === null || $maxvalue === false) {
                echo "the maximum of lucky number not received or invalid!<br>";
            }
            ?>
    </p>
    <p id = "output">Happy Mid-Autumn Festival,<span id= "name"> <?= $username ?></span>! Mooncakes are prepared for you~ </p>
    <?php
    for($i=1; $i<=6;$i++){
    echo "<br>";
    }
    ?>
    <div id="box">
        <?php
        for($i=1;$i<=$quantityofcookies;$i++){
        ?>
        <div class="mooncake">
            <?php
            $index = rand(0,count($messages)-1); // randomly get an integer which represents  nth+1 of fortune messages
            $digits=""; // a String represents the 7 fortune numbers
            for($j = 0; $j<count($numbers);$j++){
                if($j===count($numbers)-1){
                    $digits .=$numbers[$j];
                }else{
                    $digits .= $numbers[$j].", ";   // connect numbers with a comma
                    }
            }
            ?>
            <span class="information"><?=$messages[$index]?><?=$digits?>.</span>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>