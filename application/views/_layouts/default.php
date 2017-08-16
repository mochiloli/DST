<?php $this->load->view('_partials/navbar'); ?>

<style>
    .owl-theme .owl-nav [class*=owl-] {
        color: #FFF;
        font-size: 14px;
        margin: 5px;
        padding: 4px 7px;
        background: #ffffff;
        display: inline-block;
        cursor: pointer;
        border-radius: 25px;
    }
    .owl-theme .owl-nav [class*=owl-]:hover {
        background: #ffffff;
        color: #FFF;
        text-decoration: none;
    }
</style>

<div class="container">
    <section class="content">
        <?php $this->load->view($inner_view); ?>
    </section>
</div>

