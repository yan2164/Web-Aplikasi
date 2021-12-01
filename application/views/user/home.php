<div class="user-container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata ?>
    <div class="card-deck">
        <?php foreach ($data as $key) { ?>
            <div class="card-user" style="width: 18rem;">
                <img class="card-image" src="<?php echo $key['avatar']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $key['first_name'] ?></h5>
                    <p class="card-text"><?php echo $key['email'] ?></p>
                    <a href="<?= base_url('user/edit') ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= base_url('user/delete') ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        <?php }; ?>
        <?php ?>
    </div>
</div>