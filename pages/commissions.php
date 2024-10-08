<?php
require "../actions/connect.php";
include "../inc/header.php";

// Fetch data from the database
$sql = "SELECT e.e_name, c.id, c.cocktail, c.spy, c.flower, c.flower_1, c.liquor, c.ktv, c.date
FROM employee AS e 
INNER JOIN commission AS c 
ON e.id = c.e_id";
$result = $conn->query($sql);
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Commissions</h1>
    </div>
    <div class="table-responsive small">
        <table id="commissions" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Spy</th>
                    <th scope="col">Cocktail</th>
                    <th scope="col">Room</th>
                    <th scope="col">Liquor</th>
                    <th scope="col">Flower</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $formatted_date = date("d-m-Y", strtotime($row['date']));
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$formatted_date}</td> 
                                <td>{$row['e_name']}</td>
                                <td>{$row['spy']}</td>
                                <td>{$row['cocktail']}</td>
                                <td>{$row['ktv']}</td>
                                <td>{$row['liquor']}</td>
                                <td>{$row['flower']}</td>
                                <td>
                                    <button class='btn btn-outline-warning' data-toggle='modal' data-target='#editModal' 
                                            data-id='{$row['id']}' 
                                            data-e_name='{$row['e_name']}' 
                                            data-date='{$row['date']}' 
                                            data-cocktail='{$row['cocktail']}' 
                                            data-spy='{$row['spy']}' 
                                            data-ktv='{$row['ktv']}' 
                                            data-flower='{$row['flower']}' 
                                            data-liquor='{$row['liquor']}'>Edit</button>
                                    <a href='actions/c_delete.php?id={$row['id']}' class='btn btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="../actions/c_edit.php">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="edit_date">Date</label>
                        <input type="date" class="form-control" id="edit_date" name="date" >
                    </div>
                    <div class="form-group">
                        <label for="edit_cocktail">Cocktail</label>
                        <input type="text" class="form-control" id="edit_cocktail" name="cocktail" >
                    </div>
                    <div class="form-group">
                        <label for="edit_spy">Spy</label>
                        <input type="number" class="form-control" id="edit_spy" name="spy" >
                    </div>
                    <div class="form-group">
                        <label for="edit_ktv">Room</label>
                        <input type="number" class="form-control" id="edit_ktv" name="ktv" >
                    </div>
                    <div class="form-group">
                        <label for="edit_liquor">Liquor</label>
                        <input type="number" class="form-control" id="edit_liquor" name="liquor" >
                    </div>
                    <div class="form-group">
                        <label for="edit_flower">Flower</label>
                        <input type="number" class="form-control" id="edit_flower" name="flower" >
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');
        var e_name = button.data('e_name'); // Corrected data attribute
        var date = button.data('date');
        var cocktail = button.data('cocktail');
        var spy = button.data('spy');
        var liquor = button.data('liquor');
        var ktv = button.data('ktv');
        var flower = button.data('flower');
        // Update the modal's content
        var modal = $(this);
        modal.find('#edit_id').val(id);
        modal.find('#edit_name').val(e_name);
        modal.find('#edit_date').val(date.split(" ")[0]);
        modal.find('#edit_cocktail').val(cocktail);
        modal.find('#edit_spy').val(spy);
        modal.find('#edit_ktv').val(ktv);
        modal.find('#edit_liquor').val(liquor);
        modal.find('#edit_flower').val(flower);
    });
});
</script>

<script>
  $(document).ready(function() {
    $('#commissions').DataTable({
      //disable sorting on last column
      "columnDefs": [{
        "orderable": false,
        "targets": 8
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
</script>