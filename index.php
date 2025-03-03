<?php
	include("h.php");
?>


<?php


?>





<!-- start: page -->
<div class="row">
	<div class="col-xs-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
					<a href="#" class="fa fa-times"></a>
				</div>
				<h2 class="panel-title">Add New Layout</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="add.php" method="POST">
					<div class="form-group">
						<label class="col-md-2 control-label">Layout Name</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="lname" value="a">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Page Name</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="pname" value="b">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Location</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="location" value="c">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Header Section</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="hsec" value="d">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Section 1</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="sec1" value="e">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Content 1</label>
						<div class="col-md-10">
							<textarea class="summernote"  name="content1" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Section 2</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="sec2">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Content 2</label>
						<div class="col-md-10">
							<textarea class="summernote"  name="content2" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Section 3</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="sec3">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Content 3</label>
						<div class="col-md-10">
							<textarea class="summernote"  name="content3" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Footer Section</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="fsec">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Status</label>
						<div class="col-md-10">
							<select class="form-control" name="status">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>

				</form>
			</div>
		</section>
	</div>
</div>
<!-- end: page -->












<?php
	include("f.php");
?>