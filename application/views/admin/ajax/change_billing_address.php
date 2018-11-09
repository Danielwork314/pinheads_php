<select class="form-control" required name="billing_address_id" id="billing_address_id">
    <?php foreach($billing_address as $row){ ?>
        <option value="<?= $row['billing_address_id']?>"><?= $row['address1'], $row['address2'], $row['state'], $row['postcode'], $row['country'] ?></option>
    <?php } ?>
</select>