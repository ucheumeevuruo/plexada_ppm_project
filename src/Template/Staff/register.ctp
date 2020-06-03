<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body py-5">
        <!-- Nested Row within Card Body -->
        <div class="container-fluid">
            <div class="row">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
            </div>

            <?= $this->Form->create($staff) ?>
            <div class="row">
                <div class="col-lg-6">
                    <?php
                        echo $this->Form->control('user.username');
                        echo $this->Form->control('first_name');
                        echo $this->Form->control('other_name');
                        echo $this->Form->control('last_name');
                        echo $this->Form->control('user.email');
                        echo $this->Form->control('user.password');
                     ?>
                </div>
                <div class="col-lg-6">
                    <div class="">

                        <?php
                        echo $this->Form->control('address', ['type' => 'textarea']);
                        echo $this->Form->control('state');
                        echo $this->Form->control('country');
                        echo $this->Form->control('phone_no');
                        echo $this->Form->control('role_id', ['options' => $role, 'empty' => true]);
                        ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-user btn-block']) ?>
    <!--                    <div class="text-center">-->
    <!--                        <a class="small" href="forgot-password.html">Forgot Password?</a>-->
    <!--                    </div>-->
    <!--                    <div class="text-center">-->
    <!--                        <a class="small" href="login.html">Already have an account? Login!</a>-->
    <!--                    </div>-->
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>