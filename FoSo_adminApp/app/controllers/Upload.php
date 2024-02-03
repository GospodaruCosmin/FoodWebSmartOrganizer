<?php
class Upload extends Controller
{
    use Database;

    public function index()
    {
        $statusMsg = '';
        //echo basename($_SERVER['REQUEST_URI']);
        if (isset($_POST['submit'])) {
            if (!empty($_FILES["image"]["name"])) {
                $fileName = basename($_FILES["image"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg');

                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = file_get_contents($image);
                    //
                    $mysql = $this->connect();
                    $selectedPage = basename($_SERVER['REQUEST_URI']);
                    // Escape the image content
                    //echo "sel ".$selectedPage;
                    $query = "DELETE FROM images WHERE page = ?";
                    $stmt = $mysql->prepare($query);
                    $stmt->bind_param("s", $selectedPage);
                    $stmt->execute();
                    $stmt->close();


                    $imgContent = $mysql->real_escape_string($imgContent);
                    // Construct the SQL query
                    $query = "INSERT INTO images (image, page) VALUES ('$imgContent', '$selectedPage')";

                    // Execute the query
                    $result = $mysql->query($query);

                    if ($result) {
                        if ($mysql->affected_rows > 0) {
                            echo "Added!";
                            $statusMsg = "File uploaded successfully.";
                        } else {
                            echo "Failed to add values.";
                            $statusMsg = "File upload failed, please try again.";
                        }
                    } else {
                        echo "Error executing query: " . $mysql->error;
                    }

                    //$mysql->close();
                } else {
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
            } else {
                $statusMsg = 'Please select an image file to upload.';
            }
        }
        $this->view('upload','',$statusMsg);
        // $query = "SELECT image FROM images";
        // $result = $mysql->query($query);
        
        // if ($result) {
        //     while ($row = $result->fetch_assoc()) {
        //         // Display the image
        //         echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Image" />';
        //     }
        // } else {
        //     echo "Error retrieving images from the database.";
        // }
        //echo $statusMsg;
    }
}