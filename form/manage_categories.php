<?php
require_once '../setting/session.php';
include("header.php");

$usersession = $_SESSION['login_user'];

$sql = "select id_p_role, id_t_account from t_account where username = '$usersession' ";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$idnya = $row['id_t_account'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$status = isset($_POST['status']) ? 1 : 0;

	// Insert into categories table
	$query = "INSERT INTO categories (name, status) VALUES ('$name', '$status')";
	mysqli_query($db, $query);
}

// Fetch all categories
$query = "SELECT * FROM categories";
$categories = mysqli_query($db, $query);
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Manage Categories</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Category Name</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="name">
					</div>
					<div class="col-sm-2">
						<input class="form-check-input" type="checkbox" name="status" value="1">
						<label class="form-check-label" for="status">
							Status Active ?
						</label>
					</div>
					<div class="col-sm-4">
						<button type="submit" class="btn btn-small btn-primary btn-block">Add Category</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12">
			<table width="100%" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($category = mysqli_fetch_assoc($categories)) { ?>
						<tr>
							<td><?= $category['id'] ?></td>
							<td><?= $category['name'] ?></td>
							<td><?= $category['status'] ? 'Active' : 'Inactive' ?></td>
							<td>
								<!-- Actions to edit or delete category -->
								<a class="btn btn-danger btn-sm" href="delete_category.php?id=<?= $category['id'] ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>