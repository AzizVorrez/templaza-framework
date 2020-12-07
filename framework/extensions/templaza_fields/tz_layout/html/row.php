<!-- Row in column -->
<div class="fl_row" data-fl-element_type="row">

    <!-- Row controls -->
    <div class="fl_controls fl_controls-row clearfix">
        <div class="fl_controls-row-left">
            <a href="#" class="fl_control fl_column-move" data-fl-control="move" title="<?php
            echo __('Drag to reorder', $this -> text_domain); ?>"><i class="fas fa-arrows-alt"></i></a>
            <span class="fl_control fl_control-title"><?php echo __('Row', $this -> text_domain); ?></span>
        </div>
        <div class="fl_controls-row-right">
            <a href="#" class="fl_control fl_column-delete" data-fl-control="delete" title="<?php
            echo __('Delete Row', $this -> text_domain); ?>"><i class="far fa-trash-alt"></i></a>
            <a href="#" class="fl_control fl_column-clone" data-fl-control="clone" title="<?php
            echo __('Duplicate Row', $this -> text_domain); ?>"><i class="far fa-copy"></i></a>
            <a href="#" class="fl_control fl_column-edit" data-fl-control="edit-row" title="<?php
            echo __('Edit Row', $this -> text_domain); ?>"><i class="far fa-edit"></i></a>
            <a href="#" class="fl_control fl_column-edit-grid" data-fl-control="edit-grid" title="<?php
            echo __('Edit Grid', $this -> text_domain); ?>"><i class="fas fa-columns"></i></a>
            <a href="#" class="fl_control fl_column-add-row" title="<?php echo __('Add Row', $this -> text_domain);
            ?>" data-fl-control="add-row"><i class="fas fa-plus"></i> <?php echo __(' Row', $this -> text_domain); ?></a>
            <a href="#" class="fl_control fl_column-add" title="<?php echo __('Add Column', $this -> text_domain);
            ?>" data-fl-control="add"><i class="fas fa-plus"></i> <?php echo __('Column', $this -> text_domain);?></a>
            <a href="#" class="fl_control fl_column-toggle" title="<?php echo __('Toggle Row', $this -> text_domain);
            ?>" data-fl-control="toggle"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div><!-- End row controls -->
    <!-- Row element wrapper -->
    <div class="fl_element-wrapper">
        <div class="row fl_row_container fl_container_for_children">
            <?php require __DIR__.'/column.php'; ?>
            <?php require __DIR__.'/column.php'; ?>
        </div>
    </div><!-- End row element wrapper -->
</div><!-- End Row in column -->