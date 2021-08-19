<?php
defined('BASEPATH') or die('Access Denied');
class SalesInquiryModel extends CI_Model {

    public function newclient_datatable() {

		$this->newclient_query();

		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function newclient_query() {
		$id = 0;
		$this->db->select("*");
		$this->db->from($this->table);
		//$this->db->join($this->join_table_tech,'a.prepared_by=b.id','left');
		$this->db->where("is_deleted",$id);
		
		if(isset($_POST["search"]["value"])){

			$this->db->like("id", $_POST["search"]["value"]);
			$this->db->or_like("a.customer_name", $_POST["search"]["value"]);
			$this->db->or_like("a.contact_person", $_POST["search"]["value"]);
			$this->db->or_like("a.contact_number", $_POST["search"]["value"]);
			$this->db->or_like("a.location", $_POST["search"]["value"]);
			$this->db->or_like("a.email_add", $_POST["search"]["value"]);
            $this->db->or_like("a.date", $_POST["search"]["value"]);
            $this->db->or_like("a.website", $_POST["search"]["value"]);
            $this->db->or_like("a.interest", $_POST["search"]["value"]);
            $this->db->or_like("a.type", $_POST["search"]["value"]);
            $this->db->or_like("a.notes", $_POST["search"]["value"]);
			$this->db->having('a.is_deleted', 0);
			
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.id","DESC");
		}

		
	}

    public function filter_new_client_data() {
		$this->newclient_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_new_client_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where('is_deleted',0);
		return $this->db->count_all_results();
	}

    public function insert_client($data) {
        $this->db->insert('sales_inquiry_tempo_clients',$data);
    }

	public function insert_approved_client($data) {
        $this->db->insert('customer_vt',$data);
    }

	public function get_specific_client($id) {
		$this->db->select("*");
		$this->db->from("sales_inquiry_tempo_clients");
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}

	public function update_client($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('sales_inquiry_tempo_clients', $data);
    }

	public function get_sales_list() {
		$salesposition = 'Pre-Technical Sales';
		
		$this->db->select("*");
		$this->db->from("technicians");
		return $this->db->get()->result();
	}

	public function get_specific_project($id) {
		$this->db->select("*");
		$this->db->from("customers_project");
		$this->db->where('project_id', $id);
		return $this->db->get()->result();
	}

	public function get_specific_client_project($customer_id) {
		$this->db->select("*");
		$this->db->from("customers_project");
		$this->db->where('customer_id', $customer_id);
		return $this->db->get()->result();
	}

	public function get_specific_branch($branch_id) {
		$this->db->select("*");
		$this->db->from("customers_branch");
		$this->db->where('branch_id', $branch_id);
		return $this->db->get()->result();
	}

	public function get_specific_client_branch($customer_id) {
		$this->db->select("*");
		$this->db->from("customers_branch");
		$this->db->where('customer_id', $customer_id);
		return $this->db->get()->result();
	}

	public function get_specific_task($id) {
		$this->db->select("*");
		$this->db->from("sales_inquiry_task");
		$this->db->where('project_id', $id);
		return $this->db->get()->result();
	}

	public function insert_branch($data){
		$this->db->insert('customers_branch',$data);
	}

	public function get_branch_id() {
		$this->db->select('*');
		$this->db->from('customers_branch');
		$this->db->order_by('branch_id','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function insert_project($data){
		$this->db->insert('customers_project',$data);
	}

	public function get_project_id() {
		$this->db->select('*');
		$this->db->from('customers_project');
		$this->db->order_by('project_id','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function insert_project_task($data){
		$this->db->insert('sales_inquiry_task',$data);
	}

	public function get_project_data($client_id) {
		
		$this->db->select("*");
		$this->db->from('customers_project as a');
		$this->db->where("a.customer_id", $client_id);
		$this->db->join($this->join_table,'b.id=a.sales_incharge','inner');
		$this->db->join($this->join_table1,'c.project_id=a.project_id','inner');
		$this->db->where('a.archive', 0);
		$this->db->where('c.mark_last_task', 1);
		$this->db->order_by('c.task_id','DESC');
		return $this->db->get()->result();
	}
	

	public function get_project_task($project_id) {
		$this->db->select('*');
		$this->db->from('sales_inquiry_task');
		$this->db->where('project_id', $project_id);
		$this->db->order_by('task_id', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function update_newclient_branch($branch_id,$data) {
        $this->db->where('branch_id',$branch_id);
        $this->db->update('customers_branch',$data);
    }

	public function update_existingclient_project($project_id,$data) {
        $this->db->where('project_id',$project_id);
        $this->db->update('customers_project',$data);
    }

	public function update_branch($customer_id,$data) {
        $this->db->where('customer_id',$customer_id);
        $this->db->update('customers_branch',$data);
    }

	public function update_project($customer_id,$data) {
        $this->db->where('customer_id',$customer_id);
        $this->db->update('customers_project',$data);
    }

	public function update_task($task_id,$data) {
        $this->db->where('task_id',$task_id);
        $this->db->update('sales_inquiry_task',$data);
    }

	public function get_new_added_task($project_id) {

		$task_id = '';
		$this->db->select('*');
		$this->db->from('sales_inquiry_task');
		$this->db->where('project_id',$project_id);
		$this->db->order_by('task_id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$task_id = $row->task_id;
		}
		return $task_id;
	}

	public function remove_project_task($task_id_data,$project_id) {
		for ($i=0; $i < count($task_id_data); $i++) { 
			$this->db->where('task_id !=',$task_id_data[$i][0]);
		}
		$this->db->where('project_id',$project_id);
		$this->db->delete('sales_inquiry_task');
	}

	public function getSpecificlientdata($client_id){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		$this->db->select("*");
		$this->db->from("sales_inquiry_tempo_clients");
		$this->db->where("id",$client_id);
		$this->db->order_by("id","asc");
		return $this->db->get()->result();
	}

	public function delete_client($client_id) {
        $this->db->where('id',$client_id);
        $this->db->delete('sales_inquiry_tempo_clients');
    }

	public function deleteproject($project_id) {
		$this->db->where('project_id', $project_id);
		$this->db->delete('customers_project');
	}

	public function deletetask($project_id) {
		$this->db->where('project_id', $project_id);
		$this->db->delete('sales_inquiry_task');
	}

	public function hide_client($client_id,$data) {
        $this->db->where('id',$client_id);
        $this->db->update('sales_inquiry_tempo_clients',$data);
    }

	public function get_specific_branch_list($id) {
		
		$this->db->select("*");
		$this->db->from("customers_branch");
		$this->db->where("customer_id", $id);
		return $this->db->get()->result();
	}

	//*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "sales_inquiry_tempo_clients as a";
	var $join_table = "technicians as b";
	var $join_table1 = "sales_inquiry_task as c";
	var $select_column = array(
		"a.id",
		"a.customer_name",
		"a.contact_person",
		"a.contact_number",
		"a.location",
        "a.date",
		"a.email_add",
        "a.website",
        "a.interest",
        "a.type",
        "a.notes"
	);
	var $order_column = array(
		"a.id",
		"a.customer_name",
		"a.contact_person",
		"a.contact_number",
		"a.location",
        "a.date",
		"a.email_add",
        "a.website",
        "a.interest",
        "a.type",
        "a.notes"
	);

	



///EXISTING CLIENT DATABASE

//*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
var $existingclienttable = "customer_vt as a";
var $existingclient_join_table = "sales_quotation_items as b";
var $select_existingclient_column = array(
	"a.CustomerID",
	"a.CompanyName",
	"a.ContactPerson",
	"a.ContactNumber",
	"a.Address",
	"a.InstallationDate",
	"a.Email_Address",
	"a.Website",
	"a.Interest",
	"a.Type",
	"a.Notes"
);
var $order_existingclient_column = array(
	"a.CustomerID",
	"a.CompanyName",
	"a.ContactPerson",
	"a.ContactNumber",
	"a.Address",
	"a.InstallationDate",
	"a.EmailAddress",
	"a.Website",
	"a.Interest",
	"a.Type",
	"a.Notes"
);
var $order_archiveprojects_column = array(
	"a.project_id",
	"b.customer_name",
	"a.project_type",
	"a.project_status",
	"c.lastname",
	"a.branch",
	"d.project_task",
	"d.date_of_task"
);

public function existingclient_datatable() {

	$this->existingclient_query();

	if($_POST["length"] != -1) {
		$this->db->limit($_POST["length"],$_POST["start"]);
	}
	$query = $this->db->get();
	return $query->result();
}

	public function existingclient_query() {
		$id = 0;
		$this->db->select("*");
		$this->db->from($this->existingclienttable);
		//$this->db->join($this->join_table_tech,'a.prepared_by=b.id','left');
		$this->db->where("is_deleted",$id);
		
		if(isset($_POST["search"]["value"])){

			$this->db->like("a.CustomerID", $_POST["search"]["value"]);
			$this->db->or_like("a.CompanyName", $_POST["search"]["value"]);
			$this->db->or_like("a.ContactPerson", $_POST["search"]["value"]);
			$this->db->or_like("a.ContactNumber", $_POST["search"]["value"]);
			$this->db->or_like("a.Address", $_POST["search"]["value"]);
			$this->db->or_like("a.EmailAddress", $_POST["search"]["value"]);
			$this->db->or_like("a.InstallationDate", $_POST["search"]["value"]);
			$this->db->or_like("a.Website", $_POST["search"]["value"]);
			$this->db->or_like("a.Interest", $_POST["search"]["value"]);
			$this->db->or_like("a.Type", $_POST["search"]["value"]);
			$this->db->or_like("a.Notes", $_POST["search"]["value"]);
			$this->db->having('a.is_deleted', 0);
			
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_existingclient_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.CustomerID","DESC");
		}

	
	}

	public function filter_existing_client_data() {
		$this->existingclient_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_existing_client_data() {
		$this->db->select("*");
		$this->db->from($this->existingclienttable);
		$this->db->where('is_deleted',0);
		return $this->db->count_all_results();
	}

	public function getspecificexistingclientdata($existing_client_id){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		$this->db->select("*");
		$this->db->from("customer_vt");
		$this->db->where("CustomerID",$existing_client_id);
		$this->db->order_by("CustomerID","asc");
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function update_existing_client($existing_client_id_edit, $data) {
		$this->db->where('CustomerID', $existing_client_id_edit);
		$this->db->update('customer_vt', $data);
        
    }

	public function delete_existing_client($client_id,$data) {
        $this->db->where('CustomerID',$client_id);
        $this->db->update('customer_vt',$data);
    }

	public function update_specific_branch($client_id,$data) {
        $this->db->where('customer_id',$client_id);
        $this->db->update('customers_branch',$data);
    }

	public function update_specific_project($client_id,$data) {
        $this->db->where('customer_id',$client_id);
        $this->db->update('customers_project',$data);
    }

	public function get_newly_added_client_id() {
		$this->db->select('*');
		$this->db->from('customer_vt');
		$this->db->order_by('CustomerID','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function fetch_branch_name($branch_id) {

		$branch_name = '';
		$this->db->select('*');
		$this->db->from('customers_branch');
		$this->db->where('branch_id',$branch_id);
		$this->db->order_by('branch_id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$branch_name = $row->branch_name;
		}
		return $branch_name;
	}

	public function getNewClientsList(){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		//$this->db->select("b.customer_name,a.project_id,a.project_status,c.lastname,a.project_date,a.project_type,a.branch,c.lastname,c.firstname,c.middlename","DISTINCT");
		$this->db->select('*');
		$this->db->from("customers_project as a");
		$this->db->where('client_status', 'new');
		$this->db->join('sales_inquiry_tempo_clients as b','a.customer_id = b.id','inner');
		$this->db->join('technicians as c','a.sales_incharge = c.id','left');
		$this->db->order_by("b.id","DESC");
		$this->db->where("b.is_deleted","0");
		$this->db->where("a.archive","0");
		return $this->db->get()->result();
	}

	public function getExistingClientsList(){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		//$this->db->select("b.customer_name,a.project_id,a.project_status,c.lastname,a.project_date,a.project_type,a.branch");
		$this->db->select("*");
		$this->db->from("customers_project as a");
		$this->db->where('client_status', 'existing');
		$this->db->join('customer_vt as b','a.customer_id = b.CustomerID','inner');
		$this->db->join('technicians as c','a.sales_incharge = c.id','left');
		$this->db->order_by("b.CustomerID","DESC");
		$this->db->where("b.is_deleted","0");
		$this->db->where("a.archive","0");
		return $this->db->get()->result();
	}

	public function get_newclient_id() {
        $this->db->select('*');
		$this->db->from('sales_inquiry_tempo_clients');
        $this->db->order_by('id','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
    }

	public function fetch_customer_project($id){
		$this->db->select('*');
		$this->db->from('customers_project');
		$this->db->where('customer_id', $id);
		$this->db->where('client_status', 'new');
		$this->db->where('project_status', '100%');
		return $this->db->get()->result();
	}

	public function fetch_customer(){
		$this->db->select('*');
		$this->db->from('sales_inquiry_tempo_clients');
		$this->db->where('is_deleted', 0);
		return $this->db->get()->result();
	}

	public function fetch_customer_existing(){
		$this->db->select('*');
		$this->db->from('customer_vt');
		$this->db->where('is_deleted', 0);
		return $this->db->get()->result();
	}

	public function reject_branch($project_id, $data){
		$this->db->where('project_id', $project_id);
		$this->db->update('customers_project', $data);
	}

	public function archiveprojects_datatable() {

		$this->archiveproject_query();
	
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	public function archiveproject_query() {
		$this->db->select("a.*, c.lastname, c.firstname, c.middlename, d.project_task, d.date_of_task, d.mark_last_task");
		$this->db->from('customers_project as a');
		$this->db->where('a.client_status', 'new');
		//$this->db->join('sales_inquiry_tempo_clients as b','a.customer_id=b.id','left');
		$this->db->join('technicians as c','a.sales_incharge=c.id','left');
		$this->db->join('sales_inquiry_task as d','a.project_id=d.project_id','left');
		//$this->db->where('a.archive', 1);
		//$this->db->where('d.mark_last_task', 1);
		//$this->db->where('b.is_deleted', 0);	
		
		if(isset($_POST["search"]["value"])){
			$this->db->like("a.project_id", $_POST["search"]["value"]);
			//$this->db->or_like("b.customer_name", $_POST["search"]["value"]);
			$this->db->or_like("a.project_type", $_POST["search"]["value"]);
			$this->db->or_like("a.project_status", $_POST["search"]["value"]);
			$this->db->or_like("c.lastname", $_POST["search"]["value"]);
			$this->db->or_like("c.firstname", $_POST["search"]["value"]);
			$this->db->or_like("c.middlename", $_POST["search"]["value"]);
			$this->db->or_like("a.branch", $_POST["search"]["value"]);
			$this->db->or_like("d.project_task", $_POST["search"]["value"]);
			//$this->db->having('b.is_deleted', 0);
			$this->db->having('a.archive', 1);
			$this->db->having('d.mark_last_task', 1);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_archiveprojects_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.project_id","DESC");
		}
	}

		public function filter_archive_projects_data() {
			$this->archiveproject_query();
			$query = $this->db->get();
			return $query->num_rows();
		}
	
		public function get_archive_projects_data() {
			$this->db->select("*");
			$this->db->from('customers_project');
			$this->db->where('archive', 1);
			return $this->db->count_all_results();
		}

		public function get_clients_data($project_id) {
		
			$this->db->select("*");
			$this->db->from('customers_project as a');
			$this->db->where("a.project_id", $project_id);
			$this->db->join('sales_inquiry_tempo_clients as b','a.customer_id=b.id','left');
			$this->db->where('b.is_deleted', 0);
			$this->db->where('a.client_status', 'new');
			return $this->db->get()->result();
		}

		public function get_existing_clients_data($project_id) {
		
			$this->db->select("*");
			$this->db->from('customers_project as a');
			$this->db->where("a.project_id", $project_id);
			$this->db->join('customer_vt as b','a.customer_id=b.CustomerID','left');
			$this->db->where('b.is_deleted', 0);
			$this->db->where('a.client_status', 'existing');
			return $this->db->get()->result();
		}
}
?>