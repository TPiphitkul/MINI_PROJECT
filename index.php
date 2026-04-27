<?php
require 'config.php';
require 'bubble_sort.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

/* INSERT */
if (isset($_POST['add'])) {
    $stmt = $conn->prepare(
        "INSERT INTO package (package_name, amount, create_date) VALUES (?,?,?)"
    );
    $stmt->bind_param("sis", $_POST['name'], $_POST['amount'], $_POST['date']);
    $stmt->execute();
}

/* DELETE */
if (isset($_GET['del'])) {
    $conn->query("DELETE FROM package WHERE package_id=".(int)$_GET['del']);
}

/* SEARCH */
$where = [];
if (!empty($_GET['name'])) {
    $where[] = "package_name LIKE '%".$_GET['name']."%'";
}
if (!empty($_GET['amount'])) {
    $where[] = "amount=".(int)$_GET['amount'];
}
if (!empty($_GET['date'])) {
    $where[] = "DATE(create_date)='".$_GET['date']."'";
}

/* PAGINATION */
$limit = 10;
$page  = isset($_GET['page']) ? max(1,(int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

/* COUNT */
$countSql = "SELECT COUNT(*) AS total FROM package";
if ($where) {
    $countSql .= " WHERE ".implode(" AND ", $where);
}
$countResult = $conn->query($countSql);
$totalRows = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);

/* QUERY */
$sql = "SELECT * FROM package";
if ($where) {
    $sql .= " WHERE ".implode(" AND ", $where);
}
$sql .= " LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

/* BUBBLE SORT (current page) */
if (isset($_GET['sort'])) {
    $data = bubbleSortByAmount($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <span class="navbar-brand fw-bold">📚 Book Management</span>
        <div class="ms-auto">
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<section class="pb-5">
<div class="container mt-4">

<!-- Add Book -->
<div class="card p-4 mb-4">
    <h5 class="text-primary mb-3">Add Book</h5>
    <form method="post" class="row g-3 mb-4">
        <div class="col-md-4">
            <input class="form-control" name="name" placeholder="Book Name" required>
        </div>
        <div class="col-md-3">
            <input class="form-control" name="amount" type="number" placeholder="Price" required>
        </div>
        <div class="col-md-3">
            <input class="form-control" name="date" type="datetime-local" required>
        </div>
        <div class="col-md-2">
            <button name="add" class="btn btn-primary w-100">Add</button>
        </div>
    </form>

    <!-- Search -->
    <h5 class="text-primary mb-3">Search</h5>
    <form method="get" class="row g-3">
        <div class="col-md-4">
            <input class="form-control" name="name" placeholder="Book Name">
        </div>
        <div class="col-md-3">
            <input class="form-control" name="amount" placeholder="Price">
        </div>
        <div class="col-md-3">
            <input class="form-control" type="date" name="date">
        </div>
        <div class="col-md-2 d-grid gap-2">
            <button class="btn btn-primary">Search</button>
        </div>
    </form>
</div>

<!-- Table -->
<div class="card p-3">
<table class="table table-bordered text-center mb-0">
<thead>
<tr>
    <th>ID</th>
    <th>Book Name</th>
    <th>Price</th>
    <th>Date</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach ($data as $d): ?>
<tr>
    <td><?= $d['package_id'] ?></td>
    <td><?= $d['package_name'] ?></td>
    <td><?= $d['amount'] ?></td>
    <td><?= $d['create_date'] ?></td>
    <td>
        <a href="?del=<?= $d['package_id'] ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Confirm delete?')">
           Delete
        </a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<!-- Pagination -->
<nav class="mt-4">
<ul class="pagination justify-content-center">
    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $page-1 ?>">Previous</a>
    </li>

    <?php for ($i=1; $i<=$totalPages; $i++): ?>
        <li class="page-item <?= ($i==$page) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
        </li>
    <?php endfor; ?>

    <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $page+1 ?>">Next</a>
    </li>
</ul>
</nav>

</div>
</section>

<footer class="bg-light text-center py-3 border-top">
    <small class="text-muted">
        © 2026 Book Management System | Mini Project
    </small>
</footer>

</body>
</html>