<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<div class="container mt-4">
  <h2>Task Management</h2>
  <a href="create-task.php" class="btn btn-success mb-3">Create New Task</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Assigned To</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $tasks = mysqli_query($conn, "SELECT tasks.*, users.name AS technician_name FROM tasks LEFT JOIN users ON tasks.assigned_to = users.id");

      if (mysqli_num_rows($tasks) > 0) {
        while ($task = mysqli_fetch_assoc($tasks)) {
          echo "<tr>
                  <td>{$task['id']}</td>
                  <td>{$task['title']}</td>
                  <td>{$task['description']}</td>
                  <td>{$task['technician_name']}</td>
                  <td>{$task['status']}</td>
                  <td>
                    <a href='edit-task.php?id={$task['id']}' class='btn btn-success btn-sm'>Edit</a>
                    <a href='delete-task.php?id={$task['id']}' class='btn btn-danger btn-sm'>Delete</a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No tasks available</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include('includes/footer.php'); ?>
