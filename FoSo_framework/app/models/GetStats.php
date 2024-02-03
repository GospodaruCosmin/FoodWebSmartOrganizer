<?php

class GetStats
{
    use Database;

    public function index()
    {
        $email = $_COOKIE['userConn'];
        $idOwner = $this->getID($email);

        $mysql = $this->connect();

        // total nutritional values consumate in ziua curenta
        $stmt = $mysql->prepare("SELECT SUM(kcal) AS total_kcal, SUM(fat) AS total_fat, SUM(sugars) AS total_sugars, SUM(fibre) AS total_fibre, SUM(protein) AS total_protein FROM nutritional_values WHERE idOwner = ? AND date = CURDATE()");
        $stmt->bind_param("i", $idOwner);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // numar de iteme in shopping list
        $stmt2 = $mysql->prepare("SELECT COUNT(*) AS total_items FROM shopping_list WHERE idOwner = ?");
        $stmt2->bind_param("i", $idOwner);
        $stmt2->execute();

        $result2 = $stmt2->get_result();
        $row2 = $result2->fetch_assoc();

        // numar de saved products
        $stmt3 = $mysql->prepare("SELECT COUNT(*) AS total_saved_products FROM saved_products WHERE idOwner = ?");
        $stmt3->bind_param("i", $idOwner);
        $stmt3->execute();

        $result3 = $stmt3->get_result();
        $row3 = $result3->fetch_assoc();

        // numar de saved recipes
        $stmt4 = $mysql->prepare("SELECT COUNT(*) AS total_saved_recipes FROM saved_recipes WHERE idOwner = ?");
        $stmt4->bind_param("i", $idOwner);
        $stmt4->execute();

        $result4 = $stmt4->get_result();
        $row4 = $result4->fetch_assoc();

        // total nutritional values consumate in ultima saptamana
        $lastWeekStartDate = date('Y-m-d', strtotime('-1 week'));
        $stmt5 = $mysql->prepare("SELECT SUM(kcal) AS total_kcal_week, SUM(fat) AS total_fat_week, SUM(sugars) AS total_sugars_week, SUM(fibre) AS total_fibre_week, SUM(protein) AS total_protein_week FROM nutritional_values WHERE idOwner = ? AND date >= ?");
        $stmt5->bind_param("is", $idOwner, $lastWeekStartDate);
        $stmt5->execute();

        $result5 = $stmt5->get_result();
        $row5 = $result5->fetch_assoc();

        // total nutritional values consumate in ultima luna
        $lastMonthStartDate = date('Y-m-d', strtotime('-1 month'));
        $stmt6 = $mysql->prepare("SELECT SUM(kcal) AS total_kcal_month, SUM(fat) AS total_fat_month, SUM(sugars) AS total_sugars_month, SUM(fibre) AS total_fibre_month, SUM(protein) AS total_protein_month FROM nutritional_values WHERE idOwner = ? AND date >= ?");
        $stmt6->bind_param("is", $idOwner, $lastMonthStartDate);
        $stmt6->execute();

        $result6 = $stmt6->get_result();
        $row6 = $result6->fetch_assoc();

        if ($row && $row2 && $row3 && $row4 && $row5 && $row6) {
            $totalKcal = number_format($row['total_kcal'], 2);
            $totalFat = number_format($row['total_fat'], 2);
            $totalSugars = number_format($row['total_sugars'], 2);
            $totalFibre = number_format($row['total_fibre'], 2);
            $totalProtein = number_format($row['total_protein'], 2);
            $totalItems = $row2['total_items'];
            $totalSavedProducts = $row3['total_saved_products'];
            $totalSavedRecipes = $row4['total_saved_recipes'];
            $totalKcalLastWeek = number_format($row5['total_kcal_week'], 2);
            $totalFatLastWeek = number_format($row5['total_fat_week'], 2);
            $totalSugarsLastWeek = number_format($row5['total_sugars_week'], 2);
            $totalFibreLastWeek = number_format($row5['total_fibre_week'], 2);
            $totalProteinLastWeek = number_format($row5['total_protein_week'], 2);
            $totalKcalLastMonth = number_format($row6['total_kcal_month'], 2);
            $totalFatLastMonth = number_format($row6['total_fat_month'], 2);
            $totalSugarsLastMonth = number_format($row6['total_sugars_month'], 2);
            $totalFibreLastMonth = number_format($row6['total_fibre_month'], 2);
            $totalProteinLastMonth = number_format($row6['total_protein_month'], 2);

            $response = [
                'kcalToday' => $totalKcal,
                'fatToday' => $totalFat,
                'sugarsToday' => $totalSugars,
                'fibreToday' => $totalFibre,
                'proteinToday' => $totalProtein,
                'shoppingList' => $totalItems,
                'savedProducts' => $totalSavedProducts,
                'savedRecipes' => $totalSavedRecipes,
                'kcalLastWeek' => $totalKcalLastWeek,
                'fatLastWeek' => $totalFatLastWeek,
                'sugarsLastWeek' => $totalSugarsLastWeek,
                'fibreLastWeek' => $totalFibreLastWeek,
                'proteinLastWeek' => $totalProteinLastWeek,
                'kcalLastMonth' => $totalKcalLastMonth,
                'fatLastMonth' => $totalFatLastMonth,
                'sugarsLastMonth' => $totalSugarsLastMonth,
                'fibreLastMonth' => $totalFibreLastMonth,
                'proteinLastMonth' => $totalProteinLastMonth,
            ];
            return json_encode($response);
        } else {
            return "error";
        }

        $stmt->close();
        $stmt2->close();
        $stmt3->close();
        $stmt4->close();
        $stmt5->close();
        $stmt6->close();
        $mysql->close();
    }
}
