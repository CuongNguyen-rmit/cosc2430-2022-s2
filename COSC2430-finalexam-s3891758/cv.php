<?php
session_start();

function cmp($a, $b)
{
    return strtotime($a['yearS']) - strtotime($b['yearE']) < 0 ? 1 : -1;
}

function read()
{
    $file_name = 'cv.csv';
    $fp = fopen($file_name, 'r');
    $jobs = array();
    $unis = array();
    $title = array('type', 'title', 'place', 'yearS', 'yearE');
    while ($line = fgetcsv($fp, 0, ",")) {

        if ($line[0] == 'edu') {
            $i = 0;
            $uni = [];
            foreach ($title as $t) {
                $uni[$t] = $line[$i];
                $i++;
            }
            array_push($unis, $uni);
        } else if ($line[0] == 'exp') {
            $i = 0;
            $job = [];
            foreach ($title as $t) {
                $job[$t] = $line[$i];
                $i++;
            }
            array_push($jobs, $job);
        }
    }

    usort($unis, 'cmp');
    usort($jobs, 'cmp');
    $_SESSION['unis'] = $unis;
    $_SESSION['jobs'] = $jobs;
    fclose($fp);
}



read();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cuong CV</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="main">
        <img src="download.png" id="profile_image" alt="cv image" />
        <div id="info">
            <h1>Nguyen Nam Cuong</h1>
            <h1 id="phone">0867906268</hq>
                <h1 id="email">s3891758@rmit.edu.vn</h1>
        </div>
    </div>
    <div id="experience">
        <h2>Experience</h2>
        <dl>
            <?php
            foreach ($_SESSION['jobs'] as $j) {

                echo "<dt><h4>" . $j['title'] . "</h4></dt>";
                echo "<dd>" . $j['place'] . ':' . $j['yearS'] . '-' . $j['yearE'] . "</dd>";
            }
            ?>
        </dl>
    </div>
    <div id="education">
        <h2>Education</h2>
        <?php
        ?>
        <dl>
            <?php
            foreach ($_SESSION['unis'] as $u) {

                echo "<dt><h4>" . $u['title'] . "</h4></dt>";
                echo "<dd>" . $u['place'] . ':' . $u['yearS'] . '-' . $u['yearE'] . "</dd>";
            }
            ?>
        </dl>
    </div>
    <input type="checkbox" id="hideEmail">
    <label for="hideEmail">Hide Email</label><br>
    <input type="checkbox" id="hidePhone">
    <label for="hidePhone"> Hide Phone</label><br>
    <script src="script.js"></script>
</body>

</html>