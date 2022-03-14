<?php
	include "config.php";
	session_start();
//get stuff
$clientID = 1;

	$sql = "select * from question where Sur_ID = 1;";
	$result = $conn->query($sql);
	if($result){
	$countArr = 0;
	$questArr = array();
		while($row = $result->fetch_assoc()){
			$questArr[$countArr] = $row['Qu_ID'];
			//echo "$countArr<br>";
			$countArr =$countArr+1;
			//echo $questArr[0] ;
		}
	}
	if(isset($_GET['but_submit'])){
		//echo $questArr[2] ;
		$counter = 0;
		$ansArr = array();
		$day1 = strtotime($_GET['currentDate']);
		$day1 = date('Y-m-d H:i:s', $day1); 
	
		//echo $date;
		$ansArr[0] = $_GET['ansq1'];
		$ansArr[1] = $_GET['ansq2'];
		$ansArr[2] = $_GET['Time'];
		$ansArr[3] = $_GET['howtime'];
		$ansArr[4] = $_GET['ansq5'];
		$ansArr[5] = $_GET['ansq6'];
		$ansArr[6] = $_GET['ansq7'];
		$ansArr[7] = $_GET['quality'];
		$ansArr[8] = $_GET['ansq9'];
		while($counter < count($questArr)){
		$ans = $ansArr[$counter];
		//echo "$ans<br>";
		//echo $counter;
		$sql = "INSERT INTO answer (Qu_ID , Client_ID,Date,Answer)
				Values ('$questArr[$counter]','$clientID','$day1','$ans');";
	
				$conn->query($sql);
		$counter = $counter + 1;
		}
		echo'<script>alert("Submitted!")</script>';
	}
?>





<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sleep App | Home</title>
  <link rel="stylesheet" href="sleepApp.css">
	<style>
body {
	font-family: Arial, Helvetica, sans-serif;
}
hr {
	width 50%;
}
input[type=text], input[type=number] {
	width: 20%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
	text-align: center;
}
input[type=time] {
	width: 20%;
	padding: 10px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
	
}
select {
	width: 20%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
	text-align: center;
}

form label {
	font-size: 16;
}
	</style>
</head>
<body>
      <div class="wrapper">
    <header>
      <div class="headerS">/ </div>
      <div class="headerLogo">Lana Walsh<br>Coaching</div>
      <div class="headerSub">Sleep Coach: Helping you Conquer Insomnia so <br>You Wake up Feeling Rested and Refreshed</div>
      
    </header>
		<nav>
      <div class="navlink"><a href="home.php">Home</a></div>
      <div class="navlink"><a href="dailyForm.php">Form</a></div>
      <div class="navlink"><a href="profile.php">Profile</a></div>
      <div class="navlink"><a href="report.php">Report</a></div>
      <div class="navlink"><a href="helpPage.php">Help</a></div>      
		</nav>
        <article>
        <!-- This section is for the content-->
        <h3>Please fill out the following questions with your best judgement.</h3>
        <p><b>Daily Sleep Survey</b></p>
        <p><b>Please indicate the date</b></p>
     <form method="get" action="">
        <!--date-->
        <input type="date" style="text-align: center;" id="currentDate" name ="currentDate">

    <br><hr>
    <!--<script>
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    document.getElementById("currentDate").value = date;
            </script>-->
                         
        <br>

        <!--form-->
   
            

            <!--Question1-->

            <label for ="q1"><b>1. What time did you go to bed? </b></label>

                <br>

                <input type="time" id="ansq1" name="ansq1">

                <br><br><br>
				
				

                 <!--Question2-->

                <label for ="q2"><b>2. What time did you turn off the lights? </b></label>

                <br>

                <input type="time" id="ansq2" name="ansq2">
                
                <br><br><br>

                <!--Question3-->

                <label for ="q3"><b>3. How long did it take you to fall asleep?</b> <br>(in minutes)</label>

                <br>


                <select id="timelights" name="Time">
                  <option value="1">15</option>
                  <option value="3">30</option>
                  <option value="4">45</option>
                  <option value="6">60</option>
                  <option value="6">1hr+</option>
                </select>

                <br><br><br>
				
                 <!--Question4-->

                <label for ="q4"><b>4. How many times did you wake up last night?</b></label>

                <br>

                <select id="howtime" name="howtime">
                    <option value="1">0-5</option>
                    <option value="2">6-10</option>
                    <option value="3">11-15</option>
                    <option value="4">16+</option>
                  </select>

                <br><br><br>

                 <!--Question5-->

                <label for ="q5"><b>5. What was your final wake up time this morning?</b></label>

                <br>


                <input type="time" id="ansq5" name="ansq5">
                  
                <br><br><br>
				
                   <!--Question6-->
                
                <label for ="q6"><b>6. What time did you get out of bed?</b></label> 
                  
                <br>


                <input type="time" id="ansq6" name="ansq6">

                <br><br><br>

                <!--Question7-->

                <label for ="q7"><b>7. Sleep Medications</b><br>(indicate dose and type)</label>

                <br>

                <input type="text" id="ansq7" name="ansq7">

                <br><br><br>

                <!--Question8-->

                <label for ="q8"><b>8. Rate your sleep 1-5</b><br>
                        (1 = very poor, 5 = very good)
                    </label>

                <br>


                <input type="number" id="quality" name="quality" min="1" max="5">
                  
                <br><br><br>
				
                <!--Question9-->

                <label for ="q9"><b>9. - Notes - 
				<br>List any possible circumstances that might
                <br>have contributed to how you slept.</b></label>   
                        
                <br>

                <input type = text id = "ansq9" name ="ansq9" style="min-height: 10%; width: 25%">
                     
                <br><br><br>

                <!--Back&Submitbtn-->

                <button type="submit" value="Submit" name="but_submit" id="but_submit">Submit</button>
				<button type="submit">Back</button>
				
        </form>  
        </article>
        <footer></footer>
    </div>
</body>
</html>
