<?php
session_start();
function read()
{
    $file_name = 'football.csv';
    $fp = fopen($file_name, 'r');
    $first = fgetcsv($fp); // read first
    $first  = ['name', 'score', 'point'];
    $teams = array();
    while ($line = fgetcsv($fp, 0, ",")) {
        $score1 = (int)explode('-', $line[3])[0];
        $score2 = (int)explode('-', $line[3])[1];
        $point1 = 0;
        $point2 = 0;
        if ($score1 > $score2) {
            $point1 = 3;
        } else if ($score2 > $score1) {
            $point2 = 3;
        } else {
            $point1 = 1;
            $point2 = 1;
        }

        $team1 = array('name' => $line[2], 'score' => $score1, 'point' => $point1);
        $team2 = array('name' => $line[2], 'score' => $score2, 'point' => $point2);
        if (isset($teams[$team1['name']])) {
            $teams[$team1['name']]['score'] += $score1;
            $teams[$team1['name']]['point'] += $point1;
        } else {
            $teams[$team1['name']] = $team1;
        }

        if (isset($teams[$team2['name']])) {
            $teams[$team2['name']]['score'] += $score2;
            $teams[$team2['name']]['point'] += $point2;
        } else {
            $teams[$team2['name']] = $team2;
        }
    }
    $_SESSION['teams'] = $teams;
    fclose($fp);
}

function compareScore($a, $b)
{
    if (isset($a->score) && isset($b->score)) {
        return $a->score > $b->score ? 1 : -1;
    }
    return -1;
}

function comparePoint($a, $b)
{
    if (isset($a->point) && isset($b->point)) {
        return $a->point < $b->point ? 1 : -1;
    }
    return 1;
}
read();
$title = '';
$result = array();
if (isset($_GET['perform']) && ($_GET['perform'] == '1')) {
    $title = 'best score';
    usort($_SESSION['teams'], 'compareScore');
    $i = 0;
    foreach ($_SESSION['teams'] as $t) {
        if ($i >= 10) {
            break;
        } else {
            array_push($result, $t);
        }
    }
} else {
    $title = 'best leaders';
    usort($_SESSION['teams'], 'comparePoint');
    $i = 0;
    foreach ($_SESSION['teams'] as $t) {
        if ($i >= 10) {
            break;
        } else {
            array_push($result, $t);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <?php print_r($result); ?>
</body>

</html>