<?php

for ($i = 1; $i < 4; $i++) {
  print "Enter student name :";
  fscanf(STDIN, "%s", $name);
  print "Enter English Mark :";
  fscanf(STDIN, "%d", $english);
  print "Enter Tamil Mark :";
  fscanf(STDIN, "%d", $tamil);
  print "Enter Maths Mark :";
  fscanf(STDIN, "%d", $maths);
  print "Enter Physics Mark :";
  fscanf(STDIN, "%d", $physics);
  print "Enter  Chemistry Mark :";
  fscanf(STDIN, "%d", $chemistry);
  _roll_no_creation();
  $fp = fopen('prog.csv', 'a+') or die("couldn't append the file");

  fputcsv($fp, array($name, $roll_no[$i], $english, $tamil, $maths, $physics, $chemistry));
  }

_read_over_all_student_mark_list_from_csv();

function _roll_no_creation() {
    global $roll_no;
    $roll_no = range(8807657470, 8807657485);
    return $roll_no;
}

function _read_over_all_student_mark_list_from_csv() {
    global $directory;
    global $count;
    $fp = fopen('prog.csv', 'r') or die("could not open file");

    while (!feof($fp)) {
        $directory[] = fgetcsv($fp, ',');
    }
    $count = count($directory) - 1;
}

print "Total no.of student :" . $count . "\n";

print "Enter roll_no for getting student details :";
fscanf(STDIN, "%d", $number);

for ($i = 0; $i < $count; $i++) {

    if ($number == $directory[$i][1]) {
        $mark = "English :" . $directory[$i][2] . "tamil :" . $directory[$i][3] . "maths :" . $directory[$i][4] . "physics :" . $directory[$i][5] . "chemistry :" . $directory[$i][6];

        print $mark . "\n";
    }
}
_student_total_mark_calculation($number, $directory, $count);

print "Total Mark :" . $total . "\n";
for ($i = 0; $i < $count; $i++) {
    if ($number == $directory[$i][1]) {
        $tot_avg = $directory[$i][2] + $directory[$i][3] + $directory[$i][4] + $directory[$i][5] + $directory[$i][6];
        $subject = count($tot_avg);
        $average = ($tot_avg / 5);
        print "Average". $average . "\n";
    }
}

print "Failed student of each subject and average" . "\n";
_english_failed_student($count, $directory);
print "Failed student in english :" .count($english) ."\n";

_tamil_failed_student($count, $directory);
print "Failed student in tamil :" . count($tamil) . "\n";

_maths_failed_student($count, $directory);
print "Failed student in maths :" . count($maths) . "\n";

_physics_failed_student($count, $directory);
print "Failed student in physics :" . count($physics). "\n";

_chemistry_failed_student($count, $directory);
print "Failed student in chemistry :" .count($chemistry) . "\n";



function _english_failed_student($count, $directory) {
    global $english;
    for ($i = 0; $i < $count; $i++) {
        if ($directory[$i][2] < 35) {
            $english[] = $directory[$i][0] . $directory[$i][2];
        }
    }
    if ($directory[$i][2] > 35) {
        return false;
    }
}

function _tamil_failed_student($count, $directory) {
    global $tamil;
    for ($i = 0; $i < $count; $i++) {
        if ($directory[$i][3] < 35) {

            $tamil[] = $directory[$i][0] . $directory[$i][3];
        }
    }
    if ($directory[$i][3] > 35) {

        return false;
    }
}

function _maths_failed_student($count, $directory) {
    global $maths;
    for ($i = 0; $i < $count; $i++) {
        if ($directory[$i][4] < 35) {

            $maths[] = $directory[$i][0] . $directory[$i][4];
        }
    }

    if ($directory[$i][4] > 35) {

        return false;
    }
}

function _physics_failed_student($count, $directory) {
    global $physics;
    for ($i = 0; $i < $count; $i++) {
        if ($directory[$i][5] < 35) {

            $physics[] = $directory[$i][0] . $directory[$i][5];
        }
    }


    if ($directory[$i][5] > 35) {

        return false;
    }
}

function _chemistry_failed_student($count, $directory) {
    global $chemistry;
    for ($i = 0; $i < $count; $i++) {
        $chemistry = array();
        if ($directory[$i][6] < 35) {

            $chemistry[] = $directory[$i][0] . $directory[$i][6];
        }
    }
    if ($directory[$i][6] > 35) {

        return false;
    }
}

function _student_total_mark_calculation($number, $directory, $count) {
    global $total;

    for ($i = 0; $i < $count; $i++) {

        if ($number == $directory[$i][1]) {

            $total = $directory[$i][2] + $directory[$i][3] + $directory[$i][4] + $directory[$i][5] + $directory[$i][6];

            return $total;
        }
    }
}

?>
