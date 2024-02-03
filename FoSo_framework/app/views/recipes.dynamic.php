<?php if(is_object($data)){?>
<div id="section3" class="section3">
        
        <div class="most-liked-recipes">
            <div class="title">
                <h1>Suggested recipes for you based on your search</h1>
                
            </div>
            <?php 
            $i = 0;
            while($i <3 && ($i*3 < $data->totalResults && $i*3+1 < $data->totalResults && $i*3+2 < $data->totalResults)){
            ?>
            <div class="recipes-row">
                <div class="recipes">
                    <div class="desc-food">
                        <img class="img-popular" src="<?php echo $data->results[$i*3]->image ?>">
                            <div class="desc">
                                <h3><?php echo $data->results[$i*3]->title ?></h3>
                            </div>
                            <div class="desc">
                                <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data->results[$i*3]->id?>">View ingredients</a></i>
                                <i><a onclick="saveRecipe(
                                        '<?php echo $data->results[$i*3]->id; ?>',
                                        '<?php echo $data->results[$i*3]->image; ?>',
                                        '<?php echo $data->results[$i*3]->title; ?>'
                                        )">Save recipe</a></i>
                            </div>
                    </div>

                </div>
                
            <div class="recipes">
                <div class="desc-food">
                    <img class="img-popular"src="<?php echo $data->results[$i*3+1]->image ?>">
                        <div class="desc">
                            <h3><?php echo $data->results[$i*3+1]->title ?></h3>
                        </div>
                        <div class="desc">
                            <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data->results[$i*3+1]->id?>">View ingredients</a></i>
                            <i><a onclick="saveRecipe(
                                        '<?php echo $data->results[$i*3+1]->id; ?>',
                                        '<?php echo $data->results[$i*3+1]->image; ?>',
                                        '<?php  echo $data->results[$i*3+1]->title; ?>'
                                        )">Save recipe</a></i>
                        </div>
                </div>

            </div>
            <div class="recipes">
                <div class="desc-food">
                    <img class="img-popular" src="<?php echo $data->results[$i*3+2]->image ?>">
                        <div class="desc">
                            <h3><?php echo $data->results[$i*3+2]->title ?></h3>
                        </div>
                        <div class="desc">
                            <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data->results[$i*3+2]->id?>">View ingredients</a></i>
                            <i><a onclick="saveRecipe(
                                        '<?php echo $data->results[$i*3+2]->id; ?>',
                                        '<?php echo $data->results[$i*3+2]->image; ?>',
                                        '<?php echo $data->results[$i*3+2]->title; ?>'
                                        )">Save recipe</a></i>                        
                        </div>
                </div>

            </div>
        </div>
        <?php $i++;}?>
        </div>
 <?php }?>           