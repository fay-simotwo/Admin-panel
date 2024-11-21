<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<div class="container mt-4">
  <h2>My Assigned Tasks</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $userId = $_SESSION['user_id']; // Assuming the technician's ID is stored in session
      $tasks = mysqli_query($conn, "SELECT * FROM tasks WHERE assigned_to = $userId");

      if (mysqli_num_rows($tasks) > 0) {
        while ($task = mysqli_fetch_assoc($tasks)) {
          echo "<tr>
                  <td>{$task['id']}</td>
                  <td>{$task['title']}</td>
                  <td>{$task['description']}</td>
                  <td>{$task['status']}</td>
                  <td>
                    <form method='POST' action='update-task-status.php'>
                      <input type='hidden' name='task_id' value='{$task['id']}'>
                      <select name='status'>
                        <option value='Pending'>Pending</option>
                        <option value='In Progress'>In Progress</option>
                        <option value='Completed'>Completed</option>
                      </select>
                      <button type='submit' class='btn btn-primary btn-sm'>Update</button>
                    </form>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No tasks assigned</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include('includes/footer.php'); ?>
