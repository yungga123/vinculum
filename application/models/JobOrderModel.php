<?php
defined('BASEPATH') or die('Access Denied');

class JobOrderModel extends CI_Model {

    public function add_joborder($data) {
        $this->db->insert('job_order',$data);
    }

    public function update_joborder($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('job_order', $data);
    }

    public function add_joborder_scope($data) {
        $this->db->insert('job_order_scope',$data);
    }

    public function update_joborder_scope($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('job_order_scope',$data);
    }

    public function count_joborder($where) {
        $this->db->where('decision',$where);
        $this->db->where('is_deleted',0);
        return $this->db->count_all_results('job_order');
    }

    public function count_jo_phone_support() {
        $this->db->where('jo_status','phone support');
        $this->db->where('is_deleted',0);
        $this->db->where('decision','');
        return $this->db->count_all_results('job_order');
    }

    public function get_latest_job_order() {
        $this->db->where('is_deleted',0);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get('job_order')->result();
    }

    public function select_job_order($where) {

        if ($where == 'pending') {
            $where = '';
        }

        $this->db->select(array(
                'a.id as joborder_id',
                'a.customer_id',
                'a.date_requested',
                'a.type_of_project',
                'a.comments',
                'a.date_reported',
                'a.commited_schedule',
                'a.requested_by',
                'a.decision',
                'a.date_filed',
                'd.lastname',
                'd.firstname',
                'd.middlename',
                'a.under_warranty',
                'a.remarks',
                'a.jo_status',
                'a.pic',
                'a.is_deleted',
                'b.CompanyName',
                'b.ContactPerson',
                'c.id as jobscope_id',
                'c.job_order_id',
                'c.cctv',
                'c.biometrics',
                'c.fdas',
                'c.intrusion_alarm',
                'c.pabx',
                'c.gate_barrier',
                'c.efence',
                'c.structured_cabling',
                'c.pabgm',
                'c.video_wall',
                'c.wap'
            )
        );
        $this->db->from("job_order as a");
        $this->db->join("customer_vt as b",'a.customer_id=b.CustomerID','left');
        $this->db->join("job_order_scope as c",'a.id=c.job_order_id','left');
        $this->db->join("technicians as d",'a.requested_by=d.id','left');
        $this->db->where("a.decision",$where);
        $this->db->where("a.is_deleted",0);
        return $this->db->get();
    }

    //*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
        var $table = "job_order as a";

        var $select_column = array(
            'a.id as joborder_id',
            'a.customer_id',
            'a.date_requested',
            'a.type_of_project',
            'a.comments',
            'a.date_reported',
            'a.commited_schedule',
            'a.requested_by',
            'a.decision',
            'a.date_filed',
            'd.lastname',
            'd.firstname',
            'd.middlename',
            'a.under_warranty',
            'a.remarks',
            'a.jo_status',
            'a.pic',
            'a.is_deleted',
            'b.CompanyName',
            'b.ContactPerson',
            'c.id as jobscope_id',
            'c.job_order_id',
            'c.cctv',
            'c.biometrics',
            'c.fdas',
            'c.intrusion_alarm',
            'c.pabx',
            'c.gate_barrier',
            'c.efence',
            'c.structured_cabling',
            'c.pabgm',
            'c.video_wall',
            'c.wap'
            
        );

        var $order_column = array(
            'a.id',
            'a.customer_id',
            'a.date_requested',
            'a.type_of_project',
            'a.comments',
            'a.date_reported',
            'a.commited_schedule',
            'a.requested_by',
            'a.decision',
            'a.date_filed',
            'd.lastname',
            'd.firstname',
            'd.middlename',
            'a.is_deleted',
            'a.under_warranty',
            'a.remarks',
            'a.pic',
            'b.CompanyName',
            'b.ContactPerson',
            'c.id',
            'c.job_order_id',
            'c.cctv',
            'c.biometrics',
            'c.fdas',
            'c.intrusion_alarm',
            'c.pabx',
            'c.gate_barrier',
            'c.efence',
            'c.structured_cabling',
            'c.pabgm'
        );

        var $join_table = "customer_vt as b";
        var $join_table2 = "job_order_scope as c";
        var $join_table3 = "technicians as d";

