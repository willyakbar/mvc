<div class="container">

    <div class="row mt-md-3">
        <div class="col-md-6">
            <?php
            if (isset($_SESSION['flash'])) {
                Helper::flash();
            }
            ?>
        </div>
    </div>

    <div class="row mt-md-3">
        <div class="col-md-6">
            <form action="<?= base ?>user/getChangePassword" method="post">
                <input type="hidden" name="user_id" value="<?= $data['user']['user_id'] ?>">
                <div class="form-group">
                    <label for="current_pass">Current Password :</label>
                    <input type="password" class="form-control" id="current_pass" name="current_pass">
                </div>
                <div class="form-group">
                    <label for="new_pass">New Password :</label>
                    <input type="password" class="form-control" id="new_pass" name="new_pass">
                </div>
                <div class="form-group">
                    <label for="repeat_pass">Repeat New Password :</label>
                    <input type="password" class="form-control" id="repeat_pass" name="repeat_pass">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Change</button>
            </form>
        </div>
    </div>
</div>