<div class="container-fluid">
  <?php if (validation_errors()) : ?>
  <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
  <?php endif; ?>
  <?= $this->session->flashdata('message')?>
    <div class="card shadow px-0 mb-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-center text-dark">List of All Users</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="userTable" class="table table-hover table-bordered " cellspacing="0" width="100%" >
              <thead>  
                <tr>
                    <th class="th-lg">No</th>
                    <th class="th-lg">User Name</th>
                    <th class="th-lg">Name</th>
                    <th class="th-lg">Email</th>
                    <th class="th-lg">Date Created</th>
                    <th class="th-lg">Role</th>
                    <th class="th-lg">Status Active</th>
                    <th class="th-lg">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($users as $u) {?>
                <tr>
                    <td><?= ++$start?></td>
                    <td><?= $u->username?></td>
                    <td><?= $u->name;?></td>
                    <td><?= $u->email?></td>
                    <td><?= date("Y-m-d H:i:s",$u->date_created)?></td>
                    <td>
                    <form id="roleC" action="<?php echo base_url('admin/manage_user/change_role');?> " method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo $u->id;?>"> 
                        <select id="roleChange" name="role" class="browser-default custom-select" <?php if($u->id == $user['id'] || $u->role_id == 1 ){ echo 'disabled';}?>>
                            <option value="1" href="javascript:;"
                            data-id="<?php echo $u->id ?>"
                            data-name="<?php echo $u->name ?>"
                            data-nameS="<?php echo $u->name ?>"
                            data-toggle="modal" data-target="#admin" <?php if($u->role_id == 1){ echo 'selected';} else{}?> > Admin</option>
                          
                            <option value="2" onclick="this.form.submit()"<?php if($u->role_id == 2){ echo 'selected';}else{}?>>Customer</option>
                            <option value="3" onclick="this.form.submit()"<?php if($u->role_id == 3){ echo 'selected';}else{}?>>Veterinarian</option>
                        </select>
                    </form>
                    </td>
                    <td><?php if($u->is_active == 1 )
                      {
                        if($u->id == $user['id'] || $u->role_id == 1)
                        { ?>
                          <button class="btn btn-light-green text-light btn-sm glyphicon-object-align-horizontal" disabled>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-check"></i> <strong> Active&nbsp;&nbsp;&nbsp;&nbsp;</strong></button>
                        <?php
                        }
                        else
                        {?>
                          <a href="" 
                          data-id="<?php echo $u->id ?>"
                          data-name="<?php echo $u->name ?>"
                          data-username="<?php echo $u->username ?>"
                          data-toggle="modal" data-target="#deactive" ><div class="btn btn-light-green text-light btn-sm glyphicon-object-align-horizontal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-check"></i> <strong> Active&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></a>
                        <?php
                        }
                      }
                      elseif($u->is_active == 0)
                      {?>
                        <a href="" 
                        data-id="<?php echo $u->id ?>"
                        data-name="<?php echo $u->name ?>"
                        data-username="<?php echo $u->username ?>"
                        data-toggle="modal" data-target="#active"><div class="btn btn-deep-orange text-light btn-sm glyphicon-object-align-horizontal"><i class="fas fa-times"> Non-active</i></div>
                      <?php }
                      ?></td>
                    <td>
                    <div class="text-center">
                      <div class="d-inline-flex p-0">
                        <a 
                          href="javascript:;"
                          data-id="<?php echo $u->id ?>"
                          data-username="<?php echo $u->username ?>"
                          data-name="<?php echo $u->name ?>"
                          data-email="<?php echo $u->email ?>"
                          data-address = "<?php echo $u->address ?>"
                          data-phone = "<?php echo $u->phone ?>"
                          data-role = "<?php echo $u->role ?>"
                          data-image = "<?php echo base_url('assets/dp/').$u->image ?>"
                          data-date_created = "<?php echo $u->date_created ?>"
                          data-toggle="modal" data-target="#modalInfo">
                        <button class="btn btn-deep-orange text-light btn-sm glyphicon-object-align-horizontal" data-toggle="modal" data-target="#ubah-data"><i class="fa fa-search-plus"></i></button></a>
                        
                        <a 
                          href="javascript:;"
                          data-id="<?php echo $u->id ?>"
                          data-name="<?php echo $u->name ?>"
                          data-nameS="<?php echo $u->name ?>"
                          data-toggle="modal" <?php if($u->id == $user['id'] || $u->role_id == 1 ){ echo '';} else { echo 'data-target="#delete"';}?>>
                          <button class="btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#edit-data" <?php if($u->id == $user['id'] || $u->role_id == 1 ){ echo 'disabled';}?>><i class="fa fa-trash"></i></button></a>
                      </div>
                    </div>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<!--Modal: Active Account-->
<div class="modal fade" id="active" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <p class="heading"><strong>Active Account</strong></p>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fa fa-user-check fa-5x text-success animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('admin/manage_user/active_acc');?>" method="post">
                            <h4><strong>Active</strong> this account #<strong id="username"></strong>?</h4>
                            <input type="hidden" id="id" name="id" value=""> 
                            <input type="hidden" id="is_active" name="is_active" value="1">
                            <input type="hidden" id="usernameH" name="username" value="">
                    </div>
                </div>
            
            <hr/>
            <!--Footer-->
            <div class="text-center">
                <button class="btn btn-success" type="submit"> Yes</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"> No</button>
            </div>
          </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Deactive Account-->
<div class="modal fade" id="deactive" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <p class="heading"><strong>Deactivate Account</strong></p>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fa fa-user-times fa-5x text-danger animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('admin/manage_user/deactive_acc');?>" method="post">
                            <h4><strong>Deactivate</strong> this account #<strong id="username"></strong>?</h4>
                            <input type="hidden" id="id" name="id" value=""> 
                            <input type="hidden" id="is_active" name="is_active" value="0">
                            <input type="hidden" id="usernameH" name="username" value="">
                    </div>
                </div>
            
            <hr/>
            <!--Footer-->
            <div class="text-center">
                <button class="btn btn-danger" type="submit"> Yes</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"> No</button>
            </div>
          </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<?php 
    foreach($users as $usr):
        $id= $usr->id;
        $name = $usr->name;

?>
<!--Modal: Admin Role-->
<div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-primary">
                <p class="heading"><strong>Admin Role</strong></p>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fa fa-user-cog fa-5x text-primary animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('admin/manage_user/change_role');?>" method="post">
                            <p>Do you want to change this user #<strong id="name"><?php echo $name;?></strong> role to <strong class="font-weight-bolder">ADMIN</strong> ?</p>
                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                            <input type="hidden" id="role" name="role" value="1">
                            <input type="hidden" id="nameS" name="name" value="">
                    </div>
                </div> 
            <hr/>
            <!--Footer-->
            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Yes</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"> No</button>
            </div>
          </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<?php endforeach;?>

<?php 
    foreach($users as $usr):
        $id= $usr->id;
        $name = $usr->name;

?>
<!--Modal: modalPush-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-danger">
                <p class="heading"><strong>Delete User</strong></p>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fa fa-trash fa-5x text-danger animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('admin/manage_user/delete/');?>" method="post">
                            <p>Do you want to delete this user #<strong id="name"><?php echo $name;?></strong>?</p>
                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>"> 
                            <input type="hidden" id="nameS" name="name" value=""> 
                    </div>
                </div>
            
            <hr/>
            <!--Footer-->
            <div class="text-center">
                <button class="btn btn-danger" type="submit"> Yes&nbsp;</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
            </div>
          </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<?php endforeach;?>
<?php 
    foreach($users as $usr):
        $id= $usr->id;
        $username = $usr->username;
        $name = $usr->name;
        $email = $usr->email;
        $address = $usr->address;
        $phone = $usr->phone;
        $role = $usr->role;
        $image = $usr->image;
        $date_created = $usr->email;
?>
<!--Modal: Info with Avatar -->
<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header">
        <img src="" alt="avatar" class="img-profile rounded-circle" style="max-width:300px; height:130px;" id="image">
      </div>
      <!--Body-->
      <div class="modal-body text-center mb-1">

        <strong class="mt-1 mb-2 text-primary h4" id="name"></strong>
        <p id="email" class="text-primary"></p>
        <hr>
        <div class="md-form ml-0 mr-0">
          <p><strong>Phone Number:</strong> <span id="phone"></span></p>
          
          <p><strong>Address:</strong> <span id="address"></span></p>
          <p><strong>Role:</strong> <span id="role"></span></p>
          
        </div>

        <div class="text-center mt-4">
          <button class="btn btn-cyan mt-1 text-light" data-dismiss="modal">Close <i class="fas fa-check ml-1"></i></button>
        </div>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Info with Avatar -->
<?php endforeach;?>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?= base_url()?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#delete').on('show.bs.modal', function (event) {
            var div  = $(event.relatedTarget) 
            var modal = $(this)
 
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#name').html(div.data('name'));
            modal.find('#nameS').attr("value",div.data('name'));
            
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#delete').on('show.bs.modal', function (event) {
            var div  = $(event.relatedTarget) 
            var modal = $(this)
 
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#name').html(div.data('name'));
            modal.find('#nameS').attr("value",div.data('name'));
            
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#admin').on('show.bs.modal', function (event) {
            var div  = $(event.relatedTarget) 
            var modal = $(this)
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#name').html(div.data('name'));
            modal.find('#nameS').attr("value",div.data('name'));
            
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#deactive').on('show.bs.modal', function (event) {
            var div  = $(event.relatedTarget) 
            var modal = $(this)
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#usernameH').attr("value",div.data('username'));
            modal.find('#username').html(div.data('username'));
            
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#active').on('show.bs.modal', function (event) {
            var div  = $(event.relatedTarget) 
            var modal = $(this)
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#usernameH').attr("value",div.data('username'));
            modal.find('#username').html(div.data('username'));
            
            
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#modalInfo').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) 
            var modal          = $(this)
            modal.find('#id').html(div.data('id'));
            modal.find('#name').html(div.data('name'));
            modal.find('#email').html(div.data('email'));
            modal.find('#address').html(div.data('address'));
            modal.find('#phone').html(div.data('phone'));
            modal.find('#role').html(div.data('role'));
            modal.find('#image').attr("src",div.data('image'));
            modal.find('#date_created').html(div.data('date_created'));
        });
    });
</script>
<script>
$('#roleChange').change(function() {
    $(this).val();
});
</script>
</div>
<!-- <script>
// $(document).ready(function() {
//     $('#roleChange').change(function(){
//         $('#delete').modal('show');
//     });
// });

// </script>-->
<!-- // <script> 
// function changeRole(){
//   // alert("hai");
//   // var option_value = document.getElementById("numbers").value;
//   var value = $("#numbers option:selected").text();
//   alert(value);
//   if (value === "3") 
//   {
//     alert("veter");
//     document.getElementById("roleC").submit()
//   }
//   else if(value === "2")
//   {
//     alert(value);
//     document.getElementById("roleC").submit()
//   }
// }
// </script> -->
<!-- // <script>
// function changeRole(){
//     var value = $( "#numbers option:selected").val();
//     alert("hai");
//     if(value == '3'){
//       alert("hai");
//         $('#admin').modal({
//             show: true
//         });
//     }
// });
// </script> -->