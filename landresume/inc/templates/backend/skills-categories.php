<select name="skills_categories[]" size="10" class="selectpicker" multiple>
    <?php
        $ArrVal2 = explode(',',$skillsCategories);
        $cats = get_categories();

        foreach ($cats as $cat):
    ?>
            <option value="<?php echo $cat->term_id; ?>" <?php echo (in_array($cat->term_id, $ArrVal2)) ? 'selected="selected"' : ''; ?>><?php echo $cat->name; ?></option>
    <?php endforeach; ?>
</select>