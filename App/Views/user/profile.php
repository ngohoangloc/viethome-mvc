<?php $this->layout(config('view.layout')); ?>

<?php $this->start('page'); ?>

<section class="py-5" style="background-color:#F7F7F7;">
    <div class="container ">
        <div class="col ">
            <div class="card">

                <h2 class="pt-3 pb-3 text-center text-success">PROFILE</h2>

                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">First name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profile->firstname; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Last name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profile->lastname; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Location</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profile->location; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $user_mail; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profile->phone; ?>
                        </div>
                    </div>

                    <hr>

                    <div class="col-sm-12 text-center">
                        <a class="btn btn-primary" href="<?= request()->baseUrl() ?>/profile/edit" data-id="<?= $profile->id ?>">Update profile</a>
                        <a class="btn btn-danger" href="<?= request()->baseUrl() ?>/change-password" data-id="<?= $profile->id ?>">Change password</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $this->stop() ?>