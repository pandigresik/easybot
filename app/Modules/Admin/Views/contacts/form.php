<?php $this->extend('master'); ?>

<?php $this->section('main'); ?>
    <x-page-head>
        <a href="<?php echo $backUrl ?>" class="back">&larr; <?= lang('crud.contacts.tableName') ?></a>
        <h4><?php echo isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  <?= lang('crud.contacts.tableName') ?></h4>
    </x-page-head>

    <x-admin-box>

        <form action="<?php echo $actionUrl; ?>" method="post" enctype="multipart/form-data">

            <?php echo csrf_field(); ?>

            <?php if (isset($data) && null !== $data) { ?>
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="id" value="<?php echo $data->id; ?>">
            <?php } ?>

            <fieldset>
                                <div class="row mb-3">
                    <?= form_label(lang('crud.contacts.name'),'',['for' => 'name', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('name', old('name', $data->name ?? ''), "class='form-control varchar' required placeholder='".lang('crud.contacts.name')."' ") ?>
                        <?php if (has_error('name')) { ?>
                        <p class="text-danger"><?php echo error('name'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.contacts.identity_number'),'',['for' => 'identity_number', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('identity_number', old('identity_number', $data->identity_number ?? ''), "class='form-control varchar' required placeholder='".lang('crud.contacts.identity_number')."' ") ?>
                        <?php if (has_error('identity_number')) { ?>
                        <p class="text-danger"><?php echo error('identity_number'); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </fieldset>

            <div class="offset-md-2 py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> <?= lang('crud.contacts.tableName') ?></button>
            </div>

        </form>

    </x-admin-box>

<?php $this->endSection(); ?>
