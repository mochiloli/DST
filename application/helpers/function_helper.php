<?php

//require_once('../../template/CTT/template.php');

function getNowDate() {
    $yy = date('Y');
    $mm = date('m');
    $dd = date('d');
    return $yy . '-' . $mm . '-' . $dd;
}

function getNowDateFw($sp = "-") {
    $yy = date('Y');
    $mm = date('m');
    $dd = date('d');
    return $dd . $sp . $mm . $sp . $yy;
}

function getNowDateFwFive($sp = "-") {
    $yy = date('Y') + 5;
    $mm = date('m');
    $dd = date('d');
    return $dd . $sp . $mm . $sp . $yy;
}

function getNowDateBuddish($sp = "/") {
    $yy = date('Y') + 543;
    $mm = date('m');
    $dd = date('d');
    return $dd . $sp . $mm . $sp . $yy;
}

function getNowDateBuddish2($sp = "/") {
    $yy = date('Y');
    $mm = date('m');
    $dd = date('d');
    return $dd . $sp . $mm . $sp . $yy;
}

function getNowDateBuddishTH($sp = "/") {
    $yy = date('Y') + 543;
    $mm = date('m');
    $dd = date('d');
    return $dd . $sp . $mm . $sp . $yy;
}

function getNowDateFw2() {
    $yy = date('Y');
    $mm = date('m');
    $dd = date('d');
    return $dd . '/' . $mm . '/' . $yy;
}

function getNowDateFw3() {
    $yy = date('Y');
    $mm = date('m');
    $dd = date('d') - 1;
    return $dd . '/' . $mm . '/' . $yy;
}

function getNowDateTh() {
    $yy = date('Y') + 543;
    $mm = date('m');
    $dd = date('d');
    return $yy . '-' . $mm . '-' . $dd;
}

function getNowDateFwTh() {
    $yy = date('Y') + 543;
    $mm = date('m');
    $dd = date('d');
    return $dd . '-' . $mm . '-' . $yy;
}

function getCVyearEgToTh() {
    $yy = date('Y') + 543;
    return $yy;
}

function splitDateFormTH($date, $sp = "-") {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    return $yy . '-' . $mm . '-' . $dd;
}

function splitDateForm($date, $sp = "-") {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    $yy += 543;
    return $yy . '-' . $mm . '-' . $dd;
}

function splitDateForm1($date, $sp = "-") {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    $yy -= 543;
    return $yy . '-' . $mm . '-' . $dd;
}

function splitDateForm2($date, $sp = "-") {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    return $yy . $sp . substr('0' . $mm, -2) . $sp . substr('0' . $dd, -2);
}

function splitDateForm3($date, $sp = "-") {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    $yy -= 543;
    return $yy . '-' . substr('0' . $mm, -2) . '-' . substr('0' . $dd, -2);
}

function splitDateForm4($date, $sp = "/") {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);
    return $dd . "$sp" . $mm . "$sp" . $yy;
}

function splitDateForm5($date, $sp = "/") {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    $yy -= 543;
    return $dd . "$sp" . $mm . "$sp" . $yy;
}

function splitDateForm4Buddish($date, $sp = "/") {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    $yy += 543;
    return $dd . "$sp" . $mm . "$sp" . $yy;
}

function splitDateDb($date, $sp = "-") {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);
    $yy -= 543;
    return $dd . "$sp" . $mm . "$sp" . $yy;
}

function splitDateDb2($date, $sp = "-") {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);
    return $dd . "$sp" . $mm . "$sp" . $yy;
}

function splitDateDb3($date, $sp = "-") {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);
    $yy += 543;
    return $dd . "$sp" . $mm . "$sp" . $yy;
}

function splitDateDb33($date, $sp = "/") {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);
    $yy += 543;
    return $dd . "$sp" . $mm . "$sp" . $yy;
}

function splitDateDb4($date, $sp = "-") {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);
    $yy += 543;
    return $yy . "$sp" . $mm . "$sp" . $dd;
}

