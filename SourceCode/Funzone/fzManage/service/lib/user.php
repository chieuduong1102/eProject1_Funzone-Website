<p style="font-weight: bold; float: right">Admin: <span style="color: red;"><?php echo isset($_SESSION['admin'])? $_SESSION['admin']: ''; ?></span>
    &emsp;<a href=<?php echo '/Funzone/fzManage/logout.php'; ?> style="margin-right:30px;">Sign out <i class="fas fa-sign-out-alt"></i></a>
</p>

<p><?php echo isset($_SESSION['edit'])? 'Edit Successfully' : ''; ?></p>

<p><?php echo isset($_SESSION['delete'])? 'Delete Successfully' : ''; ?></p>