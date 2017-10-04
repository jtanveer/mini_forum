<div class="row">
    <div class="col-1 col-sm-1 col-md-2 col-lg-3"></div>
    <div class="jumbotron col-10 col-sm-10 col-md-8 col-lg-6">
        <?php
            echo $this->Form->create('User', array(
                'url' => 'register',
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),
                'class' => 'well'
            ));
        ?>
        <fieldset>
            <?php
                echo $this->Form->inputs(array(
                    'legend' => __('Register'),
                    'username',
                    'email',
                    'password',
                    'password_again' => array('type' => 'password')
                ));
                echo $this->Form->submit('Register', array(
                    'div' => 'form-group',
                    'class' => 'btn btn-success'
                ));
            ?>
        </fieldset>
        <?php
            echo $this->Form->end();
        ?>
    </div>
    <div class="col-1 col-sm-1 col-md-2 col-lg-3"></div>
</div>