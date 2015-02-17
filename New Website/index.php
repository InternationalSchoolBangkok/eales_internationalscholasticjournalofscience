<head>
	<title>Int'l Schol. J. of Sci.</title>
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
	<link rel="stylesheet" type="text/css" href="css/body.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
	function onLoad(){
		$().ready(function() {
			$('#iFrame').height($(window).height() - 62);
		});
		$(window).resize(function() {
			$('#iFrame').height($(window).height() - 62);
		});
	}
	/*
	function reloadPage(){
	setTimeout("reloadPage();", 1000);
	$('#date').load(document.URL +  ' #date');
	//alert("awooga");
	}/*
	</script>
</head>
<body onLoad="onLoad();">
	<?php
include 'nav.php';
parse_str($_SERVER['QUERY_STRING'], $queryParams);
//commented section prints ALL parameters in GET
//print_r($queryParams);
//echo $queryParams["paper"];
$paperName = $queryParams["paper"];
$paperLocation = "";
if($paperName==""): ?>
<div class="maincontent">
	<div class="header">
		International Scholastic Journal of Science
	</div>
	<p>
	&nbsp;&nbsp;&nbsp;&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<blockquote>
	  <blockquote>
	    <blockquote>
	      <p><em>Publishing the original research of secondary school students.</em></p>
        </blockquote>
      </blockquote>
  </blockquote>
</div>
<?php else: 
	libxml_use_internal_errors(true);
	$xml = simplexml_load_file("mapFile.xml") or die("Error: Cannot create object");
	if ($xml === false) {
		echo "Failed loading XML: ";
		foreach(libxml_get_errors() as $error) {
			echo "<br>", $error->message;
		}
	} else {
		foreach($xml->issue as $issue){
			foreach($issue->paper as $paper){
				if($paperName == $paper->name){
					$paperLocation = $paper->location;
				}	
			}	
		}
	}
	?>
	<iframe id="iFrame" src="http://docs.google.com/gview?url=http://isjos.org<?php echo $paperLocation?>&embedded=true" style="width:100%; height:100%;" frameborder="0">
	</iframe>
	<?php endif ?>
</body>
</html>