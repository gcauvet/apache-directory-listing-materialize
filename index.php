<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="List elements from directory with materialize">

    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		<style>
			.alignLeft {text-align: left;}
			.floatRight {float: right;}
			th, td {text-align: center;}
		</style>
    </head>

    <body>

		<?php

			$path = getcwd();
			$files = scandir($path);
			$files = array_diff(scandir($path), array('.', '..'));
			$index = array_search('index.php', $files);
			$directory = basename(__DIR__);

			if ($index !== false)
				unset( $files[$index] );
		?>

      	<div class="container">

			<div class="row">
				<div class='card-panel col l12'>
					<h5> Index of : /<?php echo($directory) ?>
						<span class='floatRight'>
							<a href='../' class='waves-effect waves-teal btn-flat'>Parent directory</a>
						</span>
					</h5>
				</div>
			</div>

			<table class='striped responsive-table'>

				<div class="row">
					<tr>
						<th>#</th>
						<th class="alignLeft">Name</th>
						<th>Type</th>
						<th>Size</th>
						<th>Last modified</th>
					</tr>

					<?php

						foreach ($files as $fileIndex => $file)  {
							$fileIndex--;

							print " <tr>
										<td>".$fileIndex."</td>
										<td class='alignLeft'><a href='".rawurlencode($file)."'>".preg_replace('/\\.[^.\\s]{3,4}$/', '', $file)."</a></td>
										<td>".pathinfo($file, PATHINFO_EXTENSION)."</td>
										<td>".number_format(filesize($file)/ 1048576, 2)." Mb</td>
										<td>".date ("d/m/Y H:i:s", filemtime($file))."</td>
									</tr>";
							}
					?>
				</div>
			</table>
		</div>

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>