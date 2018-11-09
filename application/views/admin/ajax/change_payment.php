<select class="form-control" required name="payment_id" id="payment_id">
    <?php foreach($payment as $row){ ?>
        <option value="<?= $row['payment_id']?>"><?= $row['card_no'] ?></option>
    <?php } ?>
</select>