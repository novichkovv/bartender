<h1><?php echo ($_GET['id'] ? 'Edit' : 'Add'); ?> User Group</h1>
<hr>
<div class="row">
    <div class="col-md-4 col-sm-6">
        <form action="" method="post" id="group_form">
            <div class="form-group">
                <label>Group Name</label>
                <input type="text" class="form-control" name="group_name" value="<?php echo $group['group_name']; ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-lg" type="submit" name="save_group_btn" value="Save">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        $("#group_form").submit(function()
        {
            if(!$("input[name='group_name']").val() || $("input[name='group_name']").val() == '') {
                alert('Enter Group Name!');
                return false;
            }

            return true;
        });
    });
</script>