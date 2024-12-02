<?php
require_once '../setting/session.php';
include("header.php");

$usersession = $_SESSION['login_user'];

$sql = "select id_p_role, id_t_account from t_account where username = '$usersession' ";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$idnya = $row['id_t_account'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title = $_POST['title'];
	$publisher = $_POST['publisher'];
	$category_id = $_POST['category_id'];
	$status = isset($_POST['status']) ? 1 : 0;

	// Handling the file upload using FilePond
	$target_dir = "uploads/";
	$cover_image = $target_dir . basename($_FILES["cover_image"]["name"]);
	move_uploaded_file($_FILES["cover_image"]["tmp_name"], $cover_image);

	// Insert into books table
	$query = "INSERT INTO books (category_id, title, publisher, cover_image, status) 
              VALUES ('$category_id', '$title', '$publisher', '$cover_image', '$status')";
	mysqli_query($db, $query);
}

// Fetch all books
$query = "SELECT books.*, categories.name AS category_name FROM books 
          JOIN categories ON books.category_id = categories.id";
$books = mysqli_query($db, $query);
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Manage Books</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Book Title</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="title">
					</div>
					<label class="col-sm-2 col-form-label">Categories</label>
					<div class="col-sm-4">
						<select name="category_id" class="form-control">
							<option value="" selected disabled>Get Category</option>
							<?php
							// Fetch all categories
							$categories = mysqli_query($db, "SELECT * FROM categories WHERE status = 1");
							while ($category = mysqli_fetch_assoc($categories)) {
								echo "<option value='{$category['id']}'>{$category['name']}</option>";
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Publisher</label>
					<div class="col-sm-4">
						<input type="text" name="publisher" class="form-control">
					</div>
					<div class="col-sm-2">
						<input type="checkbox" class="form-check-input" name="status" value="1">
						<label class="form-check-label" for="status">
							Status Active ?
						</label>
					</div>
					<label class="col-sm-1 col-form-label">Cover</label>
					<div class="col-sm-3">
						<input type="file" name="cover_image" accept="image/jpg,image/jpeg,image/png,image/webp" required class="form-control">
					</div>
				</div>
				<button type="submit" class="btn btn-small btn-primary btn-block">Add Book</button>
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
						<th>Title</th>
						<th>Publisher</th>
						<th>Category</th>
						<th>Cover</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($book = mysqli_fetch_assoc($books)) { ?>
						<tr>
							<td><?= $book['id'] ?></td>
							<td><?= $book['title'] ?></td>
							<td><?= $book['publisher'] ?></td>
							<td><?= $book['category_name'] ?></td>
							<td><img src="<?= $book['cover_image'] ?>" alt="cover" width="50"></td>
							<td><?= $book['status'] ? 'Active' : 'Inactive' ?></td>
							<td>
								<!-- Actions to edit or delete book -->
								<a class="btn btn-danger btn-sm" href="delete_book.php?id=<?= $book['id'] ?>">Delete</a>
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