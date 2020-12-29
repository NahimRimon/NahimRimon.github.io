<!DOCTYPE html>
<style>
h1{
  padding:10px;
  color:black;
}
input[type=text] {
  margin: 10px 9px 8px 150px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
input[type=submit] {
  font-weight:bold;
  padding:5px 10px;
  cursor: pointer;
  margin:10px 250px;
}
label,input {
  display: inline-block;
}
label {
  width: 30%;
  text-align: left;
}
.Dus{
    background-color: #fbaf51;
}
.mod{
    font-size:20px;
    font-weight:bold;
    padding: 12px 20px;
    background:#f2f290;
    text-align:left;
    padding-left:20%;
}
.don{
    font-size:20px;
    font-weight:bold;
    padding: 12px 20px;
    background:#ffff;
    text-align:left;
    padding-left:20%;
}
.ton{
  padding-bottom:40px;
}
div {
  background-color: #fbaf51;
}
p{
   font-size:20px;
   font-weight:bold;
   margin: auto;
   width: 50%;
   display: inline-block;
   text-align:left;
}
</style>
<head>
	<title>Calculate Electricity Bill</title>
</head>
<?php
$conNumber = $number = '';
$conName = $name = '';
$pastReading = $pR = '';
$presentReading = $preR = '';
$unitConsumed = '';
$Amount = $result = '';

if (isset($_GET['submit'])) 
{
    $number = $_GET['conum'];
    $conNumber = $number;  
    $name = $_GET['coname'];
    $conName = $name; 
    $pR = $_GET['pastR'];
    $pastReading = $pR; 
    $preR = $_GET['presentR'];
    $presentReading = $preR;

    $unitConsumed = ($presentReading - $pastReading);

    if(!empty($unitConsumed))
    {
        $result = calculate_bill($unitConsumed);
        $Amount = $result; 
    }

}   
function calculate_bill($unitConsumed) {
    $First_Rate = 3.00;
    $Second_Rate = 4.00;
    $Third_Rate= 5.00;
    $Fourth_Rate = 6.00;

    if($unitConsumed <= 100) 
    {
        $bill = $unitConsumed * $First_Rate;
    }
    else if($unitConsumed > 100 && $unitConsumed <= 200)
    {
        $bill = $unitConsumed * $Second_Rate;
    }
    else if($unitConsumed > 200 && $unitConsumed <= 300)
    {
        $bill = $unitConsumed * $Third_Rate;
    }
    elseif($unitConsumed > 300)
    {
        $bill = $unitConsumed * $Fourth_Rate;
    }
    return number_format($bill, 2);
}
?>
<body style="text-align: center;">
<div>
	<h1>Calculate Electricity Bill</h1>

	<form action="" method="get" id="quiz-form">
        
        <div class="mod">
         <label for="conum">Enter the consumer number</label>
         <input type="text" id="conam" name="conum" > 
        </div>  

        <div class="don">
         <label for="coname">Enter the consumer name</label>
         <input type="text" id="coname" name="coname">
        </div>

        <div class="mod">
         <label for="pastR">Enter the previous reading</label>
         <input type="text" id="pastR" name="pastR">
        </div>

        <div class="don">
          <label for="presentR">Enter the present reading</label>
          <input type="text" id="presentR" name="presentR" >
        </div>
  
        <input type="submit" name="submit" id="submit" value="Submit" />
		</form>
       </div>
       <br>
       <br>
<div class ="Dus" style="text-align: center;">    
    <h1>Electricity Bill</h1>
    <div class="ton">
    <div class="mod">
         <?php echo '<p>Consumer Number :</p>'.$conNumber;?>
    </div>
    <div class="don">
         <?php echo '<p>Customer Name :</p>'. $conName;?>
    </div>
    <div class="mod">
         <?php echo '<p>Previous Reading :</p>'. $presentReading;?>
    </div>
    <div class="don">
         <?php echo '<p>Present Reading :</p>'. $pastReading;?>
    </div>
    <div class="mod">
         <?php echo '<p>Unit Consumed :</p>'. $unitConsumed;?>
    </div>
    <div class="don">
         <?php echo '<p>Amount :</p>'. $Amount;?>
    </div>
    </div>
</div>
</body>
</html>