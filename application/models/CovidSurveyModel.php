<?php
defined('BASEPATH') or die('Access Denied');

class CovidSurveyModel extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('covidsurvey', $data);
    }

    public function update($id,$data) 
    {
        $this->db->where('id',$id);
        $this->db->update('covidsurvey',$data);
    }

    public function select_all() {
        $this->db->select('
            id,
            lastname,
            firstname,
            middlename,
            taker,
            birthdate,
            complete_address,
            contact_number,
            gender,
            temperature,
            cold,
            fever,
            cough,
            short_beath,
            headache,
            muscle_pain,
            sore_throat,
            diarrhea,
            olfactory_disorder,
            taste_disorder,
            exhaustion,
        ');
        $this->db->from('covidsurvey');
        $this->db->where('is_deleted','0');
        return $this->db->get();
    }


    //*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
    var $table = "covidsurvey";
    var $select_column = array(
        'id',
        'date_filed',
        'lastname',
        'firstname',
        'middlename',
        'taker',
        'birthdate',
        'complete_address',
        'contact_number',
        'gender',
        'temperature',
        'cold',
        'fever',
        'cough',
        'short_beath',
        'headache',
        'muscle_pain',
        'sore_throat',
        'diarrhea',
        'olfactory_disorder',
        'taste_disorder',
        'exhaustion',
        'is_deleted'
    );
    var $order_column = array(
        'id',
        'date_filed',
        'lastname',
        'firstname',
        'middlename',
        'taker',
        'birthdate',
        'complete_address',
        'contact_number',
        'gender',
        'temperature',
        'cold',
        'fever',
        'cough',
        'short_beath',
        'headache',
        'muscle_pain',
        'sore_throat',
        'diarrhea',
        'olfactory_disorder',
        'taste_disorder',
        'exhaustion',
        'is_deleted'
    );

    public function covidsurvey_query()
    {

        $this->db->select($this->select_column);
        $this->db->from($this->table);

        if (isset($_POST["search"]["value"])) {
            $this->db->like("id", $_POST["search"]["value"]);
            $this->db->or_like("date_filed", $_POST["search"]["value"]);
            $this->db->or_like("lastname", $_POST["search"]["value"]);
            $this->db->or_like("firstname", $_POST["search"]["value"]);
            $this->db->or_like("middlename", $_POST["search"]["value"]);
            $this->db->or_like("taker", $_POST["search"]["value"]);
            $this->db->or_like("birthdate", $_POST["search"]["value"]);
            $this->db->or_like("gender", $_POST["search"]["value"]);
            $this->db->or_like("temperature", $_POST["search"]["value"]);
            $this->db->or_like("cold", $_POST["search"]["value"]);
            $this->db->or_like("fever", $_POST["search"]["value"]);
            $this->db->or_like("cough", $_POST["search"]["value"]);
            $this->db->or_like("short_beath", $_POST["search"]["value"]);
            $this->db->or_like("headache", $_POST["search"]["value"]);
            $this->db->or_like("muscle_pain", $_POST["search"]["value"]);
            $this->db->or_like("sore_throat", $_POST["search"]["value"]);
            $this->db->or_like("diarrhea", $_POST["search"]["value"]);
            $this->db->or_like("olfactory_disorder", $_POST["search"]["value"]);
            $this->db->or_like("taste_disorder", $_POST["search"]["value"]);
            $this->db->or_like("exhaustion", $_POST["search"]["value"]);
            $this->db->having("is_deleted", 0);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("id", "DESC");
        }
    }

    public function covidsurvey_datatable()
    {

        $this->covidsurvey_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_covidsurvey_data()
    {
        $this->covidsurvey_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_covidsurvey_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        return $this->db->count_all_results();
    }
    //*****************end*********************
}
