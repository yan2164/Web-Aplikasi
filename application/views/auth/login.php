<body>
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">Login</h1>
            </div>
            <div class="card-text">
                <form method="POST" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <?= form_error('email', '<small class="text-warning">', '</small>'); ?>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= set_value('email') ?>" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <?= form_error('password', '<small class="text-warning">', '</small>'); ?>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="d-grid md-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="text-center">
                        <a href="<?= base_url('auth/registration') ?>">Register ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>