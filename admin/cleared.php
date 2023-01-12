<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
  if ($corepage == $corepage) {
    $corepage = explode('.', $corepage);
    header('Location: index.php?page=' . $corepage[0]);
  }
}
?>
<h1 class="text-primary"><i class="fas fa-users"></i> All Students Cleared<small class="text-warning"> Fees Records</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
    <li class="breadcrumb-item active" aria-current="page">Paid</li>
  </ol>
</nav>
<?php if (isset($_GET['delete']) || isset($_GET['edit'])) { ?>
  <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
    <div class="toast-header">
      <strong class="mr-auto">Student Insert Alert</strong>
      <small><?php echo date('d-M-Y'); ?></small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      <?php
      if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 'success') {
          echo "<p style='color: green; font-weight: bold;'>Student Deleted Successfully!</p>";
        }
      }
      if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 'error') {
          echo "<p style='color: red'; font-weight: bold;>Student Not Deleted!</p>";
        }
      }
      if (isset($_GET['edit'])) {
        if ($_GET['edit'] == 'success') {
          echo "<p style='color: green; font-weight: bold; '>Student Edited Successfully!</p>";
        }
      }
      if (isset($_GET['edit'])) {
        if ($_GET['edit'] == 'error') {
          echo "<p style='color: red; font-weight: bold;'>Student Not Edited!</p>";
        }
      }
      ?>
    </div>
  </div>
<?php } ?>
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
    <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">Amount Paid($)</th>
      <th scope="col">Amount Owing($)</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stat = 'paid';
    $query = mysqli_query($db_con, "SELECT * FROM `fees_records` WHERE `status`='$stat';");
    $i = 1;
    while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php
        echo '<td>' . $i . '</td>
        <td>' . ucwords($result['name']) . '</td>
        <td>' . $result['class'] . '</td>
        <td>' . $result['amount paid($)'] . '</td>
        <td>' . ucwords($result['amount owing($)']) . '</td>
        <td>' . $result['status'] . '</td>'; ?>
      </tr>
    <?php $i++;
    } ?>

  </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor) {
    var conf = confirm('Are you sure want to delete this record?');
    if (conf)
      window.location = anchor.attr("href");
  }
</script>