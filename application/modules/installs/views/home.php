<div id='header'>
    <div class="swagger-ui-wrap">
        <a id="logo" href=""><?php echo $site_name; ?></a>
    </div>
</div>
<script>
    var key_row = 0;
</script>
<link rel="stylesheet" href="<?PHP echo base_url(); ?>/assets/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?PHP echo base_url(); ?>/assets/css/datatables.min.css">
<?PHP
$attributes = array('class' => 'form-horizontal', "role" => "form");
echo form_open("installs/create_tables", $attributes);
?>
<div id="message-bar" class="swagger-ui-wrap" data-sw-translate>&nbsp;</div>
<div id="swagger-ui-container" class="swagger-ui-wrap"></div>
<div class="col-md-6">
    Table Code : <input type="text" name="tablecodename">

    Table Name : <input type="text" name="tablename">

    Column : <input type="number" name="columns" id="columns">

    <input type="button" id="addcolumns" value="Add">

    <table id="table_columns" class="table table-striped table-bordered dataTable no-footer">

        <th>Name</th>
        <th>Type</th>
        <th>Length/Values</th>
        <th>Default</th> 
        <th>Index</th>
        <th>A_I</th>
        <tbody id="contentfile">
<!--		<tr>
                        <td class="center">
                                <input id="field_0_1" type="text" name="field_name[0]" maxlength="64" class="textfield" title="Column" size="10" value="">
                        </td>
                        <td class="center">
                                <select class="column_type" name="field_type[0]" id="field_0_2">
                                        <option >INT</option>
                                        <option >VARCHAR</option>
                                        <option >TEXT</option>
                                        <option >DATE</option>
                                        <optgroup label="Numeric">
                                                <option >TINYINT</option>
                                                <option >SMALLINT</option>
                                                <option >MEDIUMINT</option>
                                                <option >INT</option>
                                                <option >BIGINT</option>
                                                <option disabled="disabled">-</option>
                                                <option >DECIMAL</option>
                                                <option >FLOAT</option>
                                                <option >DOUBLE</option>
                                                <option >REAL</option>
                                                <option disabled="disabled">-</option>
                                                <option >BIT</option>
                                                <option >BOOLEAN</option>
                                                <option >SERIAL</option>
                                        </optgroup>
                                        <optgroup label="Date and time">
                                                <option >DATE</option>
                                                <option >DATETIME</option>
                                                <option >TIMESTAMP</option>
                                                <option >TIME</option>
                                                <option >YEAR</option>
                                        </optgroup>
                                        <optgroup label="String">
                                                <option >CHAR</option>
                                                <option >VARCHAR</option><option disabled="disabled">-</option>
                                                <option >TINYTEXT</option>
                                                <option >TEXT</option>
                                                <option >MEDIUMTEXT</option>
                                                <option >LONGTEXT</option>
                                                <option disabled="disabled">-</option>
                                                <option >BINARY</option>
                                                <option >VARBINARY</option><option disabled="disabled">-</option>
                                                <option >TINYBLOB</option>
                                                <option >MEDIUMBLOB</option>
                                                <option >BLOB</option>
                                                <option >LONGBLOB</option>
                                                <option disabled="disabled">-</option>
                                                <option >ENUM</option>
                                                <option >SET</option>
                                        </optgroup>
                        
                                </select>
                        </td>
                        <td class="center">
                                <input id="field_0_3" type="text" name="field_length[0]" size="8" value="" class="textfield">
                                <p class="enum_notice" id="enum_notice_0_3" style="display: none;">
                                        <a href="#" class="open_enum_editor">Edit ENUM/SET values</a>
                                </p>
                        </td>
                        <td class="center">
                                <select name="field_default_type[0]" id="field_0_4" class="default_type">
                                        <option value="NONE">None</option>
                                        <option value="NULL">NULL</option>
                                </select>
                        </td>
                        <td class="center">
                                <select name="field_key[0]" id="field_0_7" data-index="">
                                        <option value="none_0">---</option>
                                        <option value="primary_0" title="Primary">PRIMARY</option>
                                        <option value="unique_0" title="Unique">UNIQUE</option>
                                        <option value="index_0" title="Index">INDEX</option>
                                        <option value="fulltext_0" title="Fulltext">FULLTEXT</option>
                                        <option value="spatial_0" title="Spatial">SPATIAL</option>
                                </select>
                        </td>
                        <td class="center">
                                <input name="field_extra[0]" id="field_0_8" type="checkbox" value="AUTO_INCREMENT">
                        </td>
                        <td class="center">
                                <input id="field_0_9" type="text" name="field_comments[0]" size="12" maxlength="1024" value="" class="textfield">
                        </td>
                </tr>--> 

        </tbody>
        <input type="submit" value="submit">
    </table>
