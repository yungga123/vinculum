<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
    $('#payable_amount').keyup(function(){
        $('#result').text($('#payable_amount').val() * 0.12);
    });
});
</script>