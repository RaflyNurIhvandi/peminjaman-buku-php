<?php
require_once '../setting/session.php';
include("header.php");

$usersession = $_SESSION['login_user'];

$sql = "select id_p_role, id_t_account from t_account where username = '$usersession' ";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$idnya = $row['id_t_account'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nrp = $_POST['nrp'];
    $book_id = $_POST['book_id'];
    $borrow_code = uniqid(); // Generate unique borrow code
    $return_date = date('Y-m-d', strtotime('+3 days'));

    // Insert borrowing record
    $query = "INSERT INTO borrowings (nrp, book_id, borrow_code, return_date) 
              VALUES ('$nrp', '$book_id', '$borrow_code', '$return_date')";
    mysqli_query($db, $query);
}

// Fetch all available books for borrowing
$query = "SELECT * FROM books WHERE status = 1";
$available_books = mysqli_query($db, $query);

$qw = "SELECT * FROM borrowings";
$b = mysqli_query($db, $qw);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Borrow Books</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NRP</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="nrp" required>
                    </div>
                    <label class="col-sm-2 col-form-label">Select Books</label>
                    <div class="col-sm-4">
                        <select name="book_id" class="form-control">
                            <?php while ($book = mysqli_fetch_assoc($available_books)) { ?>
                                <option value="<?= $book['id'] ?>"><?= $book['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-small btn-primary btn-block">Borrow</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NRP</th>
                        <th>ID Book</th>
                        <th>Borrowed At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($bor = mysqli_fetch_assoc($b)) { ?>
                        <tr>
                            <td><?= $bor['nrp'] ?></td>
                            <td><?= $bor['book_id'] ?></td>
                            <td><?= $bor['borrowed_at'] ?></td>
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