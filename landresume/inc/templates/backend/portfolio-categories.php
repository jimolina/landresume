<select name="portfolio_categories[]" size="10" class="selectpicker" multiple>
    <?php
        $ArrVal3 = explode(',',$portfolioCategories);
        $cats = get_categories();

        foreach ($cats as $cat):
    ?>
            <option value="<?php echo $cat->term_id; ?>" <?php echo (in_array($cat->term_id, $ArrVal3)) ? 'selected="selected"' : ''; ?>><?php echo $cat->name; ?></option>
    <?php endforeach; ?>
</select>