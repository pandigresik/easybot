<@php $this->extend('master'); ?>

<@php $this->section('main'); ?>
    <@x-page-head>
        <div class="row">
            <div class="col">
                <h2><@= lang('crud.{table}.tableName') ?></h2>
            </div>
            <div class="col-auto">
                <a href="<@php echo url_to($baseRoute.'/new'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i>  <@= lang('crud.{table}.tableName') ?></a>
            </div>
        </div>
    </x-page-head>

    <@x-admin-box>
        <div>
            <div class="row">
                <!-- List {table}s -->
                <div class="col table-responsive" id="{table}-list">
                    <@php echo $this->include($viewPrefix.'\_table'); ?>
                    <@php echo $pager->links() ?>
                </div>
            </div>
        </div>

    </x-admin-box>
<@php $this->endSection(); ?>

<@php $this->section('scripts'); ?>
<script>

</script>
<@php $this->endSection(); ?>
