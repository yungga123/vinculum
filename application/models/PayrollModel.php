<?php
defined('BASEPATH') or die('Access Denied');

class PayrollModel extends CI_Model {

    public function insert_payroll($data) {
        $this->db->insert('payroll',$data);
    }

    public function update_payroll($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('payroll',$data);
    }

    public function select_latest() {
        $this->db->select([
            "a.id as payroll_id",
            "a.cutoff_start",
            "a.cutoff_end",
            "a.emp_id",
            "a.days_worked",
            "a.hours_late",
            "a.days_absent",
            "a.cash_adv",
            "a.others",
            "a.ot_hrs",
            "a.night_diff_hrs",
            "a.wdo",
            "a.reg_holiday",
            "a.special_holiday",
            "a.addback",
            "a.incentives",
            "a.commission",
            "a.13th_month as thirteenth_month",
            "a.vacation_leave",
            "a.sick_leave",
            "a.rest_day",
            "a.awol",
            "a.remarks as notes",
            "a.is_deleted",
            "b.lastname",
            "b.firstname",
            "b.middlename",
            "b.birthdate",
            "b.contact_number",
            "b.position",
            "b.address",
            "b.sss_number",
            "b.tin_number",
            "b.pagibig_number",
            "b.phil_health_number",
            "b.status",
            "b.validity",
            "b.date_hired",
            "b.daily_rate",
            "b.pag_ibig_rate",
            "b.sss_rate",
            "b.phil_health_rate",
            "b.tax",
            "b.sl_credit",
            "b.vl_credit",
            "b.remarks"
        ]);

        $this->db->from('payroll as a');
        $this->db->join('technicians as b','a.emp_id=b.id','left');
        $this->db->order_by('a.id','DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function select_payroll($id) {
        $this->db->select([
            "a.id as payroll_id",
            "a.cutoff_start",
            "a.cutoff_end",
            "a.emp_id",
            "a.days_worked",
            "a.hours_late",
            "a.days_absent",
            "a.cash_adv",
            "a.others",
            "a.ot_hrs",
            "a.night_diff_hrs",
            "a.wdo",
            "a.reg_holiday",
            "a.special_holiday",
            "a.addback",
            "a.incentives",
            "a.commission",
            "a.13th_month as thirteenth_month",
            "a.vacation_leave",
            "a.sick_leave",
            "a.rest_day",
            "a.awol",
            "a.remarks as notes",
            "a.is_deleted",
            "b.lastname",
            "b.firstname",
            "b.middlename",
            "b.birthdate",
            "b.contact_number",
            "b.position",
            "b.address",
            "b.sss_number",
            "b.tin_number",
            "b.pagibig_number",
            "b.phil_health_number",
            "b.status",
            "b.validity",
            "b.date_hired",
            "b.daily_rate",
            "b.pag_ibig_rate",
            "b.sss_rate",
            "b.phil_health_rate",
            "b.tax",
            "b.remarks"
        ]);

        $this->db->from('payroll as a');
        $this->db->join('technicians as b','a.emp_id=b.id','left');
        $this->db->where('a.id',$id);
        $this->db->where('is_deleted',0);
        return $this->db->get()->result();
    }

    public function select_payroll_filter($start_date,$end_date) {
        $this->db->select([
            "a.id as payroll_id",
            "a.cutoff_start",
            "a.cutoff_end",
            "a.emp_id",
            "a.days_worked",
            "a.hours_late",
            "a.days_absent",
            "a.cash_adv",
            "a.others",
            "a.ot_hrs",
            "a.night_diff_hrs",
            "a.wdo",
            "a.reg_holiday",
            "a.special_holiday",
            "a.addback",
            "a.incentives",
            "a.commission",
            "a.13th_month as thirteenth_month",
            "a.vacation_leave",
            "a.sick_leave",
            "a.rest_day",
            "a.awol",
            "a.remarks as notes",
            "a.is_deleted",
            "b.lastname",
            "b.firstname",
            "b.middlename",
            "b.birthdate",
            "b.contact_number",
            "b.position",
            "b.address",
            "b.sss_number",
            "b.tin_number",
            "b.pagibig_number",
            "b.phil_health_number",
            "b.status",
            "b.validity",
            "b.date_hired",
            "b.daily_rate",
            "b.pag_ibig_rate",
            "b.sss_rate",
            "b.phil_health_rate",
            "b.tax",
            "b.remarks"
        ]);

        $this->db->from('payroll as a');
        $this->db->join('technicians as b','a.emp_id=b.id','left');
        $this->db->where('is_deleted',0);
        $this->db->where('a.cutoff_start',$start_date);
        $this->db->where('a.cutoff_end',$end_date);
        return $this->db->get()->result();
    }

    public function select_payroll_all() {
        $this->db->select([
            "a.id as payroll_id",
            "a.cutoff_start",
            "a.cutoff_end",
            "a.emp_id",
            "a.days_worked",
            "a.hours_late",
            "a.days_absent",
            "a.cash_adv",
            "a.others",
            "a.ot_hrs",
            "a.night_diff_hrs",
            "a.wdo",
            "a.reg_holiday",
            "a.special_holiday",
            "a.addback",
            "a.incentives",
            "a.commission",
            "a.13th_month as thirteenth_month",
            "a.vacation_leave",
            "a.sick_leave",
            "a.rest_day",
            "a.awol",
            "a.remarks as notes",
            "a.is_deleted",
            "b.lastname",
            "b.firstname",
            "b.middlename",
            "b.birthdate",
            "b.contact_number",
            "b.position",
            "b.address",
            "b.sss_number",
            "b.tin_number",
            "b.pagibig_number",
            "b.phil_health_number",
            "b.status",
            "b.validity",
            "b.date_hired",
            "b.daily_rate",
            "b.pag_ibig_rate",
            "b.sss_rate",
            "b.phil_health_rate",
            "b.tax",
            "b.remarks"
        ]);

        $this->db->from('payroll as a');
        $this->db->join('technicians as b','a.emp_id=b.id','left');
        $this->db->where('is_deleted',0);
        return $this->db->get()->result();
    }

    
    //*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
        var $table = "payroll as a";

        var $select_column = array(
            "a.id as payroll_id",
            "a.cutoff_start",
            "a.cutoff_end",
            "a.emp_id",
            "a.days_worked",
            "a.hours_late",
            "a.days_absent",
            "a.cash_adv",
            "a.others",
            "a.ot_hrs",
            "a.night_diff_hrs",
            "a.wdo",
            "a.reg_holiday",
            "a.special_holiday",
            "a.addback",
            "a.incentives",
            "a.commission",
            "a.13th_month as thirteenth_month",
            "a.vacation_leave",
            "a.sick_leave",
            "a.rest_day",
            "a.awol",
            "a.remarks as notes",
            "a.is_deleted",
            "b.lastname",
            "b.firstname",
            "b.middlename",
            "b.birthdate",
            "b.contact_number",
            "b.position",
            "b.address",
            "b.sss_number",
            "b.tin_number",
            "b.pagibig_number",
            "b.phil_health_number",
            "b.status",
            "b.validity",
            "b.date_hired",
            "b.daily_rate",
            "b.pag_ibig_rate",
            "b.sss_rate",
            "b.phil_health_rate",
            "b.tax",
            "b.remarks"
        );

        var $order_column = array(
            "a.id",
            "a.cutoff_start",
            "a.cutoff_end",
            "a.emp_id",
            "a.days_worked",
            "a.hours_late",
            "a.days_absent",
            "a.cash_adv",
            "a.others",
            "a.ot_hrs",
            "a.night_diff_hrs",
            "a.wdo",
            "a.reg_holiday",
            "a.special_holiday",
            "a.addback",
            "a.incentives",
            "a.commission",
            "a.13th_month",
            "a.vacation_leave",
            "a.sick_leave",
            "a.rest_day",
            "a.awol",
            "a.remarks",
            "a.is_deleted",
            "b.lastname",
            "b.firstname",
            "b.middlename",
            "b.birthdate",
            "b.contact_number",
            "b.position",
            "b.address",
            "b.sss_number",
            "b.tin_number",
            "b.pagibig_number",
            "b.phil_health_number",
            "b.status",
            "b.validity",
            "b.date_hired",
            "b.daily_rate",
            "b.pag_ibig_rate",
            "b.sss_rate",
            "b.phil_health_rate",
            "b.tax",
            "b.remarks"
        );

        var $join_table = "technicians as b";

        public function payroll_query(){

            $this->db->select($this->select_column);
            $this->db->from($this->table);
            $this->db->join($this->join_table,'a.emp_id=b.id','left');

            if(isset($_POST["search"]["value"])){
                $this->db->like("a.id", $_POST["search"]["value"]);
                $this->db->or_like("b.id", $_POST["search"]["value"]);
                $this->db->or_like("a.cutoff_start", $_POST["search"]["value"]); 
                $this->db->or_like("a.cutoff_end", $_POST["search"]["value"]); 
                $this->db->or_like("a.emp_id", $_POST["search"]["value"]); 
                $this->db->or_like("a.days_worked", $_POST["search"]["value"]); 
                $this->db->or_like("a.hours_late", $_POST["search"]["value"]); 
                $this->db->or_like("a.days_absent", $_POST["search"]["value"]); 
                $this->db->or_like("a.cash_adv", $_POST["search"]["value"]); 
                $this->db->or_like("a.others", $_POST["search"]["value"]); 
                $this->db->or_like("a.ot_hrs", $_POST["search"]["value"]); 
                $this->db->or_like("a.night_diff_hrs", $_POST["search"]["value"]); 
                $this->db->or_like("a.wdo", $_POST["search"]["value"]); 
                $this->db->or_like("a.reg_holiday", $_POST["search"]["value"]); 
                $this->db->or_like("a.special_holiday", $_POST["search"]["value"]); 
                $this->db->or_like("a.addback", $_POST["search"]["value"]); 
                $this->db->or_like("a.incentives", $_POST["search"]["value"]); 
                $this->db->or_like("a.commission", $_POST["search"]["value"]); 
                $this->db->or_like("a.13th_month", $_POST["search"]["value"]); 
                $this->db->or_like("a.vacation_leave", $_POST["search"]["value"]); 
                $this->db->or_like("a.sick_leave", $_POST["search"]["value"]); 
                $this->db->or_like("a.rest_day", $_POST["search"]["value"]); 
                $this->db->or_like("a.awol", $_POST["search"]["value"]); 
                $this->db->or_like("a.remarks", $_POST["search"]["value"]); 
                $this->db->or_like("b.lastname", $_POST["search"]["value"]); 
                $this->db->or_like("b.firstname", $_POST["search"]["value"]); 
                $this->db->or_like("b.middlename", $_POST["search"]["value"]); 
                $this->db->or_like("b.birthdate", $_POST["search"]["value"]); 
                $this->db->or_like("b.contact_number", $_POST["search"]["value"]); 
                $this->db->or_like("b.position", $_POST["search"]["value"]); 
                $this->db->or_like("b.address", $_POST["search"]["value"]); 
                $this->db->or_like("b.sss_number", $_POST["search"]["value"]); 
                $this->db->or_like("b.tin_number", $_POST["search"]["value"]); 
                $this->db->or_like("b.pagibig_number", $_POST["search"]["value"]); 
                $this->db->or_like("b.phil_health_number", $_POST["search"]["value"]); 
                $this->db->or_like("b.status", $_POST["search"]["value"]); 
                $this->db->or_like("b.validity", $_POST["search"]["value"]); 
                $this->db->or_like("b.date_hired", $_POST["search"]["value"]); 
                $this->db->or_like("b.daily_rate", $_POST["search"]["value"]); 
                $this->db->or_like("b.pag_ibig_rate", $_POST["search"]["value"]); 
                $this->db->or_like("b.sss_rate", $_POST["search"]["value"]); 
                $this->db->or_like("b.phil_health_rate", $_POST["search"]["value"]); 
                $this->db->or_like("b.tax", $_POST["search"]["value"]); 
                $this->db->or_like("b.remarks", $_POST["search"]["value"]); 
                $this->db->having("a.is_deleted",0);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by("a.id","DESC");
            }

        }

        public function payroll_datatable() {

            $this->payroll_query();
            if($_POST["length"] != -1) {
                $this->db->limit($_POST["length"],$_POST["start"]);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function filter_payroll_data() {
            $this->payroll_query();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function get_all_payroll_data() {
            $this->db->select("*");
            $this->db->from($this->table);
            $this->db->where('a.is_deleted',0);
            return $this->db->count_all_results();
        }
    //*****************end*********************


}