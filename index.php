<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>綜合練習-萬年曆製作</title>
    <style>
    *{
        list-style-type:none;
        text-align:center; /*水平置中*/
    }

    .bg{
        background:pink;
    }
    table{
           border-collapse: collapse;/*表格欄位邊框合併*/
           margin:auto;
        }
    table td{
        padding:10px;
        border:1px solid #999;
       }
    h2{
        text-align:center;
        color:#09f;
    }
    </style>
</head>
<body>

<?php

//決定目前的月份

if(!empty($_GET['month'])){

    $month=$_GET['month'];

}else{
    $month=date("m",time());
}


//決定目前的年分

if(!empty($_GET['year'])){

    $year=$_GET['year'];

}else{
        $year=date("Y",time());
}
echo $year. "年". $month. "月";
?>

<?php

    $specialDays = [
    [1, 1, "元旦"],
    [2, 28, "228和平紀念日"],
    [4, 4, "兒童節"],
    [4, 7, "我的生日"],
    [5, 1, "勞動節"],
    [8, 8, "父親節"],
    [9, 11, "哥哥生日"],
    [10, 10, "國慶日"],
    [12, 3, "媽媽生日"],
    [12, 25, "聖誕節"]
    ];
    $today=date("Y-m-d"); 
    $todayDays=date("d");
    $start="$year-$month-01";
    $startDay=date("w",strtotime($start));/*這個月第一天星期幾*/
    $days=date("t",strtotime($start));/*這個月有幾天 */
    $endDay=date("w",strtotime("$year-$month-$days"));/*這個月最後一天星期幾 */

    echo "<h2>".date("Y-m",strtotime($start))."</h2>";
?>

<br>
<?php
   if(($month-1)>0){
    
    $premonth=$month-1;
    $preyear=$year;

}else{

    $premonth=12;
    $preyear=$year-1;
}
if(($month+1)<=12){

    $nextmonth=$month+1;
    $nextyear=$year;

}else{

    $nextmonth=1;
    $nextyear=$year+1;    

}
?>

<h2>
<a href="?month=<?php echo $premonth ?>&year=<?php echo $preyear ?>">上一月</a>
<a href="?month=<?php echo $nextmonth ?>&year=<?php echo $nextyear ?>">下一月</a>
</h2>
    
<table border="1">
    <tr>
        <td>日</td>
        <td>一</td>
        <td>二</td>
        <td>三</td>
        <td>四</td>
        <td>五</td>
        <td>六</td>
    </tr>
<?php
for($i=0;$i<6;$i++){

    echo "<tr>";

    for($j=0;$j<7;$j++){
        
        $currentDay = $i * 7 + $j + 1 - $startDay;
        
        $str = checkSpecialDay($month, $currentDay, $specialDays);
                
        if($i==0){

            if($j<$startDay){
                 echo "<td></td>";

            }else{
                $d = date("Y-m-d", mktime(0, 0, 0, $month, $currentDay, $year));
                if($d==$today){
                    
                    echo "    <td class='bg'>".$currentDay."<br/>".$str."</td>";    
                }else{

                    echo "    <td>".$currentDay."<br/>".$str."</td>";    
                }
            }
        }else{

            if($currentDay<=$days){
                $d = date("Y-m-d", mktime(0, 0, 0, $month, ($i * 7 + $j + 1 - $startDay), $year));
                if($d==$today){
                    echo "    <td class='bg'>".$currentDay."<br/>".$str."</td>";    
                }else{
                    echo "    <td>".$currentDay."<br/>".$str."</td>";    
                }
            }else{
                echo "    <td></td>";    
            }
        }
   }
    echo "</tr>";
}

?>
   
</table>

</body>
</html>

<?php

function checkSpecialDay($month, $currentDay, $specialDays) {

    // check if this is a special day
    foreach ($specialDays as $day) {
        if ($month == $day[0] && $currentDay == $day[1]) {

            // this is a special day!
            return $day[2];
        }
    }

    return "";
}

?>
