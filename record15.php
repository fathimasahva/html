
<html>
<body> 

<?php
$players = array("Rohit Sharma", "Virat Kohli", "Jasprit Bumrah", "KL Rahul", "Ravindra Jadeja");
$player_no = array("45", "18", "93", "34", "8");
$position = array("top-order batsman", "off-spin", "right-arm fast bowler", "wicket-keeper", "left-handed batting all-rounder");
?>

<h2 style="color:red; padding-left:250px" >Indian Cricket Players</h2>

<table border="1" width="50%">
<tr>
<th  width="20%" align="center">Player No</th>
<th>Player Name</th>
<th>position</th>

</tr>

<?php
// Use one loop and match both arrays by index
for ($i = 0; $i < count($players); $i++) {
echo "<tr>";
echo "<td align=center>" . $player_no[$i] . "</td>";
echo "<td align=center>" . $players[$i] . "</td>";
echo "<td align=center>" . $position[$i] . "</td>";
echo "</tr>";
}
?>
</table>

</body>
</html>

