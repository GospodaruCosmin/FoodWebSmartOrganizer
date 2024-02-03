<?php if(!empty($data)){?>
<div id="section3" class="section3">
<div class="most-liked-recipes">
            <div class="title">
                <h1>Suggested products for you based on your search</h1>
                
            </div>
            <?php 
            $i = 0;
            while($i <3 && ($i*3 < $data['totalProducts'] && $i*3+1 < $data['totalProducts'] && $i*3+2 < $data['totalProducts'])){
            ?>
            <div class="recipes-row">
                <div class="recipes">
                    <div class="desc-food">
                        <img class="img-popular" src="<?php echo $data['products'][$i*3]['image'] ?>">
                            <div class="desc">
                                <h3><?php echo $data['products'][$i*3]['title'] ?></h3>
                            </div>
                            <div class="desc">
                                <i><a href="<?php echo ROOT;?>/product/<?php echo $data['products'][$i*3]['id']?>">View product</a></i>
                                <i><a onclick="saveProduct(
                                        '<?php echo $data['products'][$i*3]['id']; ?>',
                                        '<?php echo $data['products'][$i*3]['image']; ?>',
                                        '<?php echo $data['products'][$i*3]['title']; ?>'
                                        )">Save product</a></i>
                            </div>
                    </div>

                </div>
                
            <div class="recipes">
                <div class="desc-food">
                    <img class="img-popular"src="<?php echo $data['products'][$i*3+1]['image'] ?>">
                        <div class="desc">
                            <h3><?php echo $data['products'][$i*3+1]['title'] ?></h3>
                        </div>
                        <div class="desc">
                            <i><a href="<?php echo ROOT;?>/product/<?php echo $data['products'][$i*3+1]['id']?>">View product</a></i>
                            <i><a onclick="saveProduct(
                                        '<?php echo $data['products'][$i*3+1]['id']; ?>',
                                        '<?php echo $data['products'][$i*3+1]['image']; ?>',
                                        '<?php echo $data['products'][$i*3+1]['title']; ?>'
                                        )">Save product</a></i>
                        </div>
                </div>

            </div>
            <div class="recipes">
                <div class="desc-food">
                    <img class="img-popular"src="<?php echo $data['products'][$i*3+2]['image'] ?>">
                        <div class="desc">
                            <h3><?php echo $data['products'][$i*3+2]['title'] ?></h3>
                        </div>
                        <div class="desc">
                            <i><a href="<?php echo ROOT;?>/product/<?php echo $data['products'][$i*3+2]['id']?>">View product</a></i>
                            <i><a onclick="saveProduct(
                                        '<?php echo $data['products'][$i*3+2]['id']; ?>',
                                        '<?php echo $data['products'][$i*3+2]['image']; ?>',
                                        '<?php echo $data['products'][$i*3+2]['title']; ?>'
                                        )">Save product</a></i>
                        </div>
                </div>

            </div>
        </div>
        <?php $i++;}?>
        
</div>
 <?php }?>           