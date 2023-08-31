<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #pieChartContainer {
            position: relative;

            margin: auto;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <h2 class="text-center">Male / Female Students</h2>
            <div id="pieChartContainer">
                <canvas id="pieChart" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $.ajax({
        url: "fetch_gender_data.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            var pieChart = new Chart($("#pieChart"), {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [
                        {
                            data: [data.male_count, data.female_count],
                            backgroundColor: ['#3498db', '#e74c3c'],
                            borderColor: '#fff',
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    legend: {
                        display: true,
                        position: 'right'
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
