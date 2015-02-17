
<nav class="globalheader">
	<ul>
		<li>
			<a href="index.php">Home</a>
		</li>
		<li>
			<a href="about.php">About</a>
		</li>
		<li>
			<a href="aims.php">Aims &amp; Scope</a>

		</li>
		<li> <a href="ISJoS2015.php">Current Issue</a></li>
        <li> <a>Back Issues<span>&#x25BC;</span></a>
          <!-- dropdown arrow-->
          <ul>
            <li class="header"> Int'l Schol. J. of Sci.</li>
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
            <li> <a href="http://isjos.org/JoS/index.html" target="new">ISB J. of Science</a> </li>
            <li> <a href="http://isjos.org/JoP/index.html" target="new">ISB J. of Physics</a> </li>
          </ul>
        </li>
		<li> <a>For Authors<span>&#x25BC;</span></a>
		  <!-- dropdown arrow--><!--<li>
				<a>2015</a>
				<ul>
				<li>
				<a href="index.php">Master Han Report</a>
				</li>
				</ul>
				</li>-->            
		  <ul>
		    <li> <a href="Submissions.php">Submissions</a> </li>
		    <li> <a href="Guidelines.php">Author Guidelines</a> </li>
	      </ul>
	  </li>
		<li>
		<a href="contact.php">Contact Us</a></li>
	</ul>
</nav>
