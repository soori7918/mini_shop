<?php 
namespace App;

 /*
 * @method gregorian_to_jalali ($g_y, $g_m, $g_d,$str)       return gregorian to jalali converted date 
 * @method jalali_to_gregorian($j_y, $j_m, $j_d,$str)        return jalali to gregorian converted date 
 * 
 * @author     Roozbeh Baabakaan
 * @version    SVN: $Id: gregorian_jalali 1 2012-12-20 19:07:0 
 */
 class gregorianjalali{
  public function __construct() {
  }
 
public function div($a,$b) { 
    return (int) ($a / $b); 
} 
 
public function gregorian_to_jalali ($g_y, $g_m, $g_d,$str) 
{ 
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
 
  
   $gy = $g_y-1600; 
   $gm = $g_m-1; 
   $gd = $g_d-1; 
 
   $g_day_no = 365*$gy+$this->div($gy+3,4)-$this->div($gy+99,100)+$this->div($gy+399,400); 
 
   for ($i=0; $i < $gm; ++$i) 
      $g_day_no += $g_days_in_month[$i]; 
   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
      /* leap and after Feb */ 
      $g_day_no++; 
   $g_day_no += $gd; 
 
   $j_day_no = $g_day_no-79; 
 
   $j_np = $this->div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
   $j_day_no = $j_day_no % 12053; 
 
   $jy = 979+33*$j_np+4*$this->div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 
 
   $j_day_no %= 1461; 
 
   if ($j_day_no >= 366) { 
      $jy += $this->div($j_day_no-1, 365); 
      $j_day_no = ($j_day_no-1)%365; 
   } 
 
   for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
      $j_day_no -= $j_days_in_month[$i]; 
   $jm = $i+1; 
   $jd = $j_day_no+1; 
 if($str) return $jy.'/'.$jm.'/'.$jd ;
   return array($jy, $jm, $jd); 
} 
 
public function jalali_to_gregorian($j_y, $j_m, $j_d,$str) 
{ 
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
 
 
   $jy = (int)($j_y)-979; 
   $jm = (int)($j_m)-1; 
   $jd = (int)($j_d)-1; 
 
   $j_day_no = 365*$jy + $this->div($jy, 33)*8 + $this->div($jy%33+3, 4); 
   
   for ($i=0; $i < $jm; ++$i) 
      $j_day_no += $j_days_in_month[$i]; 
 
   $j_day_no += $jd; 
 
   $g_day_no = $j_day_no+79; 
 
   $gy = 1600 + 400*$this->div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */ 
   $g_day_no = $g_day_no % 146097; 
 
   $leap = true; 
   if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */ 
   { 
      $g_day_no--; 
      $gy += 100*$this->div($g_day_no,  36524); /* 36524 = 365*100 + 100/4 - 100/100 */ 
      $g_day_no = $g_day_no % 36524; 
 
      if ($g_day_no >= 365) 
         $g_day_no++; 
      else 
         $leap = false; 
   } 
 
   $gy += 4*$this->div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */ 
   $g_day_no %= 1461; 
 
   if ($g_day_no >= 366) { 
      $leap = false; 
 
      $g_day_no--; 
      $gy += $this->div($g_day_no, 365); 
      $g_day_no = $g_day_no % 365; 
   } 
 
   for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++) 
      $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap); 
   $gm = $i+1; 
   $gd = $g_day_no+1; 
    if($str) return $gy.'/'.$gm.'/'.$gd ;
    return array($gy, $gm, $gd); 
} 


public function comparedate($_date_mix_jalaly,$_date_mix_gregorian)
{
  $_date_arr_jalaly = explode('/', $_date_mix_jalaly);
  $_date_arr_gregorian = explode('/', $_date_mix_gregorian);		
  
  $arr_jtg = jalali_to_gregorian($_date_arr_jalaly[0],$_date_arr_jalaly[1],$_date_arr_jalaly[2]);
		
  if($_date_arr_gregorian[0]> $arr_jtg[0])
    {
	 return  false;
	}
		
	else if($_date_arr_gregorian[0]== $arr_jtg[0] && $_date_arr_gregorian[1]>$arr_jtg[1])
	{
	 return false;
	}
	else if($_date_arr_gregorian[0]== $arr_jtg[0] && $_date_arr_gregorian[1]==$arr_jtg[1] && $_date_arr_gregorian[2]>$arr_jtg[2])
	{
	 return false;
	}
  return true ;	
}
public function isDatein($startdate,$enddate,$date)
{
  $res = false;
  //start and end date must be as dd/mm/yyyy
  $startdate = explode("/",$startdate);
  $enddate = explode("/",$enddate);
  $date = explode("/", $date);
  //if start and end date date are jalali
  if($startdate[2]<1900)
  {
    $startdate = $this->jalali_to_gregorian($startdate[2],$startdate[1],$startdate[0],false);
    $startdate = $startdate[0].($startdate[1]<10? '0'.$startdate[1]:$startdate[1]).($startdate[2]<10? '0'.$startdate[2]:$startdate[2]);
  }else{
    $startdate = $startdate[2].$startdate[1].$startdate[0];
  }
  if($enddate[2]<1900)
  {
    $enddate = $this->jalali_to_gregorian($enddate[2],$enddate[1],$enddate[0],false);
    $enddate = $enddate[0].($enddate[1]<10? '0'.$enddate[1]:$enddate[1]).($enddate[2]<10? '0'.$enddate[2]:$enddate[2]);
  }else{
      $enddate = $enddate[2].$enddate[1].$enddate[0];
  }
  //check if jalali date
  if($date[0]<1900)
  {
    $date = $this->jalali_to_gregorian($date[0],$date[1],$date[2],false);
    $date = $date[0].($date[1]<10? '0'.$date[1]:$date[1]).($date[2]<10? '0'.$date[2]:$date[2]);
  }else{
      $date = $date[0].$date[1].$date[2];
  }
  $startdate = \DateTime::createFromFormat('Ymd', $startdate);
  $enddate = \DateTime::createFromFormat('Ymd', $enddate);
  $date = \DateTime::createFromFormat('Ymd', $date);
  // if date is beetwen start and end. return 1
   if(($startdate <= $date) &&($enddate >= $date)){
                $res  = true;
   }
  return $res;
}
}

?>