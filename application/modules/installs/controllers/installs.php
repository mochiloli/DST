<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Installs extends MY_Controller {

    public function index() {

        if (in_array(ENVIRONMENT, array('development', 'testing'))) {
            $this->mBodyClass = 'swagger-section';
            $this->render('home', 'empty');
        } else {
            redirect();
        }
    }

    public function create_tables() {
        $this->load->dbforge();
        $this->load->helper('file');
        $fields = array();

        $tablecodename = $this->input->post('tablecodename');
        $tablename = $this->input->post('tablename');
        $field_name = $this->input->post('field_name');
        $i = 0;

        $this->create_model($tablecodename . "_" . $tablename, $tablename, $field_name);
        $this->create_menu($tablename, $field_name);
        $this->create_controller($tablename, $field_name);
        $this->create_view_list($tablename, $field_name);
        $this->create_view_edit($tablename, $field_name);

        foreach ($field_name as $row) {

            if (!empty($this->input->post('field_extra')[$i])) {
                $auto = TRUE;
            } else {
                $auto = FALSE;
            }

            if ($this->input->post('field_default_type')[$i] == 'NULL') {
                $nullsa = TRUE;
            } else {
                $nullsa = FALSE;
            }

            $arrays = array(
                $row => array(
                    'type' => $this->input->post('field_type')[$i],
                    'constraint' => $this->input->post('field_length')[$i],
                    'auto_increment' => $auto,
                    'null' => $nullsa
                )
            );

            if ($this->input->post('field_key')[$i] == "primary") {
                $this->dbforge->add_key($row, TRUE);
            }

            $fields = array_merge($fields, $arrays);
            $i++;
        }
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($tablecodename . "_" . $tablename);

        redirect('installs/', 'refresh');
    }

    public function create_model($tablecodename = null, $tablename = null, $field_name = null) {

        $data = "<?php class Da_" . $tablename . " extends MY_Model { ";
        foreach ($field_name as $row) {
            if ($row !== "id" && $row !== "date_add" && $row !== "date_update") {
                $data .= "public \$" . $row . "; ";
            }
        }

        $data .= " public function inserts() { ";
        foreach ($field_name as $row) {
            if ($row !== "id" && $row !== "date_add" && $row !== "date_update" && $row !== "id_user_update") {
                $data .= " \$this->db->set('" . $row . "', \$this->" . $row . "); ";
            }
        }
        $data .= " \$this->db->from('" . $tablecodename . "'); return \$this->db->insert(); }";


        $data .= " public function inserts_array(\$data=null) {
				\$this->db->set(\$data);
				\$this->db->from('" . $tablecodename . "');
				return \$this->db->insert();
			}
			public function updates_array(\$data=null,\$key=null) {
				return \$this->db->update('" . $tablecodename . "', \$data, \$key);
			}";


        $data .= " public function updates() { ";
        foreach ($field_name as $row) {
            if ($row !== "id" && $row !== "date_add" && $row !== "date_update" && $row !== "id_user_add") {
                $data .= " \$this->db->set('" . $row . "', \$this->" . $row . "); ";
            }
        }
        $data .= " \$this->db->from('" . $tablecodename . "');
		\$this->db->where('" . $field_name[0] . "', \$this->" . $field_name[0] . ");
		return \$this->db->update(); }

			public function deletes() {
				\$this->db->from('" . $tablecodename . "');
				\$this->db->where('" . $field_name[0] . "', \$this->" . $field_name[0] . ");
				\$this->db->delete();
			}

			public function get_all() {
				\$this->db->from('" . $tablecodename . "');
				\$this->db->order_by('" . $field_name[0] . "', 'DESC');
				return \$this->db->get()->result();
			}

			public function get_by_key(\$key) {
				\$this->db->select('*');
				\$this->db->from('" . $tablecodename . "');
				\$this->db->where('" . $field_name[0] . "', \$key);
				\$query = \$this->db->get()->result();
				return \$query;
			}

		}";


        if (!write_file('application/models/da_' . $tablename . '.php', $data)) {
            echo 'Unable Models Da to write the file</br>';
        } else {
            echo 'File Models Da written!</br>';
        }

        $data = "<?php

		include('da_" . $tablename . ".php');

		class Mo_" . $tablename . " extends Da_" . $tablename . " {

		}
		";

        if (!write_file('application/models/mo_' . $tablename . '.php', $data)) {
            echo 'Unable Models Mo to write the file</br>';
        } else {
            echo 'File Models Mo written!</br>';
        }
    }

    public function create_menu($tablename = null, $field_name = null) {
        $data = "
				\$config['ci_bootstrap_menu']['menu']['" . $tablename . "'] = array(
					'name' => '" . ucfirst($tablename) . "',
					'url' => '" . $tablename . "',
					'icon' => 'fa fa-cube',
				);";


        if (!write_file('application/modules/admin/config/ci_bootstrap_menu.php', $data, 'a')) {
            echo 'Unable Menu Mo to write the file</br>';
        } else {
            echo 'File Menu Mo written!</br>';
        }
    }

    public function create_controller($tablename = null, $field_name = null) {
        $data = "
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class " . ucfirst($tablename) . " extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			\$this->load->library('form_builder');
			\$this->load->library('form_validation');
			\$this->load->model('mo_" . $tablename . "');
			\$this->load->helper('url');
		}
		
		public function index() {
                
			\$this->mPageTitle = '" . "Table " . ucfirst($tablename) . "';
			\$this->mViewData['original'] = \$this->mo_" . $tablename . "->get_all();
			\$this->render('" . $tablename . "/v_" . $tablename . "');
		}

		public function create(\$id=NULL) {

				";
        $ckro = 0;
        foreach ($field_name as $row) {
            if ($row != "" && $ckro != 0) {
                if ($row !== "id" && $row !== "date_add" && $row !== "date_update" && $row !== "id_user_add" && $row !== "id_user_update") {
                    $data .= "\$this->form_validation->set_rules('" . $row . "','" . ucfirst($row) . "', 'required');";
                }
            }
            $ckro++;
        }

        $data .= " if(\$id!=NULL || !empty(\$this->input->post('" . $field_name[0] . "'))){
            \$this->mPageTitle = 'Update " . ucfirst($tablename) . "';
			if(\$this->form_validation->run() == FALSE){
				\$this->mViewData['" . $tablename . "'] = \$this->mo_" . $tablename . "->get_by_key(\$id);
			}
			else{ ";
        foreach ($field_name as $row) {
            if ($row != "") {
                if ($row !== "date_add" && $row !== "date_update" && $row !== "id_user_add") {
                    $data .= "\$this->mo_" . $tablename . "->" . $row . " = \$this->input->post('" . $row . "'); ";
                }
            }
        }
        $data .= " \$this->mo_" . $tablename . "->updates();
				redirect('admin/" . $tablename . "/');
			}
		}
		else{ \$this->mPageTitle = 'Create " . ucfirst($tablename) . "';
			if(\$this->form_validation->run() == FALSE){
				
			}
			else{
			";

        foreach ($field_name as $row) {
            if ($row != "") {
                if ($row !== "id" && $row !== "date_add" && $row !== "date_update" && $row !== "id_user_update") {
                    $data .= "\$this->mo_" . $tablename . "->" . $row . " = \$this->input->post('" . $row . "');
				";
                }
            }
        }

        $data .= "
				\$this->mo_" . $tablename . "->inserts();
				redirect('admin/" . $tablename . "/');
			}
		}

		
		
		\$this->render('" . $tablename . "/v_" . $tablename . "_create');
	}
	
	public function deletes(\$id=NULL) {
		if(\$id!=NULL){
			\$this->mo_" . $tablename . "->" . $field_name[0] . " = \$id;
			\$this->mo_" . $tablename . "->deletes();
		}
		redirect('admin/" . $tablename . "/');
	}

}
						";


        if (!write_file('application/modules/admin/controllers/' . $tablename . '.php', $data)) {
            echo 'Unable Controller to write the file</br>';
        } else {
            echo 'File Controller written!</br>';
        }
    }

    public function create_view_list($tablename = null, $field_name = null) {
        $data = '
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <a href="' . $tablename . '/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                                </a> 
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
					<thead>
						<tr><th>No.</th>';
        $ckro = 0;

        foreach ($field_name as $row) {
            if ($row != "" && $ckro != 0) {
                $data .= '
		<th>' . ucfirst(str_replace('_', ' ', $row)) . '</th>
		';
            }
            $ckro++;
        }
        $data .= '<th>Actions</th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td><?PHP echo $key+1; ?></td>
			';
        $ckro = 0;
        foreach ($field_name as $row) {
            if ($row != "" && $ckro != 0) {
                $data .= '
		<td><?PHP echo $row->' . $row . ';?></td>';
            }
            $ckro++;
        }
        $data .= '</div>
		<td>
                 <a href="' . $tablename . '/create/<?PHP echo $row->' . $field_name[0] . ';?>" class="btn btn-success">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                  </a>
                  <a href="' . $tablename . '/deletes/<?PHP echo $row->' . $field_name[0] . ';?>"
                   onclick="return confirm('."'".'Are you sure you want to delete this <?PHP echo $row->' . $field_name[1] . '; ?> ?'."'".');"
                   class="btn btn-danger">
                   <i class="fa fa-times-circle" aria-hidden="true"></i> Delete
                   </a>
                    </td>
                    </tr>
			<?PHP } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>';
        if (!write_file('application/modules/admin/views/' . $tablename . '/v_' . $tablename . '.php', $data)) {

            mkdir('application/modules/admin/views/' . $tablename);

            if (!write_file('application/modules/admin/views/' . $tablename . '/v_' . $tablename . '.php', $data)) {
                echo 'Unable View to write the file</br>';
            } else {
                echo 'File View written!</br>';
            }
        } else {
            echo 'File View written!</br>';
        }
    }

    public function create_view_edit($tablename = null, $field_name = null) {
        $data = '
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open();
        ?>  <div class="row">';
        $ckro = 0;
        foreach ($field_name as $row) {
            if ($row != "" && $ckro != 0) {
                if ($row !== "id" && $row !== "date_add" && $row !== "date_update" && $row !== "id_user_add" && $row !== "id_user_update") {
                    $data .= '
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >' . ucfirst(str_replace('_', ' ', $row)) . ' </label>  
                <div class="col-lg-12"> 
                    <input name="' . $row . '" value="<?PHP if(!empty($' . $tablename . '[0]->' . $row . ')) echo $' . $tablename . '[0]->' . $row . ';?>" type="text" placeholder="' . ucfirst(str_replace('_', ' ', $row)) . '" class="form-control" > 
                </div> 
            </div>';
                }
            }
            $ckro++;
        }

        $data .= '</div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> Save</button>
                    <input type="hidden" name="' . $field_name[0] . '" value="<?PHP if(!empty($' . $tablename . '[0]->' . $field_name[0] . ')) echo $' . $tablename . '[0]->' . $field_name[0] . ';?>">
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
</script>';

        if (!write_file('application/modules/admin/views/' . $tablename . '/v_' . $tablename . '_create.php', $data)) {
            echo 'Unable View Create to write the file</br>';
        } else {
            echo 'File View Create written!</br>';
        }
    }

}
