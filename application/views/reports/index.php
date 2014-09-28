<div class="panel-heading">
	<h3 class="panel-title"><?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<div class="content">
		<div class="filter">
			<?php
			echo form_open('reports/', 'class="form-inline" role="form"');
			?>
			<div class="form-group">
				<input type="text" class="form-control input-sm" id="date" name="date" value="<?php echo
				set_value('date', mdate('%d-%m-%Y')); ?>" pattern=".{10}" />
			</div>
			<div class="form-group">
				<?php echo form_dropdown('type', array('daily' => 'Daily', 'monthly' => 'Monthly', 'yearly' => 'Yearly'), set_value('type'), 'class="form-control input-sm"') ?>
			</div>
			<div class="form-group">
				<?php
				if ($cashiers) {
				?>
					<select name="cashier" class="form-control input-sm">
                        <option selected="selected">All</option>
						<?php
						foreach($cashiers as $cashier) {
							echo '<option value="' . $cashier->firstname . '" ' . set_select('cashier', $cashier->firstname) . '>' . $cashier->firstname . '</option>';
						}
						?>
					</select>
				<?php
				}
				?>
			</div>
			<div class="form-group">
				<?php
				if ($categories) {
					?>
					<select name="category" class="form-control input-sm">
                        <option selected="selected">All</option>
						<?php
						foreach($categories as $category) {
							echo '<option value="' . $category->name . '" ' . set_select('category', $category->name) . '>' . $category->name . '</option>';
						}
						?>
						<option value="Accessories" <?php echo set_select('category', 'Accessories'); ?>>Accessories</option>
					</select>
				<?php
				}
				?>
			</div>
			<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
            
			
		</div>
        <div style="margin-bottom: 10px;">
             <a id="clickPrint" class="btn btn-sm btn-info "
             title="Print"><span class="glyphicon glyphicon-print"></span> Print</a> 
             <button type="submit" class="btn btn-sm btn-info" value="Export" name="export"><i class="glyphicon"></i> Export</button>
        </div>
        </form>
        
		<?php
		if ($this->session->userdata('type') == 'daily' || !$this->session->userdata('type')) {
			$this->load->view('reports/partials/daily');
		} elseif ($this->session->userdata('type') == 'monthly') {
			$this->load->view('reports/partials/monthly');
		} elseif ($this->session->userdata('type') == 'yearly') {
			$this->load->view('reports/partials/yearly');
		}
		?>
	</div>
</div>
<script>
    function printData()
    {
       var divToPrint=document.getElementById("areaToPrint");
       newWin= window.open("");
       newWin.document.write(divToPrint.outerHTML);
       newWin.print();
       newWin.close();
    }

    $('#clickPrint').on('click',function(){
        printData();
    })
    /*$(document).ready(function(){
        $("#clickExport").click(function(e) {
            window.open('data:application/vnd.ms-excel,' + $('#areaToPrint').html());
            e.preventDefault();
        });
    });*/ 
</script>
