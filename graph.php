<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <h2>Student Parent / PWD</h2>
            <canvas id="combinedChart" width="100" height="100"></canvas>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $.ajax({
        url: "fetch_data.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            var combinedChart = new Chart($("#combinedChart"), {
                type: 'bar',
                data: {
                    labels: ['pwd', 'stu_parent'],
                    datasets: [
                        {
                            label: 'Yes',
                            data: [data.pwd_yes, data.parent_yes],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'No',
                            data: [data.pwd_no, data.parent_no],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        x: { stacked: true },
                        y: { stacked: true }
                    },
                    onClick: function(event, elements) {
                        if (elements && elements.length > 0) {
                            var clickedBar = elements[0];
                            var selectedCategory = clickedBar.datasetIndex === 0 ? 'pwd' : 'stu_parent';
                            var status = clickedBar.label === 'yes' ? 'yes' : 'no';
                            window.location.href = 'students_list.php?category=' + selectedCategory + '&status=' + status;
                        }
                    }
                }
            });
        },
        error: function(xhr, status, error) {
            console.log("AJAX Error:", error);
        }
    });
});
</script>

</body>
</html>
