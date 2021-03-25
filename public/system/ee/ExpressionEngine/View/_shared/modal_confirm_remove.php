<div class="modal-wrap modal-wrap--small <?=$name?> hidden">
	<div class="modal modal--no-padding dialog dialog--danger">

		<?=form_open($form_url, '', (isset($hidden)) ? $hidden : array())?>
		<div class="dialog__header">
			<div class="dialog__icon"><i class="fas fa-trash-alt"></i></div>
			<h2 class="dialog__title"><?=isset($title) ? $title : lang('confirm_removal') ?></h2>
			<div class="dialog__close js-modal-close"><i class="fas fa-times"></i></div>
		</div>

		<div class="dialog__body">
			<?=isset($alert) ? $alert : lang('confirm_removal_desc')?>

			<ul class="checklist">
			<?php if (isset($checklist)):
                $end = end($checklist); ?>
				<?php foreach ($checklist as $item): ?>
				<li<?php if ($item == $end) {
                    echo ' class="last"';
                } ?>><?=$item['kind']?>: <b><?=$item['desc']?></b></li>
				<?php endforeach;
            endif ?>
			</ul>

			<div class="ajax"><?=isset($ajax_default) ? $ajax_default : '' ?></div>
		</div>

		<div class="dialog__actions <?php if (isset($secure_form_ctrls)): ?>dialog__actions--with-bg<?php endif ?>">
			<?php if (isset($secure_form_ctrls)): ?>
				<?php $this->embed(
                'ee:_shared/form/fieldset',
                ['setting' => $secure_form_ctrls, 'group' => false]
            ); ?>
			<?php endif ?>
			<div class="dialog__buttons">
				<div class="form-btns">
					<?php
                    $btn_text = 'btn_confirm_and_remove';
                    $btn_working_text = 'btn_confirm_and_remove_working';
                    if (isset($button['text'])) {
                        $btn_text = $button['text'];
                    }
                    if (isset($button['working'])) {
                        $btn_working_text = $button['working'];
                    }?>
					<?=cp_form_submit($btn_text, $btn_working_text, null, false, true)?>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
