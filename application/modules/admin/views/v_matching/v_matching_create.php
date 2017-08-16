
<div class="row">
	<div class="col-md-8">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open("admin/c_matching/process", array('method'=>'get'));
        ?>
				<div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label"> </label>
								<input type="hidden" name="amount" value="<?php echo $amount; ?>">
                <div class="col-lg-12">

                </div>
            </div>
				</div>
				<?PHP
				//for($i=0;$i<$amount;$i++){
				?>

									<table class="table table-striped table-bordered table-autosort" cellspacing="0" width="50%">
										<thead>
											<tr>
												<th class="text-center" width="15%"> จัดการ </th>
												<th class="text-center"> ตำแหน่ง </th>
											</tr>
										</thead>
										<tbody id="tab_logic1">
											<tr id="addone0">
												<td colspan="2" class="text-center"> <!--กดเครื่องหมาย + เพื่อเพิ่มข้อมูล--> </td>
											</tr>
											<tr>
												<td class="text-center" style="vertical-align: middle;"> </td>
												<td><center><div class="container2">
												<?php for($i=0;$i<10;$i++) {
													if($i==3) echo "--";
												?>
													<input type="text" name="number[]" value="" size="1" maxlength="1" style="text-align:center;" onKeyUp="if(isNaN(this.value)){ sweetAlert('กรุณากรอกตัวเลข', 'ระบุเลข 0-9 เท่านั้น', 'error', 'allowOutsideClick: true'); this.value='';}" required>
												<?php } ?>
											</div></center></td>
											</tr>
										</tbody>
									</table>

				<?PHP //} ?>
        <div class="row">
            <div class="col-lg-6 form-group">
							<!--<button type="button" onclick="return add_row_compound();" class="btn btn-info pull-left"><i class="fa fa-plus"></i></button>-->
            </div>
            <div class="col-lg-6 form-group">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check fa-lg"></i> Save</button>
                </div>
            </div>
        </div>

        <?php echo form_close(); ?>
        <?php echo modules::run("adminlte/widget/box_close"); ?>
    </div>
</div>

<script>
		var i = $(".compound").length;
		function add_row_compound() {
				console.log(i);
				var html = '<td class="text-center" style="vertical-align: middle;"> <a onclick="deleterow1(' + (i+1) + ')" class="btn btn-danger"><i class="fa fa-minus "></i> ลบ</a> </td>\n\
				<td><center><div class="container2">\n\
				<?php for($i=0;$i<10;$i++) {
					if($i==3) echo "--";
				?>
					<input type="text" name="number[]" value="" size="1" maxlength="1" style="text-align:center;" required>\n\
				<?php } ?>\n\
				</div></center></td>';
				$('#tab_logic1').append('<tr id="addone' + (i+1) + '">' + html + '</tr>');
				i++;
				return true;
			}
			function deleterow1(i) {
				$("#addone" + (i)).remove();
			}

		$(function () {
			var container = document.getElementsByClassName("container2")[0];
			container.onkeyup = function(e) {
	    var target = e.srcElement;
	    var maxLength = parseInt(target.attributes["maxlength"].value, 10);
	    var myLength = target.value.length;
	    if (myLength >= maxLength) {
	        var next = target;
	        while (next = next.nextElementSibling) {
	            if (next == null)
	                break;
	            if (next.tagName.toLowerCase() == "input") {
	                next.focus();
	                break;
	            }
	        }
	    }
			}
		});




		$(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            yearRange: "-100:+0"
        });
    });

		$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    //icon: 'glyphicon glyphicon-check'
                },
                off: {
                    //icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});

</script>
