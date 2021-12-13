<div>
    <ul>
        <li><a href="<?php echo base_url('index.php/page/home'); ?>">Home</a></li>


        <?php

        if ($this->session->userdata('sebagai') == 'admin') {
        ?>
            <li><a href="<?php echo base_url('index.php/page/test'); ?>">testing jika admin</a></li>
        <?php
        }
        ?>
    </ul>
    <ul>
        <li><a href="<?php echo base_url('index.php/autentikasi/logout'); ?>">Logout</a></li>
    </ul>
</div>

</div>