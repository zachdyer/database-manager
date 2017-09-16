<?php global $notification, $root_path; ?>
<h1>New Database</h1>
<?php echo $notification; ?>
<form action="index.php?page=new-database" method="POST">
    <input type="hidden" value="new-database" name="page">
  <div class="form-group">
    <label for="database-name">Database name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter database name" name="database-name">
    <small id="emailHelp" class="form-text text-muted">No spaces for special characters. Only letters and numbers.</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php include($root_path . "/database-manager/views/includes/db-table.php"); ?>
  