function getlastday($date) {
    $mm = substr("$date", 5, 2);
    if ($mm == '01') {
        $dd = '31';
    } else if ($mm == '02') {
        $dd = '28';
    } else if ($mm == '03') {
        $dd = '31';
    } else if ($mm == '04') {
        $dd = '30';
    } else if ($mm == '05') {
        $dd = '31';
    } else if ($mm == '06') {
        $dd = '30';
    } else if ($mm == '07') {
        $dd = '31';
    } else if ($mm == '08') {
        $dd = '31';
    } else if ($mm == '09') {
        $dd = '30';
    } else if ($mm == '10') {
        $dd = '31';
    } else if ($mm == '11') {
        $dd = '30';
    } else if ($mm == '12') {
        $dd = '31';
    }
    return $dd;
}

function getMonthTh($mm) {
    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }

    return "$mm";
}

function fullDateTH($date) {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }

    return "$dd $mm $yy";
}

function fullDateTH2($date) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }

    return "$dd $mm พ.ศ. $yy";
}

function fullDate($date) {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }

    $yy += 543;
    return "$dd $mm พ.ศ.$yy";
}

function fullDate2($date) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }

    $yy += 543;
    return "$dd $mm พ.ศ. $yy";
}

function fullDateDB($date) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }
    $yy += 543;
    return "$dd $mm $yy";
}

function fullDateDB2($date) {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }

    return "$dd $mm $yy";
}

function fullDateEng($date) {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'January';
    } else if ($mm == '02') {
        $mm = 'February';
    } else if ($mm == '03') {
        $mm = 'March';
    } else if ($mm == '04') {
        $mm = 'April';
    } else if ($mm == '05') {
        $mm = 'May';
    } else if ($mm == '06') {
        $mm = 'June';
    } else if ($mm == '07') {
        $mm = 'July';
    } else if ($mm == '08') {
        $mm = 'August';
    } else if ($mm == '09') {
        $mm = 'September';
    } else if ($mm == '10') {
        $mm = 'October';
    } else if ($mm == '11') {
        $mm = 'November';
    } else if ($mm == '12') {
        $mm = 'December';
    }

    return "$mm $dd, $yy";
}

function abbreDate($date) {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'ม.ค.';
    } else if ($mm == '02') {
        $mm = 'ก.พ.';
    } else if ($mm == '03') {
        $mm = 'มี.ค.';
    } else if ($mm == '04') {
        $mm = 'เม.ย.';
    } else if ($mm == '05') {
        $mm = 'พ.ค.';
    } else if ($mm == '06') {
        $mm = 'มิ.ย.';
    } else if ($mm == '07') {
        $mm = 'ก.ค.';
    } else if ($mm == '08') {
        $mm = 'ส.ค.';
    } else if ($mm == '09') {
        $mm = 'ก.ย.';
    } else if ($mm == '10') {
        $mm = 'ต.ค.';
    } else if ($mm == '11') {
        $mm = 'พ.ย.';
    } else if ($mm == '12') {
        $mm = 'ธ.ค.';
    }
    $yy += 543;
    return "$dd $mm $yy";
}

function abbreDate2($date) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'ม.ค.';
    } else if ($mm == '02') {
        $mm = 'ก.พ.';
    } else if ($mm == '03') {
        $mm = 'มี.ค.';
    } else if ($mm == '04') {
        $mm = 'เม.ย.';
    } else if ($mm == '05') {
        $mm = 'พ.ค.';
    } else if ($mm == '06') {
        $mm = 'มิ.ย.';
    } else if ($mm == '07') {
        $mm = 'ก.ค.';
    } else if ($mm == '08') {
        $mm = 'ส.ค.';
    } else if ($mm == '09') {
        $mm = 'ก.ย.';
    } else if ($mm == '10') {
        $mm = 'ต.ค.';
    } else if ($mm == '11') {
        $mm = 'พ.ย.';
    } else if ($mm == '12') {
        $mm = 'ธ.ค.';
    }

    $yy += 543;
    return "$dd $mm $yy";
}

function abbreDate2th($date) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'ม.ค.';
    } else if ($mm == '02') {
        $mm = 'ก.พ.';
    } else if ($mm == '03') {
        $mm = 'มี.ค.';
    } else if ($mm == '04') {
        $mm = 'เม.ย.';
    } else if ($mm == '05') {
        $mm = 'พ.ค.';
    } else if ($mm == '06') {
        $mm = 'มิ.ย.';
    } else if ($mm == '07') {
        $mm = 'ก.ค.';
    } else if ($mm == '08') {
        $mm = 'ส.ค.';
    } else if ($mm == '09') {
        $mm = 'ก.ย.';
    } else if ($mm == '10') {
        $mm = 'ต.ค.';
    } else if ($mm == '11') {
        $mm = 'พ.ย.';
    } else if ($mm == '12') {
        $mm = 'ธ.ค.';
    }

    return "$dd $mm $yy";
}

