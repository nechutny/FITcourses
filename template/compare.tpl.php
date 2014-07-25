<div class="content">
<h1>Porovnání předmětů</h1>
<form action="?compare" method="post">
	<div class="row">
		<div class="col-3 col-sm-3 col-lg-5">
			<select name="subject_1" style="width: 400px;">
				<?php
					foreach($courses as $key => $course)
					{
						echo "<option value='".$key."' >".$key." - ".$course["name"]."</option>";
					}
				?>
			</select>
			<?php
			if(isset($_POST["subject_1"]) && isset($courses[ $_POST["subject_1"] ]))
			{
				echo "<h2>".$courses[ $_POST["subject_1"] ]["name"]."</h2>";
				foreach($courses[ $_POST["subject_1"] ]["years"] as $key => $val)
				{
					echo "<div class=\"col-12 col-sm-12 col-lg-12\"><h3>".$key."</h3>";
					echo "<img class='thumbnail' src=\"https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id=".$val."\" >";
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
						echo "<option value='".$key."' >".$key." - ".$course["name"]."</option>";
					}
				?>
			</select>
			<?php
			if(isset($_POST["subject_2"])  && isset($courses[ $_POST["subject_2"] ]))
			{
				echo "<h2>".$courses[ $_POST["subject_2"] ]["name"]."</h2>";
				foreach($courses[ $_POST["subject_2"] ]["years"] as $key => $val)
				{
					echo "<div class=\"col-12 col-sm-12 col-lg-12\"><h3>".$key."</h3>";
					echo "<img class='thumbnail' src=\"https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id=".$val."\" >";
					echo "</div>";
				}
			}
			?>
		</div>
	</div>
</form>
</div>