</div>


<script>
    $("#addcolumns").click(function () {
        var html = "";

        var loops = key_row + +$("#columns").val();

        for (key_row; key_row < loops; key_row++) {
            html += '<tr>';
            html += '<td class="center"><input type="text" name="field_name[' + key_row + ']" maxlength="64" class="textfield" title="Column" size="10" value=""></td>';

            html += '<td class="center"><select class="column_type" name="field_type[' + key_row + ']" id="field_' + key_row + '_2"><option >INT</option><option >VARCHAR</option><option >TEXT</option>';
            html += '<option >DATE</option><optgroup label="Numeric"><option >TINYINT</option><option >SMALLINT</option><option >MEDIUMINT</option><option >INT</option>';
            html += '<option >BIGINT</option><option disabled="disabled">-</option><option >DECIMAL</option><option >FLOAT</option><option >DOUBLE</option><option >REAL</option>';
            html += '<option disabled="disabled">-</option><option >BIT</option><option >BOOLEAN</option><option >SERIAL</option></optgroup><optgroup label="Date and time"><option >DATE</option>';
            html += '<option >DATETIME</option><option >TIMESTAMP</option><option >TIME</option><option >YEAR</option></optgroup><optgroup label="String"><option >CHAR</option>';
            html += '<option >VARCHAR</option><option disabled="disabled">-</option><option >TINYTEXT</option><option >TEXT</option><option >MEDIUMTEXT</option><option >LONGTEXT</option>';
            html += '<option disabled="disabled">-</option><option >BINARY</option><option >VARBINARY</option><option disabled="disabled">-</option><option >TINYBLOB</option><option >MEDIUMBLOB</option>';
            html += '<option >BLOB</option><option >LONGBLOB</option><option disabled="disabled">-</option><option >ENUM</option><option >SET</option></optgroup></select></td>';


            html += '<td class="center"><input id="field_0_3" type="text" name="field_length[' + key_row + ']" size="8" value="" class="textfield"><p class="enum_notice" id="enum_notice_' + key_row + '_3"';
            html += 'style="display: none;"><a href="#" class="open_enum_editor">Edit ENUM/SET values</a></p></td>';


            html += '<td class="center"><select name="field_default_type[' + key_row + ']" id="field_' + key_row + '_4" class="default_type"><option value="NONE">None</option><option value="NULL">NULL</option>';
            html += '</select></td>';

            html += '<td class="center"><select name="field_key[' + key_row + ']" id="field_' + key_row + '_7" data-index=""><option value="none">---</option>';
            html += '<option value="primary" title="Primary">PRIMARY</option><option value="unique" title="Unique">UNIQUE</option>';
            html += '<option value="index" title="Index">INDEX</option><option value="fulltext" title="Fulltext">FULLTEXT</option>';
            html += '<option value="spatial" title="Spatial">SPATIAL</option></select></td>';

            html += '<td class="center"><input name="field_extra[' + key_row + ']" id="field_' + key_row + '_8" type="checkbox" value="AUTO_INCREMENT"></td>';


            html += '</tr>';
        }


        $("#contentfile").append(html);

    });
</script>
<?php echo form_close(); ?>	






























