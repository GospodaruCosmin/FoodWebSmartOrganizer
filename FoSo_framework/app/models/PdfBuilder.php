<?php
use Dompdf\Dompdf;

class PdfBuilder {
    public function buildPdf($data) {
        require_once '../app/dompdf/autoload.inc.php';
        $html = "<!DOCTYPE html>
            <html>
                <body>
                    <div class='content'>
                        <h1>Nutritional Values</h1>
                        <div class='content-col'>
                            <div class='prices'>
                                <div class='periods'>
                                    <h2>Today</h2>
                                    <p> Kcal consumed: <span>". $data['kcalToday']."</span> </p>
                                    <p> Fat consumed: <span>".$data['fatToday']."</span> </p>
                                    <p> Sugar consumed: <span>".$data['sugarsToday']."</span> </p>
                                    <p> Fibre consumed: <span>".$data['fibreToday']."</span> </p>
                                    <p> Protein consumed: <span>".$data['proteinToday']."</span> </p>
                                </div>
                                <div class='periods'>
                                    <h2>This week</h2>
                                    <p> Kcal consumed: <span>".$data['kcalLastWeek']."</span> </p>
                                    <p> Fat consumed: <span>". $data['fatLastWeek']."</span> </p>
                                    <p> Sugar consumed: <span>".$data['sugarsLastWeek']."</span> </p>
                                    <p> Fibre consumed: <span>".$data['fibreLastWeek']."</span> </p>
                                    <p> Protein consumed: <span>".$data['proteinLastWeek']."</span> </p>
                                </div>
                                <div class='periods'>
                                    <h2>This month</h2>
                                    <p> Kcal consumed: <span>".$data['kcalLastMonth']."</span> </p>
                                    <p> Fat consumed: <span>". $data['fatLastMonth']."</span> </p>
                                    <p> Sugar consumed: <span>".$data['sugarsLastMonth']."</span> </p>
                                    <p> Fibre consumed: <span>". $data['fibreLastMonth']."</span> </p>
                                    <p> Protein consumed: <span>".$data['proteinLastMonth']."</span> </p>
                                </div>
                            </div>
                        </div>
                        <h1>My lists</h1>
                        <div class='content-col'>
                            <div class='nutritional'>
                                <div class='time-periods'>
                                    <h2>Shopping List</h2>
                                    <p>You have a total of ". $data['shoppingList']." elements in your <span>shopping list</span>.</p>
                                </div>
                                <div class='time-periods'>
                                    <h2>Preferred Products</h2>
                                    <p>You have a total of ". $data['savedProducts']." products in your <span>favourite products list</span>.</p>
                                </div>
                                <div class='time-periods'>
                                    <h2>Favourite Recipes</h2>
                                    <p>You have a total of ". $data['savedRecipes']." recipes in your <span>favourite recipes list</span>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>";

            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4','landscape');
            
            $dompdf->render();
            $dompdf->stream();
    }
}

?>