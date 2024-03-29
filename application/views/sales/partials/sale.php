<div class="row">
	<div class="col-md-8">
		<div class="form-group <?php echo form_is_error('name'); ?>">
			<label for="name" class="control-label col-sm-3">Service <span class="required">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="name" id="name" class="form-control input-sm" value="<?php echo set_value('pid'); ?>" pattern=".{1,50}" title="Allow enter between 1 to 50 characters" required placeholder="Product Name" />
				<?php echo form_error('name'); ?>
			</div>
		</div>
        <div class="form-group">
            <label for="employee" class="control-label col-sm-3">Employee</label>
            <div class="col-sm-9">
                <input type="text" name="employee" id="employee" class="form-control input-sm" value="<?php echo set_value('eid'); ?>" placeholder="Employee Name" />
            </div>
        </div>
        <div class="form-group">
            <label for="room" class="control-label col-sm-3">Room</label>
            <div class="col-sm-9">
                <input type="text" name="room" id="room" class="form-control input-sm" value="" placeholder="Room Name" />
            </div>
        </div>
		<?php if ($categories): ?>
			<!--<div class="form-group <?php echo form_is_error('cid'); ?>">
				<label for="cid" class="control-label col-sm-3">Category</label>
				<div class="col-sm-9">
					<?php //echo form_select('cid', $categories, 'category', set_value('cid')); ?>
				</div>
			</div>-->
		<?php endif; ?>
	</div>
	<div class="col-md-4">

	</div>
</div>

<script>
    $(function() {
        <?php
            
            $js ="var availableTagsEmployees = [";
            foreach($employees as $rows){
                $js.="'".$rows->firstname." ".$rows->lastname."',";
            }
            $js.="];";
            
            print $js;
            
            $jsR ="var availableTagsRooms = [";
            foreach($rooms as $rows){
                $jsR.="'".$rows->room_name."',";
            }
            $jsR.="];";
            
            print $jsR;
        ?>
        $( "#employee" ).autocomplete({
            source: availableTagsEmployees
        });
        $( "#room" ).autocomplete({
            source: availableTagsRooms
        });
    });
</script>