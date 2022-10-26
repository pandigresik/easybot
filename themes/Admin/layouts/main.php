<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <?php echo $this->include('layouts/header') ?>
    <div class="body flex-grow-1 px-5">        
        <div>{alerts}</div>
        <?php echo $this->renderSection('main') ?>        
    </div>
    <?php echo $this->include('layouts/footer') ?>
</div>