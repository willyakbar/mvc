<div class="container">

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php
            if (isset($_SESSION['flash'])) {
                Helper::flash();
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-md-3 mb-5">
            <form action="<?= base ?>user/geteditprofile" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?= $data['user']['user_id'] ?>">
                <input type="hidden" name="old_image" value="<?= $data['user']['image'] ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" value="<?= $data['user']['username']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" value="<?= $data['user']['email'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $data['user']['full_name'] ?>">
                </div>

                <?php if ($data['user']['gender'] == 'male') : ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                        <label class="form-check-label" for="male">male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">female</label>
                    </div>
                <?php else : ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
                        <label class="form-check-label" for="female">female</label>
                    </div>
                <?php endif ?>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" id="address" name="address" value="<?= $data['user']['address'] ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="no_handphone" name="no_handphone" value="<?= $data['user']['no_handphone'] ?>">
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 offset-lg-1">
                        <img src="<?= base ?>assets/img/user/<?= $data['user']['image'] ?>" class="img-thumbnail" width="100">
                    </div>
                    <div class="col">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label for="image" class="custom-file-label mt-3">Choose Image</label>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-block btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>