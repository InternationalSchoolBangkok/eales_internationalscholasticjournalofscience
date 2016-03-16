<?php
$issuePapers = array();
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
<table style="table-layout:fixed; width: 100%; text-align:center; bgcolor=#D72539;">
  <tr>
    <td width="100%" align="center" bgcolor="#D72539"><img src="images/header.gif" alt="" width="700" height="122"></td>
</table>
  <div class="maincontent">
    <div class="header">
      <p>International Scholastic Journal of Science</p>
    </div>
    <blockquote>
      <h2>Volume <?php echo $issueYear-2006;?>, Issue 1, January-December, <?php echo $issueYear;?></h2>
      <blockquote>
        <p><a href="<?php echo $editorNote; ?>"> From the Editors</a></p>
      </blockquote>
      <h3><br>
        Papers<br>
      </p>
      <?php
      $i = 1;
      foreach($issuePapers as $paper){
        //Hi, you can uncomment exactly ONE of the 3 commented lines bellow
        //echo $i.".  "."<a href=\"index.php?paper=".urlencode($paper->name)."\">".$paper->name."</a><br><em>".$paper->author."</em><br><br>";//uncomment for pretty links, same tab
        echo $i.".  "."<a target='blank' href=\"index.php?paper=".urlencode($paper->name)."\">".$paper->name."</a><br><em>".$paper->author."</em><br><br>";//uncomment for pretty links, new tab
        //echo $i.".  "."<a target='blank' href=".$paper->location.">".$paper->name."</a><br><em>".$paper->author."</em><br><br>";//uncomment for non-pretty links, no fancy pdf viewer
        $i++;
      }?>
    </h3>
      <p>&nbsp;</p>
      <table width="90%" border="0" align="center">
        <tr>
          <td width="50%">ISSN 2408-1884</td>
          <td width="50%" align="right"><a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="new"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/80x15.png" /></a></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </blockquote>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>
</html>