function abbreDate3($date) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'ม.ค.';
    } else if ($mm == '02') {
        $mm = 'ก.พ.';
    } else if ($mm == '03') {
        $mm = 'มี.ค.';
    } else if ($mm == '04') {
        $mm = 'เม.ย.';
    } else if ($mm == '05') {
        $mm = 'พ.ค.';
    } else if ($mm == '06') {
        $mm = 'มิ.ย.';
    } else if ($mm == '07') {
        $mm = 'ก.ค.';
    } else if ($mm == '08') {
        $mm = 'ส.ค.';
    } else if ($mm == '09') {
        $mm = 'ก.ย.';
    } else if ($mm == '10') {
        $mm = 'ต.ค.';
    } else if ($mm == '11') {
        $mm = 'พ.ย.';
    } else if ($mm == '12') {
        $mm = 'ธ.ค.';
    }

    return "$dd $mm $yy";
}

function getNowDay() {
    $dd = date('d');
    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }
    return $dd;
}

function convertDayNumberToString($dd) {
    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }
    return $dd;
}

function getNowMonth() {
    return date('m');
}

function getNowMonthTh($mm) {
    //$mm = date('m');
    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }
    return $mm;
}

function convertMonthNumberToString($mm) {
    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }
    return $mm;
}

function getNowYear() {
    return date('Y');
}

function getNowYearTh() {
    return date('Y') + 543;
}

function checkWeekDay($date, $weekDay) {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    if (date("w", mktime(0, 0, 0, $mm, $dd, $yy)) == $weekDay)
        return true;
    else
        return false;
}

function getWeekDay($date) {
    list($dd, $mm, $yy) = preg_split("[/|-]", $date);
    return date("w", mktime(0, 0, 0, $mm, $dd, $yy));
}

function futureDay($date, $numDay) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);
    $futureDate = date("U", mktime(0, 0, 0, $mm, $dd, $yy)) + ($numDay * 24 * 60 * 60);
    return date("Y-m-d", $futureDate);
}

function pastDay($date, $numDay) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);
    $pastDate = date("U", mktime(0, 0, 0, $mm, $dd, $yy)) - ($numDay * 24 * 60 * 60);
    return date("Y-m-d", $pastDate);
}

function numDay($frDate, $toDate) {
    list($yy1, $mm1, $dd1) = preg_split("[/|-]", $frDate);
    list($yy2, $mm2, $dd2) = preg_split("[/|-]", $toDate);
    return (mktime(0, 0, 0, $mm2, $dd2, $yy2) - mktime(0, 0, 0, $mm1, $dd1, $yy1)) / (24 * 60 * 60);
}

function getval($varname, $rw, $v = '') {
    if (set_value($varname) <> '') {
        $v = set_value($varname);
    } else if (!is_null($rw)) {
        if ($rw->$varname == "0000-00-00") {
            $v = getNowDateFw2();
        } else {
            $v = $rw->$varname;  // varname เป็นชื่อฟิลด์จากตาราง
        }
    }
    return $v;
}

function getval_ac($varname, $varname1, $rw, $v = '') {
    if (set_value($varname) <> '') {
        $v = set_value($varname);
    } else if (!is_null($rw)) {
        if ($rw->$varname == "0000-00-00") {
            $v = getNowDateFw2();
        } else {
            $v = $rw->$varname;  // varname เป็นชื่อฟิลด์จากตาราง
            if ($varname1 != '') {
                $v .= " " . $rw->$varname1;
            }
        }
    }
    return $v;
}

