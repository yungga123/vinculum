<?php
defined('BASEPATH') or die('Access Denied');
?>

    <script>
        $(document).ready(function() {
            //Datatable for Requisition Form
            var table_home_alarm_clients = $("#table_home_alarm_clients").DataTable({
                responsive: true,
                "processing": true,
                "serverSide": true,
                "order":[],
                "ajax":{
                    url: "<?php echo 'HomeAlarmFormController/fetch_home_alarm_clients' ?>",
                    type: "POST"
                },
                "columnDefs": [
                    {
                        "targets": [],
                        "orderable": false, 
                    }
                ]
            });
            //end of datatable
        });
    </script>

</body>
</html>