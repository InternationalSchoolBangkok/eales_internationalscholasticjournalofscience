<?php
$issuePapers = array();
$ISSN = "";
$editorNote = "";
if($_GET["issue"]==""){
  header("Location: /index.php");
  exit();
}else{
  $issueYear = $_GET["issue"];
}
libxml_use_internal_errors(true);
$xml = simplexml_load_file("mapFile.xml") or die("Error: Cannot create object");
if ($xml === false) {
  echo "Failed loading XML: ";
  foreach(libxml_get_errors() as $error) {
    echo "<br>", $error->message;
  }
}else{
  foreach($xml->issue as $issue){
    if(strcmp($issue->year,$issueYear)==0){
      $ISSN = $issue->ISSN;
      $editorNote = $issue->editorNoteLocation;
      foreach($issue->paper as $paper){
        array_push($issuePapers,$paper);
      }
    }
  }
}
?>
<html>
<head>
  <title><?php echo "Int'l Schol. J. of Sci. ".$issueYear."CHANGE THIS"; ?>></title>
  <link rel="stylesheet" type="text/css" href="css/navigation.css">
  <link rel="stylesheet" type="text/css" href="css/body.css">
  <link rel="icon" href="/images/favicons/favicon24.png" type="image/x-icon" />
  <script>
  function onLoad(){
  }
  </script>
</head>
<body onLoad="onLoad();">
  <?php include 'nav.php';?>
  <div class="maincontent">
    <div class="header">
      <p>International Scholastic Journal of Science</p>
    </div>
    <blockquote>
      <h2>Volume <?php echo $issueYear-2006;?>, Issue 1, January-December, <?php echo $issueYear."<br>"."ISSN: ".$ISSN;?></h2>
      <a href="<?php echo $editorNote; ?>"> From the Editors</a>
      <br><br>
      <?php
      $i = 1;
      foreach($issuePapers as $paper){
        echo "<a href=".$paper->location.">".$i.". ".$paper->name."</a><br><em>".$paper->author."</em><br>";
        $i++;
      }?>
    </blockquote>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>
</html>
