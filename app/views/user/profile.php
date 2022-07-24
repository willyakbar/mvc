<div class="container">

    <div class="row mt-5 mb-5">
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= base ?>/assets/img/user/<?= $data['user']['image'] ?>" width="200">
                <div class="card-body">
                    <p class="card-text"><?= $data['user']['username'] ?></p>
                    <p class="card-text"><?= $data['user']['email'] ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-primary text-white">User Profile</li>
                <li class="list-group-item"><?= $data['user']['full_name'] ?></li>
                <li class="list-group-item"><?= $data['user']['gender'] ?></li>
                <li class="list-group-item"><?= $data['user']['address'] ?></li>
                <li class="list-group-item"><?= $data['user']['no_handphone'] ?></li>
            </ul>
        </div>
    </div>

</div>