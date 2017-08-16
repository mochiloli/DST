<!--<div id='header'>
    <div class="swagger-ui-wrap">
        <a id="logo" href=""><?php echo $site_name; ?></a>
    </div>
</div>-->
<script>
    var key_row = 1;
    var chk_class = false;
</script>
<!--<div id="message-bar" class="swagger-ui-wrap" data-sw-translate>&nbsp;</div>-->
<!--<div id="swagger-ui-container" class="swagger-ui-wrap"></div>-->
<?PHP // echo  ?>
<div class="row">
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon">
                Class Name : 
            </span>
            <input type="text" name="tablename" class="form-control" placeholder="Class Name." onkeyup="check_class(this);"/>
<!--            <span class="input-group-btn">
                <button class="btn btn-secondary" onclick="check_class();">Check Class.</button>
            </span>-->
        </div>  
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon">
                Table Name : 
            </span>
            <input type="text" name="tablename" class="form-control" />  
        </div>  
    </div>
    <div class="col-md-6"> 
        <div class="input-group">
            <span class="input-group-addon">
                Column : 
            </span>
            <input type="text" name="columns" id="columns" class="form-control" /> 
            <span class="input-group-btn">
                <input class="btn btn-secondary" type="button" id="addcolumns" value="Add" /> 
            </span>
        </div> 
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-12">
        <table id="table_columns" class="table table-striped table-bordered dataTable no-footer">
            <th>No.</th>
            <th>Name</th>
            <th>Type</th>
            <th>Length/Values</th>
            <th>Default</th> 
            <th>Index</th>
            <th>A_I</th>
            <th>Comments</th>
            <tbody id="contentfile">
                <tr class="column-db" id="column-1">
                    <td class="text-center">1.</td><!-- column No. -->
                    <td class="text-center"><!-- column name -->
                        <input id="field_0_1" type="text" name="field_name[]" maxlength="64" class="form-control" class="textfield" title="Column" size="10" value="">
                    </td>
                    <td class="text-center"><!-- column type -->
                        <select class="column_type form-control" name="field_type[]" id="field_0_2">
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
                    <td class="text-center"><!-- column length -->
                        <input id="field_0_3" type="text" name="field_length[]" size="8" value="" class="textfield form-control">
                        <p class="enum_notice" id="enum_notice_0_3" style="display: none;">
                            <a href="#" class="open_enum_editor">Edit ENUM/SET values</a>
                        </p>
                    </td>
                    <td class="text-center"><!-- column default -->
                        <select name="field_default_type[]" id="field_0_4" class="default_type form-control">
                            <option value="NONE">None</option>
                            <option value="USER_DEFINED">As defined:</option>
                            <option value="NULL">NULL</option>
                            <option value="CURRENT_TIMESTAMP">CURRENT_TIMESTAMP</option>
                        </select>
                    </td>
                    <td class="text-center">
                        <select name="field_key[]" id="field_0_7" data-index="" class="form-control">
                            <option value="none_0">---</option>
                            <option value="primary_0" title="Primary">PRIMARY</option>
                            <option value="unique_0" title="Unique">UNIQUE</option>
                            <option value="index_0" title="Index">INDEX</option>
                            <option value="fulltext_0" title="Fulltext">FULLTEXT</option>
                            <option value="spatial_0" title="Spatial">SPATIAL</option>
                        </select>
                    </td>
                    <td class="text-center"><!-- column auto_increment -->
                        <input name="field_extra[]" id="field_0_8" type="checkbox" value="AUTO_INCREMENT">
                    </td>
                    <td class="text-center"><!-- column comments -->
                        <input id="field_0_9" type="text" name="field_comments[]" size="12" maxlength="1024" value="" class="textfield form-control">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#addcolumns").click(function () {
        var html = "";
//        console.log();
        console.log(key_row);
        console.log($("#columns").val());
        if (key_row > $("#columns").val()) {
            console.log('false');
            console.log("--------------------");
            return false;
        } else {
            console.log('true');
            console.log("--------------------");
        }

        var loops = (parseInt(key_row) + parseInt($("#columns").val())) - $('.column-db').length;
