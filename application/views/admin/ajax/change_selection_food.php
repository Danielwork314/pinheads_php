<select class="form-control" required name="food_id" id="food_id">
    <?php foreach($food as $row){ ?>
        <option value="<?= $row['food_id']?>"><?= $row['food'] ?></option>
    <?php } ?>
</select>