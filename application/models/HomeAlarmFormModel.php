<?php
defined('BASEPATH') or die('Access Denied');

class HomeAlarmFormModel extends CI_Model {
    public function insert_client($data) {
        $this->db->insert('home_alarm_clients',$data);
    }

    public function insert_transaction($data) {
        $this->db->insert('home_alarm_transactions',$data);
    }

    public function update_client($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('home_alarm_clients',$data);
    }

    public function get_latest_homealarm_client() {
        $this->db->select('id');
        $this->db->from('home_alarm_clients');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function get_home_alarm_client_data($where) {
        return $this->db->get_where('home_alarm_clients',['id' => $where])->result();
    }

    //*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
        var $table = "home_alarm_clients";

        var $select_column = array(
            'id',
            'datetime_added',
            'first_name',
            'middle_name',
            'last_name',
            'bdate',
            'email_address',
            'nationality',
            'residence_address',
            'contact_no',
            'spouse_first_name',
            'spouse_middle_name',
            'spouse_last_name',
            'spouse_bdate',
            'spouse_email_address',
            'spouse_nationality',
            'spouse_contact_no',
            'household_count',
            'house_floors',
            'signal_strength',
            'demo_kit_presentation',
            'property_type',
            'helpers_number',
            'speed_test',
            'gps_coordinate',
            'pets_number',
            'lot_area',
            'isp',
            'is_deleted'
        );

        var $order_column = array(
            'id',
            'datetime_added',
            'first_name',
            'middle_name',
            'last_name',
            'bdate',
            'email_address',
            'nationality',
            'residence_address',
            'contact_no',
            'spouse_first_name',
            'spouse_middle_name',
            'spouse_last_name',
            'spouse_bdate',
            'spouse_email_address',
            'spouse_nationality',
            'spouse_contact_no',
            'household_count',
            'house_floors',
            'signal_strength',
            'demo_kit_presentation',
            'property_type',
            'helpers_number',
            'speed_test',
            'gps_coordinate',
            'pets_number',
            'lot_area',
            'isp'
        );

        public function home_alarm_query(){

            $this->db->select($this->select_column);
            $this->db->from($this->table);

            if(isset($_POST["search"]["value"])){
                $this->db->like("id", $_POST["search"]["value"]);
                $this->db->or_like("datetime_added", $_POST["search"]["value"]);
                $this->db->or_like("first_name", $_POST["search"]["value"]);
                $this->db->or_like("middle_name", $_POST["search"]["value"]);
                $this->db->or_like("last_name", $_POST["search"]["value"]);
                $this->db->or_like("email_address", $_POST["search"]["value"]);
                $this->db->or_like("nationality", $_POST["search"]["value"]);
                $this->db->or_like("residence_address", $_POST["search"]["value"]);
                $this->db->or_like("contact_no", $_POST["search"]["value"]);
                $this->db->or_like("spouse_first_name", $_POST["search"]["value"]);
                $this->db->or_like("spouse_middle_name", $_POST["search"]["value"]);
                $this->db->or_like("spouse_last_name", $_POST["search"]["value"]);
                $this->db->or_like("spouse_bdate", $_POST["search"]["value"]);
                $this->db->or_like("spouse_email_address", $_POST["search"]["value"]);
                $this->db->or_like("spouse_nationality", $_POST["search"]["value"]);
                $this->db->or_like("spouse_contact_no", $_POST["search"]["value"]);
                $this->db->or_like("household_count", $_POST["search"]["value"]);
                $this->db->or_like("house_floors", $_POST["search"]["value"]);
                $this->db->or_like("signal_strength", $_POST["search"]["value"]);
                $this->db->or_like("demo_kit_presentation", $_POST["search"]["value"]);
                $this->db->or_like("property_type", $_POST["search"]["value"]);
                $this->db->or_like("helpers_number", $_POST["search"]["value"]);
                $this->db->or_like("speed_test", $_POST["search"]["value"]);
                $this->db->or_like("gps_coordinate", $_POST["search"]["value"]);
                $this->db->or_like("pets_number", $_POST["search"]["value"]);
                $this->db->or_like("lot_area", $_POST["search"]["value"]);
                $this->db->or_like("isp", $_POST["search"]["value"]);
                $this->db->having("is_deleted",0);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by("id","DESC");
            }

        }

        public function home_alarm_datatable() {

            $this->home_alarm_query();
            if($_POST["length"] != -1) {
                $this->db->limit($_POST["length"],$_POST["start"]);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function filter_home_alarm_data() {
            $this->home_alarm_query();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function get_all_home_alarm_data() {
            $this->db->select("*");
            $this->db->from($this->table);
            $this->db->where('is_deleted',0);
            return $this->db->count_all_results();
        }
    //*****************end*********************
}