        public function job_order_query($where){

            $this->db->select($this->select_column);
            $this->db->from($this->table);
            $this->db->join($this->join_table,'a.customer_id=b.CustomerID','left');
            $this->db->join($this->join_table2,'a.id=c.job_order_id','left');
            $this->db->join($this->join_table3,'a.requested_by=d.id','left');

            if(isset($_POST["search"]["value"])){
                $this->db->like("a.id", $_POST["search"]["value"]);
                $this->db->or_like("a.customer_id", $_POST["search"]["value"]);
                $this->db->or_like("a.date_requested", $_POST["search"]["value"]);
                $this->db->or_like("a.type_of_project", $_POST["search"]["value"]);
                $this->db->or_like("a.comments", $_POST["search"]["value"]);
                $this->db->or_like("a.date_reported", $_POST["search"]["value"]);
                $this->db->or_like("a.commited_schedule", $_POST["search"]["value"]);
                $this->db->or_like("a.requested_by", $_POST["search"]["value"]);
                $this->db->or_like("a.under_warranty", $_POST["search"]["value"]);
                $this->db->or_like("a.remarks", $_POST["search"]["value"]);
                $this->db->or_like("a.pic", $_POST["search"]["value"]);
                $this->db->or_like("b.CompanyName", $_POST["search"]["value"]);
                $this->db->or_like("b.ContactPerson", $_POST["search"]["value"]);
                $this->db->or_like("c.id", $_POST["search"]["value"]);
                $this->db->or_like("c.job_order_id", $_POST["search"]["value"]);
                $this->db->or_like("c.cctv", $_POST["search"]["value"]);
                $this->db->or_like("c.biometrics", $_POST["search"]["value"]);
                $this->db->or_like("c.fdas", $_POST["search"]["value"]);
                $this->db->or_like("c.intrusion_alarm", $_POST["search"]["value"]);
                $this->db->or_like("c.pabx", $_POST["search"]["value"]);
                $this->db->or_like("c.gate_barrier", $_POST["search"]["value"]);
                $this->db->or_like("c.efence", $_POST["search"]["value"]);
                $this->db->or_like("c.structured_cabling", $_POST["search"]["value"]);
                $this->db->or_like("c.pabgm", $_POST["search"]["value"]);
                $this->db->or_like("d.lastname", $_POST["search"]["value"]);
                $this->db->or_like("d.firstname", $_POST["search"]["value"]);
                $this->db->or_like("d.middlename", $_POST["search"]["value"]);
                $this->db->or_like("a.decision", $_POST["search"]["value"]);
                $this->db->or_like("a.date_filed", $_POST["search"]["value"]);
                $this->db->having("a.decision",$where);
                $this->db->having("a.is_deleted",0);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by("a.id","DESC");
            }

        }

        public function job_order_datatable($where) {

            $this->job_order_query($where);
            if($_POST["length"] != -1) {
                $this->db->limit($_POST["length"],$_POST["start"]);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function filter_job_order_data($where) {
            $this->job_order_query($where);
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function get_all_job_order_data($where) {
            $this->db->select("*");
            $this->db->from($this->table);
            $this->db->where('a.decision',$where);
            $this->db->where('a.is_deleted',0);
            return $this->db->count_all_results();
        }

        public function get_job_order_data($joborder_id) {
            $this->db->select('*');
            $this->db->from('job_order');
            $this->db->where('id',$joborder_id);
            return $this->db->get()->result();
        }

        public function get_job_order_scope($joborder_id) {
            $this->db->select('*');
            $this->db->from('job_order_scope');
            $this->db->where('job_order_id',$joborder_id);
            return $this->db->get()->result();
        }

        public function joborder_scheduled_data(){
        $FITposition = 'Field IT Support';
        $ENGRposition = 'TECHNICAL SUPPORT ENGINEER';
        $IITposition = 'Internal IT Support';
        $ITposition = 'IT Support';
        $ITHeadposition = 'IT Support Head';
        $PICposition = 'PROJECT IN-CHARGE';
		
		$this->db->select("*");
		$this->db->from('technicians');
        
        $this->db->where('position',$FITposition);
        $this->db->where_not_in('status','Resigned');
        $this->db->where_not_in('status','Terminated');
        $this->db->or_where_in('position',$ENGRposition);
        $this->db->or_where_in('position',$IITposition);
        $this->db->or_where_in('position',$PICposition);
        $this->db->or_where_in('position',$ITposition);
        // $this->db->or_where_in('position',$ITHeadposition);
        
		return $this->db->get()->result();

        }

        public function pic_data($id){
            $this->db->select("*");
            $this->db->from('technicians');
            $this->db->where('id',$id);
            return $this->db->get()->result();
    
            }

    //*****************end*********************
    
}