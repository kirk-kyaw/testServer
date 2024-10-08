<?php
include "../inc/header.php";
require '../actions/connect.php';

// Fetch data from the database
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Employees</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#createEmployeeModal">Add Employee</button> <!-- Button to trigger modal -->
    </div>
    <div class="table-responsive small">
        <table id="employee" class="table table-striped style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Days</th>
                    <th scope="col">leave</th>
                    <th scope="col">OT</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $formatted_date = date("d-m-Y", strtotime($row['date']));
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$formatted_date}</td>
                                <td>{$row['e_name']}</td>
                                <td>{$row['e_salary']}</td>
                                <td>{$row['e_days']}</td>
                                <td>{$row['e_leave']}</td>
                                <td>{$row['ot']}</td>
                                <td>
                                    <button class='btn btn-outline-warning edit-btn' data-toggle='modal' data-target='#editEmployeeModal' 
                                            data-id='{$row['id']}' data-name='{$row['e_name']}' data-salary='{$row['e_salary']}' 
                                            data-days='{$row['e_days']}' data-leave='{$row['e_leave']}' data-ot='{$row['ot']}' 
                                            data-date='{$row['date']}'>Edit</button>
                                    <a href='actions/e_delete.php?id={$row['id']}' class='btn btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>

<!-- Create Employee Modal -->
<div class="modal fade" id="createEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="createEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEmployeeModalLabel">Add New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left: auto;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createEmployeeForm" method="POST" action="../actions/e_create.php">
                    <div class="form-group">
                        <label for="e_name">Name</label>
                        <input type="text" class="form-control" id="e_name" name="e_name" required>
                    </div>
                    <div class="form-group">
                        <label for="e_salary">Salary</label>
                        <input type="number" class="form-control" id="e_salary" name="e_salary" required>
                    </div>
                    <div class="form-group">
                        <label for="e_days">Days</label>
                        <input type="number" class="form-control" id="e_days" name="e_days" required>
                    </div>
                    <div class="form-group">
                        <label for="leave">Leave</label>
                        <input type="number" class="form-control" id="e_leave" name="e_leave" required>
                    </div>
                    <div class="form-group">
                        <label for="ot">OT</label>
                        <input type="number" class="form-control" id="ot" name="ot" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Create Employee</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Employee Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left: auto;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editEmployeeForm" method="POST" action="../actions/e_edit.php">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="e_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_salary">Salary</label>
                        <input type="number" class="form-control" id="edit_salary" name="e_salary" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_days">Days</label>
                        <input type="number" class="form-control" id="edit_days" name="e_days" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_leave">Leave</label>
                        <input type="number" class="form-control" id="edit_leave" name="e_leave" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_ot">OT</label>
                        <input type="number" class="form-control" id="edit_ot" name="ot" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_date">Date</label>
                        <input type="date" class="form-control" id="edit_date" name="date" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Update Employee</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "../inc/footer.php";
$conn->close(); // Close the connection
?>

<script>
  $(document).ready(function() {
    $('#employee').DataTable({
      //disable sorting on last column
      "columnDefs": [{
        "orderable": false,
        "targets": 6
      }],
      language: {
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        "lengthMenu": 'Display <select class="form-control input-sm">' +
          '<option value="10">10</option>' +
          '<option value="20">20</option>' +
          '<option value="30">30</option>' +
          '<option value="40">40</option>' +
          '<option value="50">50</option>' +
          '<option value="-1">All</option>' +
          '</select> results'
      }
    })
  });

   // Populate edit modal with employee data
   $('.edit-btn').on('click', function() {
      var button = $(this);
      $('#edit_id').val(button.data('id'));
      $('#edit_name').val(button.data('name'));
      $('#edit_salary').val(button.data('salary'));
      $('#edit_days').val(button.data('days'));
      $('#edit_leave').val(button.data('leave'));
      $('#edit_ot').val(button.data('ot'));
      $('#edit_date').val(button.data('date'));
    });
</script>