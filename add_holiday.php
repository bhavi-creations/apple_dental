<?php
include './db.connection/db_connection.php';

if (isset($_POST['submit'])) {
    $date   = $_POST['holiday_date'];
    $type   = $_POST['holiday_type'];
    $reason = $_POST['reason'];

    $conn->query("INSERT INTO holidays (holiday_date, holiday_type, reason) 
                   VALUES ('$date','$type','$reason')");

    echo "<script>alert('Holiday Added');</script>";
}
?>
<?php include 'header.php'; ?>



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-10">
            <div class="holiday-card shadow">
                <h3 class="text-center mb-4">Add Holiday</h3>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="holiday_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="holiday_type" class="form-select" required>
                            <option value="">Select The Leave</option>
                            <option value="morning">Morning (8AM – 1PM)</option>
                            <option value="afternoon">Afternoon (2PM – 9PM)</option>
                            <option value="fullday">Full Day</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Reason</label>
                        <input type="text" name="reason" class="form-control" placeholder="Enter reason" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary w-100 save-btn">
                        Save Holiday
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>