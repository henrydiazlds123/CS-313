<?php
function add_poll($filename, $value)
{
    $fp = fopen("$filename", "a");
    fwrite($fp, "$value\n");
    fclose($fp);
}
function read_Array($pollFile, $question)
{
    $votes = array();
    $lines = file("$pollFile", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // foreach ($lines as $line_num => $line) {
    //     $line = rtrim($line);
    //     $votes[$line_num] = htmlspecialchars($line);
    $votes = $lines[$question];
    //}
    $votes = explode(",", $votes);
    return $votes;
}
function readCSV($filename)
{
    $file_handle = fopen($filename, 'r');
    while (!feof($file_handle)) {
        $line_of_text[] = fgetcsv($file_handle, 1024);
    }
    fclose($file_handle);
    //echo "<pre>";
    //print_r($line_of_text);
    return $line_of_text;
}
function cnt($filename)
{
    $test = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $cnt = (count($test));

    return $cnt;
}

function printPoll($poll, $question)
{
    $cnt = cnt($poll);
    $csv = readCSV($poll);
    $answers = count($csv[0]);
    //echo $answers;
    $questions = read_Array('answers.txt', $question);

    $cntQ[] = 0;

    foreach ($csv as $item) {
        for ($i = 0; $i<$answers; $i++) {
            $cntQ[$i+1] += $item[$i];
        }
    }
    echo "<div class='col-md-6'>
                <div class='box'>
                    <header>
    <h3>$questions[0]</h3>
    </header>
<section>
    ";
    for ($i = 1; $i<$answers+1; $i++) {
        $percent = decimals($cntQ[$i], $cnt);
        echo "$questions[$i]: $cntQ[$i] votes<br>    
        <div class='progress'>
               <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:$percent%'>$percent%
               </div>
            </div>";
        }
            echo"</section>
                </div>
            </div>";
    
}

function decimals($value, $cnt)
{
    $percent = $value/$cnt*100;
    $formatted = number_format($percent, 2, '.', '');

    return $formatted;
}
