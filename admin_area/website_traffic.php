<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', '', 'Mystore');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    exit();
}

// Function to track page visit
function track_page_visit($page_url, $con) {
    $sql = "INSERT INTO website_traffic (page_url) VALUES ('$page_url')";
    mysqli_query($con, $sql);
}

// Function to get traffic data
function get_traffic_data($con) {
    $sql = "SELECT page_url, COUNT(*) as visit_count FROM website_traffic WHERE page_url = 'http://localhost/Ecommerce%20website/index.php' GROUP BY page_url";
    $result = mysqli_query($con, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['page_url']] = $row['visit_count'];
    }
    return $data;
}

// Track page visit
$page_url = 'http://localhost/Ecommerce%20website/index.php';
track_page_visit($page_url, $con);

// Get traffic data
$traffic_data = get_traffic_data($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Traffic Monitor</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Website Traffic Monitor</h1>
        <canvas id="trafficChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('trafficChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_keys($traffic_data)); ?>,
                datasets: [{
                    label: 'Page Visits',
                    data: <?php echo json_encode(array_values($traffic_data)); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
