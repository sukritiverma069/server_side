



<?php

$mysqli = new mysqli("localhost", "dbuser", "dbpassword", "99acresdb1");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* Fetch result set from table */
$queryResult=mysqli_query($mysqli,"SELECT BuilderName, count(ProjectName) as projectcount from project_details group by BuilderName having BuilderName != '' order by projectcount desc limit 5");


?>

<script>
    /* o make the data compatible with our chart, we must create JavaScript objects from the data. To do this, we will use PHP while loops to loop through our data to create JavaScript arrays from our result set. */
var myData=[<?php
while($info=mysqli_fetch_array($queryResult))
echo '"'.$info['BuilderName'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
console.log(myData);

<?php
$queryResult=mysqli_query($mysqli,"SELECT BuilderName, count(ProjectName) as projectcount from project_details group by BuilderName having BuilderName != '' order by projectcount desc limit 5");
?>

var myLabels=[<?php
while($info=mysqli_fetch_array($queryResult))
echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
console.log(myLabels);



</script>


<?php
/* Close the connection */
$mysqli->close();
?>