//        console.log(loops);
        for (key_row; key_row < loops; key_row++) {
//            console.log(key_row + ' : ' + loops);
            //Start rows
            html += '<tr class="column-db" id="column-' + (parseInt(key_row) + 1) + '">';
            //column 1
            html += '<td class="text-center">' + (parseInt(key_row) + 1) + '</td>';
            //column 2
            html += '<td class="text-center"><input type="text" name="field_name[]" maxlength="64" class="textfield form-control" title="Column" size="10" value=""></td>';
            //column 3
            html += '<td class="text-center"><select class="column_type form-control" name="field_type[]" id="field_' + key_row + '_2"><option >INT</option><option >VARCHAR</option><option >TEXT</option>';
            html += '<option >DATE</option><optgroup label="Numeric"><option >TINYINT</option><option >SMALLINT</option><option >MEDIUMINT</option><option >INT</option>';
            html += '<option >BIGINT</option><option disabled="disabled">-</option><option >DECIMAL</option><option >FLOAT</option><option >DOUBLE</option><option >REAL</option>';
            html += '<option disabled="disabled">-</option><option >BIT</option><option >BOOLEAN</option><option >SERIAL</option></optgroup><optgroup label="Date and time"><option >DATE</option>';
            html += '<option >DATETIME</option><option >TIMESTAMP</option><option >TIME</option><option >YEAR</option></optgroup><optgroup label="String"><option >CHAR</option>';
            html += '<option >VARCHAR</option><option disabled="disabled">-</option><option >TINYTEXT</option><option >TEXT</option><option >MEDIUMTEXT</option><option >LONGTEXT</option>';
            html += '<option disabled="disabled">-</option><option >BINARY</option><option >VARBINARY</option><option disabled="disabled">-</option><option >TINYBLOB</option><option >MEDIUMBLOB</option>';
            html += '<option >BLOB</option><option >LONGBLOB</option><option disabled="disabled">-</option><option >ENUM</option><option >SET</option></optgroup></select></td>';
            //column 4
            html += '<td class="text-center"><input id="field_0_3" type="text" name="field_length[]" size="8" value="" class="textfield form-control"><p class="enum_notice" id="enum_notice_' + key_row + '_3"';
            html += 'style="display: none;"><a href="#" class="open_enum_editor">Edit ENUM/SET values</a></p></td>';
            //column 5
            html += '<td class="text-center"><select name="field_default_type[]" id="field_' + key_row + '_4" class="default_type form-control"><option value="NONE">None</option>';
            html += '<option value="USER_DEFINED">As defined:</option><option value="NULL">NULL</option><option value="CURRENT_TIMESTAMP">CURRENT_TIMESTAMP</option></select></td>';
            //column 6
            html += '<td class="text-center"><select name="field_key[]" id="field_' + key_row + '_7" data-index="" class="form-control"><option value="none_' + key_row + '">---</option>';
            html += '<option value="primary_' + key_row + '" title="Primary">PRIMARY</option><option value="unique_' + key_row + '" title="Unique">UNIQUE</option>';
            html += '<option value="index_' + key_row + '" title="Index">INDEX</option><option value="fulltext_' + key_row + '" title="Fulltext">FULLTEXT</option>';
            html += '<option value="spatial_' + key_row + '" title="Spatial">SPATIAL</option></select></td>';
            //column 7
            html += '<td class="text-center"><input name="field_extra[]" id="field_' + key_row + '_8" type="checkbox" value="AUTO_INCREMENT"></td>';
            //column 8
            html += '<td class="text-center"><input id="field_' + key_row + '_9" type="text" name="field_comments[]" size="12" maxlength="1024" value="" class="textfield form-control"></td>';
            html += '</tr>';
            //End rows
        }
        $("#contentfile").append(html);
        return false;
    });
</script>































