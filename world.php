<?php
$servername = "localhost";
$username = "lab5_user"; 
$password = "password123"; 
$dbname = "world";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$country = isset($_GET['country']) ? $conn->real_escape_string($_GET['country']) : "";
$lookup = isset($_GET['lookup']) ? $_GET['lookup'] : "";

if ($lookup === "cities") {

    $sql = "
        SELECT cities.name AS city, cities.district, cities.population
        FROM cities
        JOIN countries ON countries.code = cities.country_code
        WHERE countries.name LIKE '%$country%'
    ";

    $result = $conn->query($sql);

    echo "<table border='1'>
            <tr>
                <th>City</th>
                <th>District</th>
                <th>Population</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['city']}</td>
                <td>{$row['district']}</td>
                <td>{$row['population']}</td>
            </tr>";
    }

    echo "</table>";

} else {

    $sql = "
        SELECT name, continent, independence_year, head_of_state
        FROM countries
        WHERE name LIKE '%$country%'
    ";

    $result = $conn->query($sql);

    echo "<table border='1'>
            <tr>
                <th>Country</th>
                <th>Continent</th>
                <th>Independence Year</th>
                <th>Head of State</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['continent']}</td>
                <td>{$row['independence_year']}</td>
                <td>{$row['head_of_state']}</td>
            </tr>";
    }

    echo "</table>";
}

$conn->close();
?>
