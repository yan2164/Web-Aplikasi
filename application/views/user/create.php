<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h1 class="card-title text-center">Create</h1>
        </div>
        <div class="card-text">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="inputEmail">First name</label>
                    <?= form_error('firstname', '<small class="text-warning">', '</small>'); ?>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="firstname" value="<?= set_value('firstname'); ?>" aria-describedby="emailHelp" placeholder="First name">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Last name</label>
                    <?= form_error('lastname', '<small class="text-warning">', '</small>'); ?>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="lastname" value="<?= set_value('lastname'); ?>" aria-describedby="emailHelp" placeholder="Last name">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <?= form_error('email', '<small class="text-warning">', '</small>'); ?>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= set_value('email'); ?>" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="d-grid md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="text-center">
                </div>
            </form>
        </div>
    </div>
</div>