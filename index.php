<?php
include "inc/header.php";
require "actions/connect.php";

// Fetch data from the database
$sql = "SELECT s.id, e.e_name, m.m_name, s.w_days, s.leaves, s.ot
FROM summery AS s 
INNER JOIN employee as e ON 
s.e_id = e.id 
INNER JOIN months as m ON 
s.m_id = m.id";
$result = $conn->query($sql);
?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <div class="table-responsive small">
            <table id="example" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Month</th>
                  <th scope="col">Work Days</th>
                  <th scope="col">Leave</th>
                  <th scope="col">OT</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['e_name']}</td>
                                <td>{$row['m_name']}</td>
                                <td>{$row['w_days']}</td>
                                <td>{$row['leaves']}</td>
                                <td>{$row['ot']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

<?php
include "inc/footer.php";
$conn->close(); // Close the connection
?>