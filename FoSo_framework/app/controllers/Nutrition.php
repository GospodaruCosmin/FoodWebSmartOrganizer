<?php
header('Content-Type: application/json; charset=utf-8');

class Nutrition extends Controller
{
    use Database;

    public function index()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $email = $_COOKIE['userConn'];
        $idOwner = $this->getID($email);

        $mysql = $this->connect();
        $stmt = $mysql->prepare("INSERT INTO nutritional_values (idOwner, kcal, fat, sugars, fibre, protein, date) VALUES (?, ?, ?, ?, ?, ?, CURDATE())");
        $stmt->bind_param("iddddd", $idOwner, $data['Calories'], $data['Fat'], $data['Sugar'], $data['Fiber'], $data['Protein']);
        $stmt->execute();

        $row = $stmt->affected_rows;
        if ($row > 0) {
            echo "Added!";
        } else {
            echo "Failed to add values.";
        }

        $stmt->close();
        $mysql->close();
    }
}