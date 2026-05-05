<?php

$score = 0;


$correctAnswers = array(
    "answer1" => "24 hours",
    "answer2" => "water",
    "answer3" => "Muscles",
    "answer4" => "length",
    "answer5" => "larger than"
);

foreach ($correctAnswers as $question => $correctAnswer) {

   
    if (isset($_POST[$question])) {

        if ($_POST[$question] == $correctAnswer) {
            $score++;
        }
    }
}

echo "<h1>Science Class Quiz Result</h1>";
echo "<p>Your Score is $score out of 5.</p>";

?>