function fullDate3($date) {// yy  mm  dd
    list($yy, $mm, $dd) = preg_split("[/|-]", $date);

    if ($dd == '01') {
        $dd = '1';
    } else if ($dd == '02') {
        $dd = '2';
    } else if ($dd == '03') {
        $dd = '3';
    } else if ($dd == '04') {
        $dd = '4';
    } else if ($dd == '05') {
        $dd = '5';
    } else if ($dd == '06') {
        $dd = '6';
    } else if ($dd == '07') {
        $dd = '7';
    } else if ($dd == '08') {
        $dd = '8';
    } else if ($dd == '09') {
        $dd = '9';
    }

    if ($mm == '01') {
        $mm = 'มกราคม';
    } else if ($mm == '02') {
        $mm = 'กุมภาพันธ์';
    } else if ($mm == '03') {
        $mm = 'มีนาคม';
    } else if ($mm == '04') {
        $mm = 'เมษายน';
    } else if ($mm == '05') {
        $mm = 'พฤษภาคม';
    } else if ($mm == '06') {
        $mm = 'มิถุนายน';
    } else if ($mm == '07') {
        $mm = 'กรกฎาคม';
    } else if ($mm == '08') {
        $mm = 'สิงหาคม';
    } else if ($mm == '09') {
        $mm = 'กันยายน';
    } else if ($mm == '10') {
        $mm = 'ตุลาคม';
    } else if ($mm == '11') {
        $mm = 'พฤศจิกายน';
    } else if ($mm == '12') {
        $mm = 'ธันวาคม';
    }

    return "$dd $mm $yy";
}

function calAge($year) {
    list($yy, $mm, $dd) = preg_split("[/|-]", $year);
    $year_c = date('Y');
    $year_o = $yy;
    $age = ($year_c + 543) - $year_o;
    return "$age";
}

function checkFomatIdCard($id) {//เช็ค fomat เลขบัตรประจำตัวประชาชน
    if (strlen($id) == 13) {
        $arr = substr($id, 0);
        $sumV = 0;
        for ($i = 0; $i < 12; $i++)
            $sumV += $arr[$i] * (13 - $i);
        $modV = 11 - ($sumV % 11);
        if ($modV > 9)
            $modV -= 10;
        if ($modV != $arr[12])
            return false;
        else
            return true;
    } else
        return false;
}

function getCurBudgetYear() {//หาปีงบประมาณปัจจุบัน
    if (date("n") < 10)
        $y = date("Y") + 543;
    else
        $y = date("Y") + 544;
    return $y;
}

function convertNumberToThai($num) {//แปลงเลขอาราบิกเป็นเลขไทย
    $arr = array();
    $val = "";
    $arr = str_split($num);
    for ($i = 0; $i < count($arr); $i++) {
        switch ($arr[$i]) {
            case "0" : $val .= "๐";
                break;
            case "1" : $val .= "๑";
                break;
            case "2" : $val .= "๒";
                break;
            case "3" : $val .= "๓";
                break;
            case "4" : $val .= "๔";
                break;
            case "5" : $val .= "๕";
                break;
            case "6" : $val .= "๖";
                break;
            case "7" : $val .= "๗";
                break;
            case "8" : $val .= "๘";
                break;
            case "9" : $val .= "๙";
                break;
            default : $val .= $arr[$i];
                break;
        }
    }
    return $val;
}

function getNamePic($key) {
    $handler = opendir("/var/www/html/CTT/upload/CTT/");
    while ($file = readdir($handler)) {
        if ($file != '.' && $file != '..') {
            $name = trim($file);
            $info = substr($name, 0, strpos($name, '.') + 0);
            if ($info == $key) {
                return $file;
            }
        }
    }
    return "default.jpg";
}

function getNamePicRtmcex($key) {
    $handler = opendir("/var/www/html/CTT/upload/rtmcex/");
    while ($file = readdir($handler)) {
        if ($file != '.' && $file != '..') {
            if ($file == $key) {
                return $file;
            }
        }
    }
    return "no_picture.jpg";
}

/*
  function getStatusFile($key){
  $handler = opendir("/var/www/html/CTT/upload/rtmcex/fileScore/");
  while ($file = readdir($handler)) {
  if ($file != '.' && $file != '..'){
  $name = trim($file);
  $info = substr($name,0,strpos( $name , '.' )+0 );
  if($info == $key){
  return 'T';
  }
  }
  }
  return 'F';
  }
  function splitDateTime($date, $sp="-") {
  $info = substr($date,0,10);
  $info2 = substr($date,11,8);
  //echo "->".$info."</br>".$info2."</br>";
  list($yy, $mm, $dd) = preg_split("[/|-]", $info);
  return $dd.$sp.$mm.$sp.$yy." ".$info2;

  }
 */
?>