
<div class="row">
	<div class="col-md-8">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open("admin/c_matching/process");
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
				<div id="tab_logic1">
				<div class="row" id="addone0">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >ระบุคู่ตัวเลขคู่ที่ <?php echo "1"; ?> (เช่น 00) </label>
								<div class="col-md-2">
										<a class="btn btn-danger" disabled><i class="fa fa-minus "></i> ลบ</a>
								</div>
								<div class="col-md-10">
                    <input name="number[]" value="" type="number" min="00" max="99" placeholder="คู่ตัวเลข" class="form-control" required>
                </div>
            </div>
						<div class="col-lg-6 form-group">
							<label class="col-lg-12 control-label" >Check</label>
                <div class="col-md-12">
									<!-- All colors -->
									<span class="button-checkbox">
											<button type="button" class="btn" data-color="default" disabled>0</button>
											<input type="checkbox" class="hidden" disabled/>
									</span>
									<span class="button-checkbox">
											<button type="button" class="btn" data-color="default" disabled>8</button>
											<input type="checkbox" class="hidden" disabled/>
									</span>
									<span class="button-checkbox">
											<button type="button" class="btn" data-color="default" disabled>0</button>
											<input type="checkbox" class="hidden" disabled/>
									</span>
									<span> -- </span>
							<span class="button-checkbox">
									<button type="button" class="btn" data-color="default">8</button>
									<input type="checkbox" class="hidden" />
							</span>
							<span class="button-checkbox">
									<button type="button" class="btn" data-color="primary">2</button>
									<input type="checkbox" class="hidden" />
							</span>
							<span class="button-checkbox">
									<button type="button" class="btn" data-color="success">5</button>
									<input type="checkbox" class="hidden" />
							</span>
							<span class="button-checkbox">
									<button type="button" class="btn" data-color="info">6</button>
									<input type="checkbox" class="hidden" />
							</span>
							<span class="button-checkbox">
									<button type="button" class="btn" data-color="warning">8</button>
									<input type="checkbox" class="hidden" />
							</span>
							<span class="button-checkbox">
									<button type="button" class="btn" data-color="danger">2</button>
									<input type="checkbox" class="hidden" />
							</span>
							<span class="button-checkbox">
									<button type="button" class="btn" data-color="secondary">3</button>
									<input type="checkbox" class="hidden" />
							</span>
                </div>
            </div>
				</div>
			</div>
				<?PHP //} ?>
				<div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" > </label>
                <div class="col-lg-12">
									<button type="button" onclick="return add_row_compound();" class="btn btn-info pull-left"><i class="fa fa-plus"></i></button>
                </div>
            </div>
				</div>
        <div class="row">
            <div class="col-lg-6 form-group">

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
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            yearRange: "-100:+0"
        });
    });

		var i = $(".compound").length;
    function add_row_compound() {
        console.log(i);
        var html = '<div class="col-lg-6 form-group">\n\
						<label class="col-lg-12 control-label" >ระบุคู่ตัวเลขคู่ที่ ' + (i+2) + ' (เช่น 00) </label>\n\
						<div class="col-md-2">\n\
								<a onclick="deleterow1(' + (i+2) + ')" class="btn btn-danger"><i class="fa fa-minus "></i> ลบ</a>\n\
						</div>\n\
						<div class="col-md-10">\n\
								<input name="number[]" value="" type="number" min="00" max="99" placeholder="คู่ตัวเลข" class="form-control" required>\n\
						</div>\n\
				</div>\n\
				<div class="col-lg-6 form-group">\n\
					<label class="col-lg-12 control-label" >Check</label>\n\
						<div class="col-md-12">\n\
							<span class="button-checkbox">\n\
									<button type="button" class="btn" data-color="default" disabled>0</button>\n\
									<input type="checkbox" class="hidden" disabled/>\n\
							</span>\n\
							<span class="button-checkbox">\n\
									<button type="button" class="btn" data-color="default" disabled>8</button>\n\
									<input type="checkbox" class="hidden" disabled/>\n\
							</span>\n\
							<span class="button-checkbox">\n\
									<button type="button" class="btn" data-color="default" disabled>0</button>\n\
									<input type="checkbox" class="hidden" disabled/>\n\
							</span>\n\
							<span> -- </span>\n\
					<span class="button-checkbox">\n\
							<button type="button" class="btn" data-color="default">8</button>\n\
							<input type="checkbox" class="hidden" />\n\
					</span>\n\
					<span class="button-checkbox">\n\
							<button type="button" class="btn" data-color="primary">2</button>\n\
							<input type="checkbox" class="hidden" />\n\
					</span>\n\
					<span class="button-checkbox">\n\
							<button type="button" class="btn" data-color="success">5</button>\n\
							<input type="checkbox" class="hidden" />\n\
					</span>\n\
					<span class="button-checkbox">\n\
							<button type="button" class="btn" data-color="info">6</button>\n\
							<input type="checkbox" class="hidden" />\n\
					</span>\n\
					<span class="button-checkbox">\n\
							<button type="button" class="btn" data-color="warning">8</button>\n\
							<input type="checkbox" class="hidden" />\n\
					</span>\n\
					<span class="button-checkbox">\n\
							<button type="button" class="btn" data-color="danger">2</button>\n\
							<input type="checkbox" class="hidden" />\n\
					</span>\n\
					<span class="button-checkbox">\n\
							<button type="button" class="btn" data-color="secondary">3</button>\n\
							<input type="checkbox" class="hidden" />\n\
					</span>\n\
						</div>\n\
				</div>';
        $('#tab_logic1').append('<div class="row" id="addone' + (i+2) + '">' + html + '</div>');
        i++;
        return true;
    }
    function deleterow1(i) {
        $("#addone" + (i)).remove();
    }

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
