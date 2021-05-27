<?php
$arrUniqueId=['1254079','1254059','1254080',"1254081",'1254082','1254083','1254084','1254085','1254086','1254087','1254088','1254089','1254090','1254091','1254092','1254093','1254094','1254095','1254096','1254097','1254098','1254099','1254100','1254101','1254102','1254103','1254104','1254105','1254106','1254107','1254108','1254109','1254110','1254111','1254112','1254113','1254114','1254115','1254116','1254117'];
$apikey="fIh9t0dJUHa5ZQpFIYYPSInJTi72";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ScoreBoard</title>

    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/index.css"/>

  </head>
  <body>
    <!--Whole Container -->
    <div class="rca-container rca-margin">
      
      <!--Live ScoreBoard -->
      <div class="rca-row">
        
        <div class="rca-column-6">
          <?php
		  foreach($arrUniqueId as $unique_id){
        
		  $matchURL="https://cricapi.com/api/cricketScore?apikey=$apikey&unique_id=$unique_id";
		  $resultMatch=file_get_contents($matchURL);
		  $resultMatch=json_decode($resultMatch,true);

      $url="https://cricapi.com/api/fantasySummary?apikey=$apikey&unique_id=$unique_id";
$result=file_get_contents($url);
$result=json_decode($result,true);
      
		  ?>
		  <div class="rca-mini-widget rca-history-info">
			<div class="rca-row">
               <div style="padding:20px;font-size:20px;"> <?php echo $resultMatch['team-1']?> vs <?php echo $resultMatch['team-2']?></div>
        
               <div style="padding:20px;font-size:20px;"> <?php 
               date_default_timezone_set('Asia/Kolkata');
               echo (date('Y-m-d h:i', strtotime($result['dateTimeGMT']))); ?> </div>
			   <?php
			   if($resultMatch['matchStarted']==1){
				 ?><br/>
				 <div style="padding:17px;"><a href="detail.php?uid=<?php echo $unique_id?>" style="color:red;"><?php echo $resultMatch['score']?></a></div>
				 <?php  
			   }
			   ?>
            </div>
          </div>
		  <?php } ?>
		</div>

	  </div>
    </div>
 
    
  </body>
</html>