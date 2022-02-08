<?php
date_default_timezone_set('Asia/Dhaka');
//============================
// Bangla Date Time in Bangla
//============================
class BanglaDateTime {
 private $timestamp;
 private $morning;
 private $engHour;
 private $engDate;
 private $engMonth;
 private $engYear;
 private $bangDate;
 private $bangMonth;
 private $bangYear;
 private $bn_months = array("পৌষ", "মাঘ", "ফাল্গুন", "চৈত্র", "বৈশাখ", "জ্যৈষ্ঠ", "আষাঢ়", "শ্রাবণ", "ভাদ্র", "আশ্বিন", "কার্তিক", "অগ্রহায়ণ");
 private $bn_month_dates = array(30,30,30,30,31,31,31,31,31,30,30,30);
 private $bn_month_middate = array(13,12,14,13,14,14,15,15,15,15,14,14);
 private $lipyearindex = 3;
 function __construct( $timestamp, $hour = 6 ) {
 $this->BanglaDateTime( $timestamp, $hour );
 }
 function BanglaDateTime( $timestamp, $hour = 6 ) {
 $this->engDate = date( 'd', $timestamp );
 $this->engMonth = date( 'm', $timestamp );
 $this->engYear = date( 'Y', $timestamp );
 $this->morning = $hour;
 $this->engHour = date( 'G', $timestamp );
 //calculate the bangla date
 $this->calculate_date();
 //now call calculate_year for setting the bangla year
 $this->calculate_year();
 //convert english numbers to Bangla
 $this->convert();
 }
 function set_time( $timestamp, $hour = 6 ) {
 $this->BanglaDateTime( $timestamp, $hour );
 }
private function calculate_date() {
 $this->bangDate = $this->engDate - $this->bn_month_middate[$this->engMonth - 1];
 if ($this->engHour < $this->morning)
 $this->bangDate -= 1;

 if (($this->engDate <= $this->bn_month_middate[$this->engMonth - 1]) || ($this->engDate == $this->bn_month_middate[$this->engMonth - 1] + 1 && $this->engHour < $this->morning) ) {
 $this->bangDate += $this->bn_month_dates[$this->engMonth - 1];
 if ($this->is_leapyear() && $this->lipyearindex == $this->engMonth)
 $this->bangDate += 1;
 $this->bangMonth = $this->bn_months[$this->engMonth - 1];
 }
 else{
 $this->bangMonth = $this->bn_months[($this->engMonth)%12];
 }
 }
function is_leapyear() {
 if ( $this->engYear % 400 == 0 || ($this->engYear % 100 != 0 && $this->engYear % 4 == 0) )
 return true;
 else
 return false;
 }
 function calculate_year() {
 $this->bangYear = $this->engYear - 593;
 if (($this->engMonth < 4) || (($this->engMonth == 4) && (($this->engDate < 14) || ($this->engDate == 14 && $this->engHour < $this->morning))))
 $this->bangYear -= 1;
 }
 function bangla_number( $int ) {
 $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
 $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
 $converted = str_replace( $engNumber, $bangNumber, $int );
 return $converted;
 }
 function convert() {
 $this->bangDate = $this->bangla_number( $this->bangDate );
 $this->bangYear = $this->bangla_number( $this->bangYear );
 }
 function get_date() {
 return array($this->bangDate, $this->bangMonth, $this->bangYear);
 }
}
function BDdate($time)
{
$bn = new BanglaDateTime($time);
 $output = $bn->get_date();
 $ReadyDate = "$output[0] $output[1] $output[2]";
 return $ReadyDate;
}

//=====================
// Using of Bangla Year
//=====================

// Initialize/set the time where you want:
// include('bnTime.php');
// $time = time();
// $Bdate = BDdate($time);
// echo $Bdate;


//============================
// English Date Time in Bangla
//============================

function bn_date($str)
 {
    $en = array(1,2,3,4,5,6,7,8,9,0);
    $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str = str_replace($en, $bn, $str);
    $eng = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $eng_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
    $bng = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
    $str = str_replace( $eng, $bng, $str );
    $str = str_replace( $eng_short, $bng, $str );
    $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
    $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
    $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
    $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn_short, $str );
    $en = array( 'am', 'pm' );
    $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
    $str = str_replace( $en, $bn, $str );
    $en = array( 'AM', 'PM' );
    $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
    $str = str_replace( $en, $bn, $str );
    return $str;
 }

  //=====================
  // Using of English Year
  //=====================

  // Initialize/set the time where you want:
  // include('bnTime.php');
  // echo bn_date(date('l, d M Y, h:i a'));

  add_filter( 'get_the_time', 'bn_date' );
  add_filter( 'the_date', 'bn_date' );
  add_filter( 'get_the_date', 'bn_date' );
  add_filter( 'comments_number', 'bn_date' );
  add_filter( 'get_comment_date', 'bn_date' );
  add_filter( 'get_comment_time', 'bn_date' );
  add_filter( 'date_i18n', 'bn_date' );
  add_filter( 'number_format_i18n', 'bn_date' );
  add_filter( 'date', 'bn_date' );