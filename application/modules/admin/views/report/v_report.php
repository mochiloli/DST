<style>
    @media screen{
        .screen_none{
            display: none;
        }
    }
    @media print{   
        .skin-blue-light .content-wrapper, .skin-blue-light .main-footer{
            border: 0px;
        }
        table.display tr.even.row_selected td {
            background-color: #B0BED9;
        }
        .table-bordered{
            border: 1px solid #111;
            border-collapse: collapse;
        }
        .dataTables_filter,.dataTables_length,.dataTables_info,.dataTables_paginate{
            display: none;     
        }  
        .bordernon_top{
            border: 0px !important;
            border-top-color: red !important;
        }
        .main-footer{
            display: none;
        }
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_desc:after{
            content: "";
        }
        .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 1px solid #111 !important;
            border-collapse: collapse;
        }
    </style>

    <script>
        $(function () {
            $(".date").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy',
                yearRange: "-100:+0"
            });
        });
    </script>

    <div class="row">
        <div class="col-md-12">
            <?PHP
            echo form_open();
            ?>
            <div class="box box-primary bordernon_top">
                <div class="row hidden-screen">
                    <div class="col-lg-12 form-group"> 
                        <h3 class="screen_none" ><?php echo $page_title; ?> </h3>  
                    </div>
                </div>
                <div class="box-header hidden-print">
                    <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                    <div class="row hidden-print">
                        <div class="col-lg-2 form-group"> 
                            <div class="row">
                                <label class="col-lg-12 control-label" >วันที่เริ่มต้น</label>  
                                <div class="col-lg-12"> 
                                    <input name="date_start" type="text" placeholder="วันที่เริ่มต้น" value="<?php echo set_value('date_start'); ?>" class="form-control date"> 
                                </div> 
                            </div>
                        </div> 
                        <div class="col-lg-2 form-group"> 
                            <div class="row">
                                <label class="col-lg-12 control-label" >วันที่สิ้นสุด </label>  
                                <div class="col-lg-12"> 
                                    <input name="date_end" type="text" placeholder="วันที่สิ้นสุด" value="<?php echo set_value('date_end'); ?>" class="form-control date"> 
                                </div> 
                            </div>
                        </div>
                        <div class="col-lg-2 form-group"> 
                            <div class="row">
                                <label class="col-lg-12 control-label" >สถานะ </label>  
                                <div class="col-lg-12"> 
                                    <div><input name="enrollments_status" type="radio" value="ยังไม่ชำระเงิน" checked=""> ยังไม่ชำระเงิน</div>
                                    <div><input name="enrollments_status" type="radio" value="ชำระเงินแล้ว"> ชำระเงินแล้ว</div>
                                    <div><input name="enrollments_status" type="radio" value="ยกเลิก"> ยกเลิก</div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-lg-2 form-group"> 
                            <div class="col-lg-12 hidden-print"> 
                                <button type="submit" class="btn btn-info"><i class="fa fa-search fa-lg"></i> ค้นหา</button>
                            </div>
                        </div>
                    </div>



                    <div class="row screen_none">
                        <label class="col-lg-4 control-label" >วันที่เริ่มต้น : <?php echo set_value('date_start'); ?></label>   
                        <label class="col-lg-4 control-label" >วันที่สิ้นสุด : <?php echo set_value('date_end'); ?></label>  
                    </div>

                    <table class="table table-bordered table-autosort" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>วันที่</th>
                                <th>ชื่อคอร์สอบรม</th>
                                <th>ชื่อ-นามสกุล(ภาษาไทย)</th>
                                <th>ชื่อ-นามสกุล(ภาษาอังกฤษ)</th>
                                <th>ที่อยู่</th>
                                <th>เบอร์โทร</th>
                                <th>แฟกซ์</th>
                                <th>อีเมล</th>
                                <th>ธนาคาร</th>
                                <th style="width: 150px;">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($enrollments) { ?>
                                <?php foreach ($enrollments as $key => $row) { ?>
                                    <tr>
                                        <td><?PHP echo $key + 1; ?></td>
                                        <td><?PHP echo date('d/m/Y H:i:s', strtotime($row->enrollments_date)); ?></td>
                                        <td><?PHP echo $row->topic; ?></td>
                                        <td><?PHP echo $row->name_th; ?></td>
                                        <td><?PHP echo $row->name_en; ?></td>
                                        <td><?PHP echo $row->address; ?></td>
                                        <td><?PHP echo $row->tel; ?></td>
                                        <td><?PHP echo $row->fax; ?></td>
                                        <td><?PHP echo $row->email; ?></td>
                                        <td><?PHP echo $row->bank_name; ?></td>
                                        <td>
                                            <?PHP echo $row->enrollments_status; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="11">ไม่มีพบข้อมูล</td>       
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br/>
                    <div class="row hidden-print">
                        <div class="col-lg-12 form-group"> 
                            <div class="col-lg-12"> 
                                <button type="submit" onclick="window.print();" class="btn btn-primary pull-right"><i class="fa fa-print fa-lg"></i> ปริ้นรายงาน</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?> 


