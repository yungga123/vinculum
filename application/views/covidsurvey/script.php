<?php
defined('BASEPATH') or die('Access Denied');
?>

<script>
    $(document).ready(function() {
        //Datatable for Customers Table
        var customers_table = $("#table-covidsurvey").DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo site_url('CovidSurveyController/get_covid_survey') ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [],
                "orderable": false,
            }]
        });
        //end of datatable
    });
</script>

</body>
</html>