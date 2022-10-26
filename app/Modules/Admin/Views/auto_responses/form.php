<?php $this->extend('master'); ?>

<?php $this->section('main'); ?>
    <x-page-head>
        <a href="<?php echo $backUrl ?>" class="back">&larr; <?= lang('crud.auto_responses.tableName') ?></a>
        <h4><?php echo isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  <?= lang('crud.auto_responses.tableName') ?></h4>
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
                    <?= form_label(lang('crud.auto_responses.message'),'',['for' => 'message', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('message', old('message', $data->message ?? ''), "class='form-control varchar' required placeholder='".lang('crud.auto_responses.message')."' ") ?>
                        <?php if (has_error('message')) { ?>
                        <p class="text-danger"><?php echo error('message'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.auto_responses.chat_type'),'',['for' => 'chat_type', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('chat_type', old('chat_type', $data->chat_type ?? ''), "class='form-control enum' required placeholder='".lang('crud.auto_responses.chat_type')."' ") ?>
                        <?php if (has_error('chat_type')) { ?>
                        <p class="text-danger"><?php echo error('chat_type'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.auto_responses.destination'),'',['for' => 'destination', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('destination', old('destination', $data->destination ?? ''), "class='form-control varchar' required placeholder='".lang('crud.auto_responses.destination')."' ") ?>
                        <?php if (has_error('destination')) { ?>
                        <p class="text-danger"><?php echo error('destination'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.auto_responses.response'),'',['for' => 'response', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_textarea('response', old('response', $data->response ?? ''), "rows='4' class='form-control text' required placeholder='".lang('crud.auto_responses.response')."' ") ?>
                        <?php if (has_error('response')) { ?>
                        <p class="text-danger"><?php echo error('response'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.auto_responses.description'),'',['for' => 'description', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('description', old('description', $data->description ?? ''), "class='form-control varchar' required placeholder='".lang('crud.auto_responses.description')."' ") ?>
                        <?php if (has_error('description')) { ?>
                        <p class="text-danger"><?php echo error('description'); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </fieldset>

            <div class="offset-md-2 py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> <?= lang('crud.auto_responses.tableName') ?></button>
            </div>

        </form>

    </x-admin-box>

<?php $this->endSection(); ?>
