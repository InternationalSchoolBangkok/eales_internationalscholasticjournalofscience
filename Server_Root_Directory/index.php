<head>
	<title>Test Page</title>
	<?php
	parse_str($_SERVER['QUERY_STRING'], $queryParams);
	//commented section prints ALL parameters in GET
	//print_r($queryParams);
	//echo $queryParams["paper"];
	$paperName = $queryParams["paper"];
	$paperLocation = "";
	if($paperName==""): ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
	function onLoad(){
		reloadPage();
	}
	function reloadPage(){
		setTimeout("reloadPage();", 1000);
		$('#date').load(document.URL +  ' #date');
		//alert("awooga");
	}
	</script>
</head>
<body onload="onLoad();">
	<p>Hello this is a test page</p>
	<div id="date">
		<?php echo "Server Time: ",date("G:i:s");?>
	</div></br>
	<a>Linkies:</a></br>
	<?php 
	libxml_use_internal_errors(true);
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
	}
	?>
</body>
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
	<body>
		<iframe src="<?php echo "http://isjos.org",$paperLocation?>" width="100%" height="100%"/>
		</body>
	<?php endif ?>
	</html>