
<nav class="globalheader">
	<ul>
		<li>
			<a href="index.php">Home</a>
		</li>
		<li>
			<a href="about.php">About</a>
		</li>
		<li>
			<a href="editorial.php">Editorial Policy</a>

		</li>
		<li>
			<a href="contact.php">Contact Us</a>
		</li>
		<li>
			<a>Current Issue<span>&#x25BC;</span></a>
			<ul>
				<?php
				libxml_use_internal_errors(true);
				$xml = simplexml_load_file("mapFile.xml") or die("Error: Cannot create object");
				if ($xml === false) {
					echo "Failed loading XML: ";
					foreach(libxml_get_errors() as $error) {
						echo "<br>", $error->message;
					}
				} else {
					foreach($xml->issue as $issue){
						if($issue->archive=="false"){
							echo "<li>\n";
							echo "<a>",$issue->year,"</a>\n";
							echo "<ul>\n";
							foreach($issue->paper as $paper){
								echo "<li><a href=\"/?paper=",urlencode($paper->name),"\">",$paper->name,"</a></li>\n";
							}
							echo "</ul>\n";
							echo "</li>\n";
						}
					}
				}
				?>
			</ul>
		</li>
		<li>
			<a>Archives<span>&#x25BC;</span></a><!-- dropdown arrow-->
			<ul>
				<li class="header">
					International Scholastic Journal of Science
				</li>
				<?php
				libxml_use_internal_errors(true);
				$xml = simplexml_load_file("mapFile.xml") or die("Error: Cannot create object");
				if ($xml === false) {
					echo "Failed loading XML: ";
					foreach(libxml_get_errors() as $error) {
						echo "<br>", $error->message;
					}
				} else {
					foreach($xml->issue as $issue){
						if($issue->archive=="true"){
							echo "<li>\n";
							echo "<a>",$issue->year,"</a>\n";
							echo "<ul>\n";
							foreach($issue->paper as $paper){
								echo "<li><a href=\"/?paper=",urlencode($paper->name),"\">",$paper->name,"</a></li>\n";
							}
							echo "</ul>\n";
							echo "</li>\n";
						}
					}
				}
				?>
				<!--<li>
				<a>2015</a>
				<ul>
				<li>
				<a href="index.php">Master Han Report</a>
				</li>
				</ul>
				</li>-->
				<li class="header">
					Header for JoS & JoP
				</li>
				<li>
					<a href="http://isjos.org/JoS/index.html">Journal of Science Archive</a>
				</li>
				<li>
					<a href="http://isjos.org/JoP/index.html">Journal of Physics Archive</a>
				</li>
			</ul>	
		</li>
	</ul>
</nav>
