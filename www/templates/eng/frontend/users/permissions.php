<div class="row">
    <div class="col-xs-2 col-md-1">
        <div class="stat-icon" style="color:#56F5A0;">
            <i class="fa fa-user-times fa-3x stat-elem"></i>
        </div>
    </div>
    <div class="col-xs-9 col-md-10">
        <h1>User Permissions</h1>
    </div>
</div>

<br>
<form method="post" action="">
<div class="row transparent permissions-list">
    <section class="panel general transparent-tabs" style="background: none;">
        <header class="panel-heading tab-bg-dark-navy-blue">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#home-2">
                        <i class="fa fa-gear"></i>
                        System
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#about-2">
                        <i class="fa fa-user"></i>
                        Modules
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#contact-2">
                        <i class="fa fa-envelope-o"></i>
                        Contact
                    </a>
                </li>
            </ul>
        </header>

        <div class="text-right" style="background-color: #fff; height: 60px; box-shadow: 0 5px 1px #B4D9E5; padding: 20px;">
            <a href="">USERS</a> | <a href="">PERMISSIONS</a> | SYSTEM PERMISSIONS
        </div>
        <div style="background: #B4D9E5; height: 5px;"></div>
        <div class="panel-body">
            <div class="tab-content" style="background: none;">
                <div id="home-2" class="tab-pane  active">
                    <div class="row">
                         <div class="col-xs-12">
                            <?php foreach($result as $user_group_id => $v): ?>
                                <div class="col-md-3 col-sm-6">
                                    <h3><?php echo $v['group_name']; ?></h3>
                                    <ul style="">
                                        <?php foreach($v['routes'] as $route): ?>
                                            <li>
                                                <div class="checkbox">
                                                    <div class="squaredFour">
                                                        <input type="checkbox" id="squaredFour_1_<?php echo $user_group_id; ?>_<?php echo $route['id']; ?>"  name="permission[<?php echo $user_group_id; ?>][]" value="<?php echo $route['id']; ?>" <?php if($route['checked']) echo 'checked'; ?> class="parent_perm styled-checkbox" checked>
                                                        <label for="squaredFour_1_<?php echo $user_group_id; ?>_<?php echo $route['id']; ?>"></label>
                                                    </div>
                                                    <span class="styled-checkbox-label"><?php echo $route['title']; ?></span>
                                                </div>
                                                <!--                        <label class="checkbox">-->
                                                <!--                            <input type="checkbox" class="parent_perm" name="permission[--><?php //echo $user_group_id; ?><!--][]" value="--><?php //echo $route['id']; ?><!--" --><?php //if($route['checked']) echo 'checked'; ?><!-->
                                                <!--                            --><?php //echo $route['title']; ?>
                                                <!--                        </label>-->
                                                <?php if($route['children']): ?>
                                                    <ul>
                                                        <?php foreach($route['children'] as $child): ?>
                                                            <li>
                                                                <div class="checkbox">
                                                                    <div class="squaredFour">
                                                                        <input type="checkbox" id="squaredFour_1_<?php echo $user_group_id; ?>_<?php echo $child['id']; ?>"  name="permission[<?php echo $user_group_id; ?>][]" value="<?php echo $child['id']; ?>" <?php if($child['checked']) echo 'checked'; ?> class="child_perm styled-checkbox" checked>
                                                                        <label for="squaredFour_1_<?php echo $user_group_id; ?>_<?php echo $child['id']; ?>"></label>
                                                                    </div>
                                                                    <span class="styled-checkbox-label"><?php echo $child['title']; ?></span>
                                                                </div>
                                                                <!--                                        <input type="checkbox" class="child_perm" name="permission[--><?php //echo $user_group_id; ?><!--][]" value="--><?php //echo $child['id']; ?><!--" --><?php //if($child['checked']) echo 'checked'; ?><!-->
                                                                <!--                                        --><?php //echo $child['title']; ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <hr class="hr-dark-blue">
                    <div class="row">
                        <div class="col-md-5">
                            <input class="btn btn-info btn-lg btn-big" type="submit" name="save_permissions_btn" value="Save">
                        </div>
                    </div>
                </div>
                <div id="about-2" class="tab-pane">
                    <div class="pull-right">
                        <a href="">users</a> | <a href="">permissions</a> | settings
                    </div>
                </div>
                <div id="contact-2" class="tab-pane ">Contact</div>
            </div>
        </div>
    </section>
    <div class="row transparent">

    </div>
</div>

</form>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function(){
          $(".parent_perm").change(function(){
              if(!$(this).prop('checked')) {
                  $(this).closest('li').find('.child_perm').each(function()
                  {
                      $(this).prop('checked', false);
                  })
              } else {
                  $(this).closest('li').find('.child_perm').each(function()
                  {
                      $(this).prop('checked', true);
                  })
              }
          });
        $('.child_perm').change(function() {
            if($(this).prop('checked')) {
//                if($(this).closest('li').closest('li').find('.parent_perm').prop('checked', false)) {
                    $(this).closest('ul').closest('li').find('.parent_perm').prop('checked', true);
//                }
            }
        });
    });
</script>