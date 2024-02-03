<?php


class Home extends Controller
{
    use Database;
    public function index(){
        
       $this->checkConnected();
       $data['images']['products'] = '<img src="' . ROOT . '/assets/img/products2.jpg">';
       $data['images']['recipes'] = '<img src="' . ROOT . '/assets/img/pizza-cropped.jpg">';
       $data['images']['dashboard'] = '<img src="' . ROOT . '/assets/img/index-first.png">';
       $mysql = $this->connect();
        //get image from product page
        $query = "SELECT image FROM images WHERE page = 'products'";
        $result = $mysql->query($query);

        if ($result && $result->num_rows > 0) {
            // Retrieve the image from the database
            $row = $result->fetch_assoc();
            $imageData = $row['image'];

            // Update the image in the $data array
            $data['images']['products'] = '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Image" />';
        }
        //get image from recipe page
        $query = "SELECT image FROM images WHERE page = 'recipes'";
        $result = $mysql->query($query);

        if ($result && $result->num_rows > 0) {
            // Retrieve the image from the database
            $row = $result->fetch_assoc();
            $imageData = $row['image'];

            // Update the image in the $data array
            $data['images']['recipes'] = '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Image" />';
        }
        //get image from dashboard page
        $query = "SELECT image FROM images WHERE page = 'dashboard'";
        $result = $mysql->query($query);

        if ($result && $result->num_rows > 0) {
            // Retrieve the image from the database
            $row = $result->fetch_assoc();
            $imageData = $row['image'];

            // Update the image in the $data array
            $data['images']['dashboard'] = '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Image" />';
        }


        $query = "SELECT id, first_name, last_name, email_address FROM users";
        $result = $mysql->query($query);
        
        $users = array(); // Associative array to store the results
        
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $users[] = array(
                    'id' => $row['id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'email_address' => $row['email_address']
                );
            }
        } else {
            echo "Error retrieving data from the database.";
        }
        


        $this->view('home','',$data,$users);
    }
}

