<select class="form-control" required name="card_id" id="card_id">
    <?php foreach($card as $row){ ?>
        <option value="<?= $row['card_id']?>"><?= $row['card'] ?></option>
    <?php } ?>
</select>