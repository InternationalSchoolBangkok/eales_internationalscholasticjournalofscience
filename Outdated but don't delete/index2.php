<head>
	<title>Journal of Science</title>
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
	<link rel="stylesheet" type="text/css" href="css/body.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
	function onLoad(){
		reloadPage();
	}
	function reloadPage(){
		//setTimeout("reloadPage();", 1000);
		$('#date').load(document.URL +  ' #date');
		//alert("awooga");
	}
	</script>
</head>
<body onload="onLoad();">
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
		Interscholastic Journal of Science
	</div>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		An important component of the Science program at International School Bangkok is experimental research. All students conduct and report on several pieces of original research during the course of their studies. The ISB Journal of Science provides a forum in which ISB students may publish their research. The papers have been peer reviewed and have been judged correct and substantive.
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		The Journal was founded in 2007 as the Journal of Physics by Mr. Jonathan Eales. Mr. Jonathan Eales and Dr. Ian Jacobs were the Editors of the Journal of Physics from 2007 until 2012. The Journal of Physics was published semi-annually in January and June.
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		In January of 2013, the Journal was expanded to accept papers from all the sciences and was renamed the ISB Journal of Science. The Journal of Science is edited by Dr. Jonathan Eales. The Peer Review Board consists of current and former secondary school science teachers. The Journal of Science publishes papers on a rolling basis as they are received throughout the year. Articles in the Journal are copyrighted under Creative Commons licensing. The Journal is listed in the Directory of Open Access Journals.
	</p>
</div>
<?php 
/*libxml_use_internal_errors(true);
$xml = simplexml_load_file("mapFile.xml") or die("Error: Cannot create object");
if ($xml === false) {
echo "Failed loading XML: ";
foreach(libxml_get_errors() as $error) {
echo "<br>", $error->message;
}
} else {
foreach($xml->item as $item){
echo "<a href=\"/?paper=",urlencode($item->name),"\">",$item->name,"</a></br>";
//echo $item->location,$item->name;
}
}*/
?>
<?php else: 
	libxml_use_internal_errors(true);
	$xml = simplexml_load_file("mapFile.xml") or die("Error: Cannot create object");
	if ($xml === false) {
		echo "Failed loading XML: ";
		foreach(libxml_get_errors() as $error) {
			echo "<br>", $error->message;
		}
	} else {
		foreach($xml->item as $item){
			//Now you can access the 'row' data using $Item in this case 
			//two elements, a name and an array of key/value pairs
			//echo $item->name,"	",$item->location,"</br>";
			if($paperName == $item->name){
				//echo $item->location;
				$paperLocation = $item->location;
			}
		}
		//print_r($xml);	
	}
	?>
	<div style="height: 100px;">
		<iframe src="http://docs.google.com/gview?url=http://isjos.org<?php echo $paperLocation?>&embedded=true" style="width:100%; height:10000px;" frameborder="0">
		</iframe>
	</div>
	<?php endif ?>
</body>
</html>