<?php
if (isset($_POST["course"],$_POST['credits'],$_POST['grade'])) {
    $courses = $_POST["course"];
    $credits = $_POST["credits"];
    $grades = $_POST["grade"];
    $totalCredits = 0;
    $totalPoints = 0;
    echo "<table>";
    echo "<tr>
        <th>Courses</th>
        <th>Credits</th>
        <th>Grade</th>
        <th>Grade Points</th>
    </tr>";
    for ($i = 0; $i < count($courses); $i++) {
        $course = htmlspecialchars($courses[$i]);
        $cr = floatval ($credits[$i]);
        $g = floatval($grades[$i]);
        if ($cr <= 0) continue;
        $pts =$cr*$g;
        $totalPoints+=$pts;
        $totalCredits+=$cr;
        echo "<tr>
            <td>$course</td>
            <td>$cr</td>
            <td>$g</td>
            <td>$pts</td>
        </tr>";
}
echo "</table>";
if ($totalCredits > 0) {
    $gpa = $totalPoints / $totalCredits;
    if($gpa > 3.7){
        $interpretation = "Perfect GPA! Excellent work!";
    } elseif ($gpa > 3.0) {
        $interpretation = "Merit Keep it up!";
    } elseif ($gpa > 2.0) {
        $interpretation = "Pass but becareful";
    } else {
        $interpretation = "Fail! You need to work much better"; 
    }
    echo "<p>Your GPA is : <strong>" . number_format($gpa, 2) . "</strong> ($interpretation).</p>";
} else {
    echo "<p>No valid courses entered. Please enter at least one course.</p>";
}
  }else{  
    echo "<p>No data received. Please submit the form.</p>";
}
?>
