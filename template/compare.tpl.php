<?php
$min = 2099;
$max = 2000;
if(isset($_POST["subject_1"]) && isset($courses[ $_POST["subject_1"] ]))
{
	if(key($courses[ $_POST["subject_1"] ]["years"]) > $max)
		$max = key($courses[ $_POST["subject_1"] ]["years"]);
		
	end($courses[ $_POST["subject_1"] ]["years"]);
	
	if(key($courses[ $_POST["subject_1"] ]["years"]) < $min)
		$min = key($courses[ $_POST["subject_1"] ]["years"]);
}
if(isset($_POST["subject_2"]) && isset($courses[ $_POST["subject_2"] ]))
{
	if(key($courses[ $_POST["subject_2"] ]["years"]) > $max)
		$max = key($courses[ $_POST["subject_2"] ]["years"]);
		
	end($courses[ $_POST["subject_2"] ]["years"]);
	
	if(key($courses[ $_POST["subject_2"] ]["years"]) < $min)
		$min = key($courses[ $_POST["subject_2"] ]["years"]);
}
if($max < $min)
	$max = $min;
?>
<p id="load_error" class="bg-danger" style="display:none; padding: 20px;">
	Vypadá to, že se nedaří načíst grafy. Důvodem může být, že nejste přihlášeni ve WISu.
</p>
<script>
	img_loaded = <?php if(isset($_POST["subject_1"]) || isset($_POST["subject_2"])) { echo "0"; } else { echo "1"; } ?>;
function image_loaded()
{
	if(img_loaded == 0)
	{
		$("#load_error").hide();
	}
	img_loaded = 1;
}
$(document).ready(function() {
	setTimeout(function() {
		if(img_loaded === 0)
		{
			$("#load_error").show();
		}
	}, 3000);
});
</script>
<div class="content">
<h1>Porovnání předmětů</h1>
<form action="?compare" method="post">
	<div class="row">
		<div class="col-3 col-sm-3 col-lg-5">
			<select name="subject_1" style="width: 400px;">
				<?php
					foreach($courses as $key => $course)
					{
						echo "<option ";
						if(isset($_POST["subject_1"]) && $_POST["subject_1"] == $key)
						{
							echo " selected='selected' ";
						}
						echo "value='".$key."' >".$key." - ".$course["name"]."</option>";
					}
				?>
			</select>
			<?php
			if(isset($_POST["subject_1"]) && isset($courses[ $_POST["subject_1"] ]))
			{
				echo "<h2>".$courses[ $_POST["subject_1"] ]["name"]."</h2>";
				for($year = $max; $year >= $min; $year--)
				{
					echo "<div class=\"col-12 col-sm-12 col-lg-12\"><h3>".$year."</h3>";
					echo "<img class='thumbnail' src=\"";
					if(isset($courses[ $_POST["subject_1"] ]["years"][$year]))
					{
						echo "https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id=".$courses[ $_POST["subject_1"] ]["years"][$year]."\"  onload=\"image_loaded()";
					}
					else
					{
						echo "img/missing.png";
					}

					echo "\" >";
					echo "</div>";
				}
			}
			?>
		</div>
		<div class="col-4 col-sm-4 col-lg-2"><input type="submit" name="send" class="btn btn-default" value="Porovnat!" ></div>
		<div class="col-3 col-sm-3 col-lg-5">
			<select name="subject_2"  style="width: 400px;">
				<?php
					foreach($courses as $key => $course)
					{
						echo "<option ";
						if(isset($_POST["subject_2"]) && $_POST["subject_2"] == $key)
						{
							echo " selected='selected' ";
						}
						echo " value='".$key."' >".$key." - ".$course["name"]."</option>";
					}
				?>
			</select>
			<?php
			if(isset($_POST["subject_2"])  && isset($courses[ $_POST["subject_2"] ]))
			{
				echo "<h2>".$courses[ $_POST["subject_2"] ]["name"]."</h2>";
				for($year = $max; $year >= $min; $year--)
				{
					echo "<div class=\"col-12 col-sm-12 col-lg-12\"><h3>".$year."</h3>";
					echo "<img class='thumbnail' src=\"";
					if(isset($courses[ $_POST["subject_2"] ]["years"][$year]))
					{
						echo "https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id=".$courses[ $_POST["subject_2"] ]["years"][$year]."\"  onload=\"image_loaded()";
					}
					else
					{
						echo "img/missing.png";
					}

					echo "\" >";
					echo "</div>";
				}
			}
			?>
		</div>
	</div>
</form>
</div>
