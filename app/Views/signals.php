<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>" class="csrf">
    <title><?= (isset($pageTitle)) ? $pageTitle :'PHP Test'; ?></title>

    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<!-- CONTENT -->

<section>
<h3 class="md-10">Signal Lights</h3>
<form name="signal_frm" id="signal_frm" action="javascript:void(0)">
<div>
    <?php if(count($signals)): ?>
        <?php foreach($signals as $_signal): ?>
            <span style="height: 25px; width: 25px; background-color: red; border-radius: 50%; display: inline-block;"></span>
            <?php echo $_signal["name"] ?>
            <input type="hidden" name="id" value="<?php echo $_signal["id"] ?>" />
            <input type="number" name="sequence[]" id="sequence"  style="width: 50px" min="1" max="4" required onkeypress="return isValidNumber(event)" >
        <?php endforeach; ?>
    <?php endif;?>
</div>
<div class="form-group">
    <label for="green_light_interval">Green light intervals</label>
    <input type="number" class="form-control" id="green_light_interval" name="green_light_interval" style="width: 100px" onkeypress="return isValidNumber(event)"  required/>    
</div>
<div class="form-group">
    <label for="yellow_light_interval">Yellow light intervals</label>
    <input type="number" class="form-control" id="yellow_light_interval" name="yellow_light_interval" style="width: 100px" onkeypress="return isValidNumber(event)"  required/>    
</div>
<button type="submit" class="btn btn-primary">Start</button>
<button type="button" class="btn btn-primary">Stop</button>
</form>
</section>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Validation library file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<!-- Sweetalert library file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- -->
<script type="text/javascript">
    function isValidNumber(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $(function() {

// Adding form validation
$('#signal_frm').validate();

// Ajax form submission with image
$('#signal_frm').on('submit', function(e) {

    e.preventDefault();

    var formData = new FormData(this);
    
    $.ajax({
        url: "<?= site_url('save-signals') ?>",
        type: "POST",
        cache: false,
        data: formData,
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            if (data.success == true) {
                Swal.fire('Saved!', '', 'success')
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error at add data');
        }
    });
});
});
</script>

</body>
</html>
