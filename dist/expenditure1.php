<?php 
    include ('header.php');
    include('config.php');
    date_default_timezone_set("Asia/Calcutta");
    $username = $_SESSION['user_name'];
    $userId = $_SESSION['user_id'];
    $branchName = $_SESSION['branch'];
    $role = $_SESSION['role'];

    $sql1 = "SELECT * FROM add_user WHERE user_name = '$username'";
    $result1 = $conn->query($sql1);
    $userTable  = $result1->fetch_assoc();
    $userBranch = $userTable['branch'];
    // $branch_id = $userTable['branch_id'];
    // $userBranch = $userTable['branch'];

    if(isset($_REQUEST['tnuoma'])!=""){
        $amt = $_REQUEST['tnuoma'];
    }
    if(isset($_REQUEST['ex'])!=""){
        $ex=$_REQUEST["ex"];
        $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance+'$amt') WHERE branch_name= '$userBranch'";
        if($conn->query($sql2)){
            $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$userBranch' ORDER BY branch_id DESC LIMIT 1";
            $result2 = $conn->query($sql21);
            $branchTable = $result2->fetch_assoc();
            $branch_balance = $branchTable['branch_balance'];
            $branch_id = $branchTable['branch_id'];
            $sql3 = "INSERT INTO transaction_history (branch_id,user_id,category,description,Amount,credit,debit,balance) VALUES ('$branch_id','$userId','Reversed','Expense Amount','$amt','$amt','0','$branch_balance')";
            if($conn->query($sql3)){
                $sql = "DELETE FROM expenditure WHERE expenditure_id = '$ex'";
                if($conn->query($sql)){
                    echo'<script>window.location="expenditure.php?msg=Deleted Successfully"</script>';
                }
            }
        }
    } else {
        $ex="";
    }
    if(isset($_REQUEST['sal'])!=""){
        $sal=$_REQUEST["sal"];
        $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance+'$amt') WHERE branch_name= '$userBranch'";
        if($conn->query($sql2)){
            $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$userBranch' ORDER BY branch_id DESC LIMIT 1";
            $result2 = $conn->query($sql21);
            $branchTable = $result2->fetch_assoc();
            $branch_balance = $branchTable['branch_balance'];
            $branch_id = $branchTable['branch_id'];
            $sql3 = "INSERT INTO transaction_history (branch_id,user_id,category,description,Amount,credit,debit,balance) VALUES ('$branch_id','$userId','Reversed','Salary Amount','$amt','$amt','0','$branch_balance')";
            if($conn->query($sql3)){
                $sql = "DELETE FROM expenditure WHERE expenditure_id = '$sal'";
                if($conn->query($sql)){
                    echo'<script>window.location="expenditure.php?msg=Deleted Successfully"</script>';
                }
            }
        }
    } else {
        $sal="";
    }
    if(isset($_REQUEST['dep'])!=""){
        $dep=$_REQUEST["dep"];
        $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance+'$amt') WHERE branch_name= '$userBranch'";
        if($conn->query($sql2)){
            $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$userBranch' ORDER BY branch_id DESC LIMIT 1";
            $result2 = $conn->query($sql21);
            $branchTable = $result2->fetch_assoc();
            $branch_balance = $branchTable['branch_balance'];
            $branch_id = $branchTable['branch_id'];
            $sql3 = "INSERT INTO transaction_history (branch_id,user_id,category,description,Amount,credit,debit,balance) VALUES ('$branch_id','$userId','Deposits','Expense Amount','$amt','$amt','0','$branch_balance')";
            if($conn->query($sql3)){
                $sql = "DELETE FROM expenditure WHERE expenditure_id = '$dep'";
                if($conn->query($sql)){
                    echo'<script>window.location="expenditure.php?msg=Deleted Successfully"</script>';
                }
            }
        }
    } else {
        $dep="";
    }
    if(isset($_REQUEST['pet'])!=""){
        $pet=$_REQUEST["pet"];
        $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance-'$amt') WHERE branch_name= '$userBranch'";
        if($conn->query($sql2)){
            $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$userBranch' ORDER BY branch_id DESC LIMIT 1";
            $result2 = $conn->query($sql21);
            $branchTable = $result2->fetch_assoc();
            $branch_balance = $branchTable['branch_balance'];
            $branch_id = $branchTable['branch_id'];
            $sql3 = "INSERT INTO transaction_history (branch_id,user_id,category,description,Amount,credit,debit,balance) VALUES ('$branch_id','$userId','Reversed','Petty Cash Amount','$amt','$amt','0','$branch_balance')";
            if($conn->query($sql3)){
                $sql = "DELETE FROM expenditure WHERE expenditure_id = '$pet'";
                if($conn->query($sql)){
                    echo'<script>window.location="expenditure.php?msg=Deleted Successfully"</script>';
                }
            }
        }
    } else {
        $pet="";
    }
?>

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-3 py-lg-8  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">
                            Expenditure
                        </h2>
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--end::Notice-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title col-sm-12" style="display: grid;">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h3 class="card-label">
                                        View Expenditure
                                    </h3>
                                </div>
                                <div class=" card-toolbar col-sm-2">
                                    <a href="input-group.php" class="btn btn-success">Add Expenditure</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#all">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#home">Expenses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Salary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Deposited</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3">Petty Cash</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="all" class="container tab-pane active"><br>
                            <div class="table-responsive">
                                <!-- <table class="display" id="example" style="width:100%;"> -->
                                <table class="display table table-separate" id="example" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Create By</th>
                                            <th class="text-center">Date & Time</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Description</th>
                                            <!-- <th class="text-center">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            if($role == "super_admin"){
                                                $sql = "SELECT * FROM expenditure ORDER BY expenditure_id DESC";
                                            }elseif($role == "admin"){
                                                $sql = "SELECT * FROM expenditure WHERE branch_name='$branchName' ORDER BY expenditure_id DESC";
                                            }else{
                                                $sql = "SELECT * FROM expenditure WHERE userName='$username' ORDER BY expenditure_id DESC";
                                            }
                                              $result = $conn->query($sql);
                                              $i=1;
                                              while($expenditure = $result->FETCH_ASSOC()){
                                                $amount = '';
                                                $description = '';
                                                if($expenditure["amountSpent"]){
                                                    $amount = $expenditure["amountSpent"];
                                                    $description = $expenditure["expenseDescription"];
                                                }elseif($expenditure["amountPaid"]){
                                                    $amount = $expenditure["amountPaid"];
                                                    $description = $expenditure["salaryDescription"];
                                                }elseif($expenditure["pettyCashAmount"]){
                                                    $amount = $expenditure["pettyCashAmount"];
                                                    $description = $expenditure["pettyCashDescription"];
                                                }elseif($expenditure["depositsAmount"]){
                                                    $amount = $expenditure["depositsAmount"];
                                                    $description = $expenditure["depositsDescription"];
                                                }else{
                                                    $description = "Empty";
                                                }
                                    ?>
                                        <tr>
                                            <?php 
                                            // if (str_contains($expenditure["category"], 'Expenses')) {
                                            ?>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td class="text-center"><?php echo ($expenditure["category"]) ? $expenditure["category"] : "Petty Cash" ?></td>
                                            <td class="text-center"><?php  echo $expenditure['userName'] ?></td>
                                            <td class="text-center"><?php echo $expenditure["createdAt"] ?></td>
                                            <td class="text-center"><?php echo  $amount ?></td>
                                            <td class="text-center"><?php echo $description ?></td>
                                            <!-- <td class="text-center">

                                                <a href="edit_expenditure.php?xpens=<?php echo $expenditure["expenditure_id"] ?>" data-toggle="modal" data-target="#exampleModalCenter<?= $i ?>" class="btn btn-sm btn-clean btn-icon mr-2">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                                
                                                <div class="modal fade" id="exampleModalCenter<?= $i ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <form method="POST">
                                                                <div class="modal-body m-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Amount Spent<span style="color:red">*</span></label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="flaticon2-browser"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control" name="amountSpent" id="amountSpent" value="<?= $expenditure["amountSpent"] ?>" placeholder="Enter in Amount" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Description</label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <input type="text" class="form-control" name="expenseDescription" id="expenseDescription" value="<?= $expenditure["expenseDescription"] ?>" placeholder="Enter your Internal Info" />
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                                    <input type="hidden"  name="ExpenseId" value="<?php echo $expenditure["expenditure_id"] ?>">
                                                                    <input type="submit" class="btn btn-primary font-weight-bold" name="update1" value="Update">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="expenditure.php?del=<?php echo $expenditure["expenditure_id"] ?>" class="btn btn-sm btn-clean btn-icon mr-2">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path></g></svg>
                                                    </span>
                                                </a>
                                            </td> -->
                                            <?php  } ?>
                                        </tr>
                                    <?php
                                        //   }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="home" class="container tab-pane"><br>
                            <div class="table-responsive">
                                <!-- <table class="display" id="example" style="width:100%;"> -->
                                <table class="display table table-separate" id="example1" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Create By</th>
                                            <th class="text-center">Date & Time</th>
                                            <th class="text-center">Amount Spent</th>
                                            <th class="text-center">Description</th>
                                        <?php if($_SESSION['user_id'] == 1){?>
                                            <th class="text-center">Action</th>
                                        <?php }?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    
                                        if($role == "super_admin"){
                                            $sql = "SELECT * FROM expenditure ORDER BY expenditure_id DESC";
                                        }elseif($role == "admin"){
                                            $sql = "SELECT * FROM expenditure WHERE branch_name='$branchName' ORDER BY expenditure_id DESC";
                                        }else{
                                            $sql = "SELECT * FROM expenditure WHERE userName='$username' ORDER BY expenditure_id DESC";
                                        }
                                        $result = $conn->query($sql);
                                        $i=1;
                                        while($expenditure = $result->FETCH_ASSOC()){
                                    ?>
                                        <tr>
                                            <?php 
                                            if (str_contains($expenditure["category"], 'Expenses')) {
                                            ?>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td class="text-center"><?php echo $expenditure["category"] ?></td>
                                            <td class="text-center"><?php echo $expenditure['userName'] ?></td>
                                            <td class="text-center"><?php echo $expenditure["createdAt"] ?></td>
                                            <td class="text-center"><?php echo $expenditure["amountSpent"] ?></td>
                                            <td class="text-center"><?php echo ($expenditure["expenseDescription"]) ? $expenditure["expenseDescription"] : 'Empty' ; ?></td>
                                            <?php if($_SESSION['user_id'] == 1){?>
                                            <td class="text-center">
                                                <!-- <a href="edit_expenditure.php?xpens=<?php echo $expenditure["expenditure_id"] ?>" data-toggle="modal" data-target="#exampleModalCenter<?= $i ?>" class="btn btn-sm btn-clean btn-icon mr-2">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a> -->
                                                
                                                <!-- <div class="modal fade" id="exampleModalCenter<?= $i ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <form method="POST">
                                                                <div class="modal-body m-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Amount Spent<span style="color:red">*</span></label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="flaticon2-browser"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control" name="amountSpent" id="amountSpent" value="<?= $expenditure["amountSpent"] ?>" placeholder="Enter in Amount" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Description</label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <input type="text" class="form-control" name="expenseDescription" id="expenseDescription" value="<?= $expenditure["expenseDescription"] ?>" placeholder="Enter your Internal Info" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                                    <input type="hidden"  name="ExpenseId" value="<?php echo $expenditure["expenditure_id"] ?>">
                                                                    <input type="submit" class="btn btn-primary font-weight-bold" name="update1" value="Update">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <a href="expenditure.php?ex=<?php echo $expenditure["expenditure_id"] ?>&tnuoma=<?php echo $expenditure["amountSpent"] ?>" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon mr-2">
                                                    <span class="svg-icon svg-icon-danger svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path></g></svg>
                                                    </span>
                                                </a>
                                            </td>
                                            <?php  }
                                        } ?>
                                        </tr>
                                    <?php
                                          }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu1" class="container tab-pane"><br>
                            <div class="table-responsive">
                            <table class="display table table-separate" id="example2" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" >#</th>
                                            <th class="text-center" >Category</th>
                                            <th class="text-center">Create By</th>
                                            <th class="text-center">Date & Time</th>
                                            <th class="text-center" >Employee Name</th>
                                            <th class="text-center" > Amount Paid</th>
                                            <th class="text-center" >Description</th>
                                            <?php if($_SESSION['user_id'] == 1){?>
                                            <th class="text-center" >Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                             if($role == "super_admin"){
                                                $sql = "SELECT * FROM expenditure ORDER BY expenditure_id DESC";
                                            }elseif($role == "admin"){
                                                $sql = "SELECT * FROM expenditure WHERE branch_name='$branchName' ORDER BY expenditure_id DESC";
                                            }else{
                                                $sql = "SELECT * FROM expenditure WHERE userName='$username' ORDER BY expenditure_id DESC";
                                            }
                                              $result = $conn->query($sql);
                                              $j=1;
                                              while($expenditure = $result->FETCH_ASSOC()){
                                            
                                    ?>
                                        <tr>
                                            <?php 
                                            if (str_contains($expenditure["category"], 'Salary')) {
                                            ?>
                                            <td class="text-center"><?php echo $j++ ?></td>
                                            <td class="text-center"><?php echo $expenditure["category"] ?></td>
                                            <td class="text-center"><?php echo $expenditure['userName'] ?></td>
                                            <td class="text-center"><?php echo $expenditure["createdAt"] ?></td>
                                            <td class="text-center"><?php echo $expenditure["employeeName"] ?></td>
                                            <td class="text-center"><?php echo $expenditure["amountPaid"] ?></td>
                                            <td class="text-center"><?php echo ($expenditure["salaryDescription"]) ? $expenditure["salaryDescription"] : 'Empty' ; ?></td>
                                            <?php if($_SESSION['user_id'] == 1){?>
                                            <td class="text-center">
                                                <!-- <a href="edit_expenditure.php?sal=<?php echo $expenditure["expenditure_id"] ?>" data-toggle="modal" data-target="#exampleModalCenter2<?= $j ?>" class="btn btn-sm btn-clean btn-icon mr-2">
                                                   
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a> -->
                                                <!-- <div class="modal fade" id="exampleModalCenter2<?= $j ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Salary</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <form method="POST">
                                                                <div class="modal-body m-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Amount Paid<span style="color:red">*</span></label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="flaticon2-browser"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control" name="amountPaid" id="amountPaid" value="<?php echo $expenditure["amountPaid"] ?>" placeholder="Enter in Amount" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Employee Name<span style="color:red">*</span></label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <input type="text" class="form-control" name="employeeName" id="employeeName" value="<?php echo $expenditure["employeeName"] ?>" placeholder="Employee Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Description</label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <input type="text" class="form-control" name="salaryDescription" id="salaryDescription" value="<?php echo $expenditure["salaryDescription"] ?>" placeholder="Description" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                                    <input type="hidden"  name="salaryId" value="<?php echo $expenditure["expenditure_id"] ?>">
                                                                    <input type="submit" class="btn btn-primary font-weight-bold" name="salaryUpdate" value="Update">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <a href="expenditure.php?sal=<?php echo $expenditure["expenditure_id"] ?>&tnuoma=<?php echo $expenditure["amountPaid"] ?>" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon mr-2">
                                                    <!-- Delete -->
                                                    <span class="svg-icon svg-icon-danger svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path></g></svg>
                                                    </span>
                                                </a>
                                            </td>
                                        <?php  }
                                        } ?>
                                        </tr>
                                    <?php
                                          }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu2" class="container tab-pane"><br>
                            <div class="table-responsive">
                            <table class="display table table-separate" id="example3" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" >#</th>
                                            <th class="text-center" >Category</th>
                                            <th class="text-center">Create By</th>
                                            <th class="text-center">Date & Time</th>
                                            <th class="text-center" >Deposited Amount</th>
                                            <th class="text-center" >Description</th>
                                            <?php if($_SESSION['user_id'] == 1){?>
                                            <th class="text-center" >Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            if($role == "super_admin"){
                                                $sql = "SELECT * FROM expenditure ORDER BY expenditure_id DESC";
                                            }elseif($role == "admin"){
                                                $sql = "SELECT * FROM expenditure WHERE branch_name='$branchName' ORDER BY expenditure_id DESC";
                                            }else{
                                                $sql = "SELECT * FROM expenditure WHERE userName='$username' ORDER BY expenditure_id DESC";
                                            }
                                              $result = $conn->query($sql);
                                              $i=1;
                                              while($expenditure = $result->FETCH_ASSOC()){
                                            
                                    ?>
                                        <tr>
                                            <?php 
                                            if (str_contains($expenditure["category"], 'Deposited')) {
                                            ?>
                                            <td class="text-center"><?php echo $i++ ?></td>
                                            <td class="text-center"><?php echo $expenditure["category"] ?></td>
                                            <td class="text-center"><?php echo $expenditure['userName'] ?></td>
                                            <td class="text-center"><?php echo $expenditure["createdAt"] ?></td>
                                            <td class="text-center"><?php echo $expenditure["depositsAmount"] ?></td>
                                            <td class="text-center"><?php echo ($expenditure["depositsDescription"]) ? $expenditure["depositsDescription"] : 'Empty' ; ?></td>
                                            <?php if($_SESSION['user_id'] == 1){?>
                                            <td class="text-center">
                                                <!-- <a href="edit_expenditure.php?xpens=<?php echo $expenditure["expenditure_id"] ?>" data-toggle="modal" data-target="#exampleModalCenter3<?= $i ?>" class="btn btn-sm btn-clean btn-icon mr-2">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div class="modal fade" id="exampleModalCenter3<?= $i ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Deposited</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <form method="POST">
                                                                <div class="modal-body m-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Enter the Amount<span style="color:red">*</span></label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="flaticon2-browser"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control" name="depositsAmount" id="depositsAmount" value="<?= $expenditure["depositsAmount"] ?>" placeholder="Enter in Amount" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Description</label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <input type="text" class="form-control" name="depositsDescription" id="depositsDescription" value="<?= $expenditure["depositsDescription"] ?>" placeholder="Enter your Internal Info" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                                    <input type="hidden"  name="depositedId" value="<?php echo $expenditure["expenditure_id"] ?>">
                                                                    <input type="submit" class="btn btn-primary font-weight-bold" name="depositUpdate" value="Update">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <a href="expenditure.php?dep=<?php echo $expenditure["expenditure_id"] ?>&tnuoma=<?php echo $expenditure["depositsAmount"] ?>" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon mr-2">
                                                    <!-- Delete -->
                                                    <span class="svg-icon svg-icon-danger svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path></g></svg>
                                                    </span>
                                                </a>
                                            </td>
                                            <?php  }
                                        } ?>
                                        </tr>
                                    <?php
                                          }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu3" class="container tab-pane"><br>
                            <div class="table-responsive">
                                <table class="display table table-separate" id="example4" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" >#</th>
                                            <th class="text-center">Create By</th>
                                            <th class="text-center">Date & Time</th>
                                            <th class="text-center" >Amount</th>
                                            <th class="text-center" >Description</th>
                                            <?php if($_SESSION['user_id'] == 1){?>
                                            <th class="text-center" >Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            if($role == "super_admin"){
                                                $sql = "SELECT * FROM expenditure ORDER BY expenditure_id DESC";
                                            }elseif($role == "admin"){
                                                $sql = "SELECT * FROM expenditure WHERE branch_name='$branchName' ORDER BY expenditure_id DESC";
                                            }else{
                                                $sql = "SELECT * FROM expenditure WHERE userName='$username' ORDER BY expenditure_id DESC";
                                            }
                                              $result = $conn->query($sql);
                                              $i=1;
                                              while($expenditure = $result->FETCH_ASSOC()){
                                    ?>
                                        <tr>
                                            <?php 
                                            if (str_contains($expenditure["expenditure"], 'PettyCash')) {
                                            ?>
                                            <td class="text-center"><?php echo $i++ ?></td>
                                            <td class="text-center"><?php echo $expenditure['userName'] ?></td>
                                            <td class="text-center"><?php echo $expenditure["createdAt"] ?></td>
                                            <td class="text-center"><?php echo $expenditure["pettyCashAmount"] ?></td>
                                            <td class="text-center"><?php echo ($expenditure["pettyCashDescription"]) ? $expenditure["pettyCashDescription"] : 'Empty' ; ?></td>
                                            <?php if($_SESSION['user_id'] == 1){ ?>
                                            <td class="text-center">

                                                <!-- <a href="edit_expenditure.php?petty=<?php echo $expenditure["expenditure_id"] ?>" data-toggle="modal" data-target="#exampleModalCenter4<?= $i ?>" class="btn btn-sm btn-clean btn-icon mr-2">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div class="modal fade" id="exampleModalCenter4<?= $i ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Petty Cash</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <form method="POST">
                                                                <div class="modal-body m-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Enter the amount<span style="color:red">*</span></label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="flaticon2-browser"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control" name="pettyCashAmount" id="pettyCashAmount" value="<?php echo $expenditure["pettyCashAmount"] ?>" placeholder="Enter in Amount" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Description</label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <input type="text" class="form-control" name="pettyCashDescription" id="pettyCashDescription" value="<?php echo $expenditure["pettyCashDescription"] ?>" placeholder="Enter your Internal Info" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                                    <input type="hidden"  name="pettyId" value="<?php echo $expenditure["expenditure_id"] ?>">
                                                                    <input type="submit" class="btn btn-primary font-weight-bold" name="pettyUpdate" value="Update">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <a href="expenditure.php?pet=<?php echo $expenditure["expenditure_id"] ?>&tnuoma=<?php echo $expenditure["pettyCashAmount"] ?>" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon mr-2">
                                                    <span class="svg-icon svg-icon-danger svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path></g></svg>
                                                    </span>
                                                </a>
                                            </td>
                                            <?php  }
                                        } ?>
                                        </tr>
                                    <?php
                                          }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
    
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-left p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">
                User Profile
                <!--<small class="text-muted font-size-sm ml-2">12 messages</small>-->
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->

        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                        <?php echo $_SESSION['name']; ?>
                    </a>
                    <div class="text-muted mt-1">
                        <?php echo $_SESSION['role']; ?>
                    </div>
                    <div class="navi mt-2">
                        <a href="#" class="navi-item">
                            <span class="navi-link p-0 pb-2">
                                <span class="navi-icon mr-1">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                        <!--<svg-->
                                        <!--    xmlns="http://www.w3.org/2000/svg"-->
                                        <!--    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"-->
                                        <!--    viewBox="0 0 24 24" version="1.1">-->
                                        <!--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                                        <!--        <rect x="0" y="0" width="24" height="24" />-->
                                        <!--        <path-->
                                        <!--            d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"-->
                                        <!--            fill="#000000" />-->
                                        <!--        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />-->
                                        <!--    </g>-->
                                        <!--</svg>-->
                                        <!--end::Svg Icon-->
                                    </span> </span>
                                <!--<span class="navi-text text-muted text-hover-primary">jm@softplus.com</span>-->
                            </span>
                        </a>

                        <a href="logout.php" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                    </div>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->

            <!--begin::Nav-->
            <!--<div class="navi navi-spacer-x-0 p-0">-->
                <!--begin::Item-->
            <!--    <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item">-->
            <!--        <div class="navi-link">-->
            <!--            <div class="symbol symbol-40 bg-light mr-3">-->
            <!--                <div class="symbol-label">-->
            <!--                    <span class="svg-icon svg-icon-md svg-icon-success">-->
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg--><svg
            <!--                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
            <!--                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
            <!--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
            <!--                                <rect x="0" y="0" width="24" height="24" />-->
            <!--                                <path-->
            <!--                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"-->
            <!--                                    fill="#000000" />-->
            <!--                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />-->
            <!--                            </g>-->
            <!--                        </svg>-->
                                    <!--end::Svg Icon-->
            <!--                    </span>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="navi-text">-->
            <!--                <div class="font-weight-bold">-->
            <!--                    My Profile-->
            <!--                </div>-->
            <!--                <div class="text-muted">-->
            <!--                    Account settings and more-->
            <!--                    <span class="label label-light-danger label-inline font-weight-bold">update</span>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </a>-->
                <!--end:Item-->

                <!--begin::Item-->
            <!--    <a href="custom/apps/user/profile-3.html" class="navi-item">-->
            <!--        <div class="navi-link">-->
            <!--            <div class="symbol symbol-40 bg-light mr-3">-->
            <!--                <div class="symbol-label">-->
            <!--                    <span class="svg-icon svg-icon-md svg-icon-warning">-->
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg--><svg
            <!--                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
            <!--                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
            <!--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
            <!--                                <rect x="0" y="0" width="24" height="24" />-->
            <!--                                <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13"-->
            <!--                                    rx="1.5" />-->
            <!--                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8"-->
            <!--                                    rx="1.5" />-->
            <!--                                <path-->
            <!--                                    d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"-->
            <!--                                    fill="#000000" fill-rule="nonzero" />-->
            <!--                                <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6"-->
            <!--                                    rx="1.5" />-->
            <!--                            </g>-->
            <!--                        </svg>-->
                                    <!--end::Svg Icon-->
            <!--                    </span>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="navi-text">-->
            <!--                <div class="font-weight-bold">-->
            <!--                    My Messages-->
            <!--                </div>-->
            <!--                <div class="text-muted">-->
            <!--                    Inbox and tasks-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </a>-->
                <!--end:Item-->

                <!--begin::Item-->
            <!--    <a href="custom/apps/user/profile-2.html" class="navi-item">-->
            <!--        <div class="navi-link">-->
            <!--            <div class="symbol symbol-40 bg-light mr-3">-->
            <!--                <div class="symbol-label">-->
            <!--                    <span class="svg-icon svg-icon-md svg-icon-danger">-->
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Files/Selected-file.svg--><svg
            <!--                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
            <!--                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
            <!--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
            <!--                                <polygon points="0 0 24 0 24 24 0 24" />-->
            <!--                                <path-->
            <!--                                    d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"-->
            <!--                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
            <!--                                <path-->
            <!--                                    d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"-->
            <!--                                    fill="#000000" fill-rule="nonzero" />-->
            <!--                            </g>-->
            <!--                        </svg>-->
                                    <!--end::Svg Icon-->
            <!--                    </span>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="navi-text">-->
            <!--                <div class="font-weight-bold">-->
            <!--                    My Activities-->
            <!--                </div>-->
            <!--                <div class="text-muted">-->
            <!--                    Logs and notifications-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </a>-->
                <!--end:Item-->

                <!--begin::Item-->
            <!--    <a href="custom/apps/userprofile-1/overview.html" class="navi-item">-->
            <!--        <div class="navi-link">-->
            <!--            <div class="symbol symbol-40 bg-light mr-3">-->
            <!--                <div class="symbol-label">-->
            <!--                    <span class="svg-icon svg-icon-md svg-icon-primary">-->
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg--><svg
            <!--                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
            <!--                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
            <!--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
            <!--                                <rect x="0" y="0" width="24" height="24" />-->
            <!--                                <path-->
            <!--                                    d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"-->
            <!--                                    fill="#000000" opacity="0.3" />-->
            <!--                                <path-->
            <!--                                    d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"-->
            <!--                                    fill="#000000" />-->
            <!--                            </g>-->
            <!--                        </svg>-->
                                    <!--end::Svg Icon-->
            <!--                    </span>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="navi-text">-->
            <!--                <div class="font-weight-bold">-->
            <!--                    My Tasks-->
            <!--                </div>-->
            <!--                <div class="text-muted">-->
            <!--                    latest tasks and projects-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </a>-->
                <!--end:Item-->
            <!--</div>-->
            <!--end::Nav-->

            <!--begin::Separator-->
            <!--<div class="separator separator-dashed my-7"></div>-->
            <!--end::Separator-->

            <!--begin::Notifications-->
            <div>
                <!--begin:Heading-->
                <!--<h5 class="mb-5">-->
                <!--    Recent Notifications-->
                <!--</h5>-->
                <!--end:Heading-->

                <!--begin::Item-->
                <!--<div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">-->
                <!--    <span class="svg-icon svg-icon-warning mr-5">-->
                <!--        <span class="svg-icon svg-icon-lg">-->
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg--><svg
                <!--                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
                <!--                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
                <!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                <!--                    <rect x="0" y="0" width="24" height="24" />-->
                <!--                    <path-->
                <!--                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"-->
                <!--                        fill="#000000" />-->
                <!--                    <rect fill="#000000" opacity="0.3"-->
                <!--                        transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "-->
                <!--                        x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />-->
                <!--                </g>-->
                <!--            </svg>-->
                            <!--end::Svg Icon-->
                <!--        </span> </span>-->

                <!--    <div class="d-flex flex-column flex-grow-1 mr-2">-->
                <!--        <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Another-->
                <!--            purpose persuade</a>-->
                <!--        <span class="text-muted font-size-sm">Due in 2 Days</span>-->
                <!--    </div>-->

                <!--    <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>-->
                <!--</div>-->
                <!--end::Item-->

                <!--begin::Item-->
                <!--<div class="d-flex align-items-center bg-light-success rounded p-5 gutter-b">-->
                <!--    <span class="svg-icon svg-icon-success mr-5">-->
                <!--        <span class="svg-icon svg-icon-lg">-->
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg--><svg
                <!--                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
                <!--                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
                <!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                <!--                    <rect x="0" y="0" width="24" height="24" />-->
                <!--                    <path-->
                <!--                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"-->
                <!--                        fill="#000000" fill-rule="nonzero"-->
                <!--                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) " />-->
                <!--                    <path-->
                <!--                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"-->
                <!--                        fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
                <!--                </g>-->
                <!--            </svg>-->
                            <!--end::Svg Icon-->
                <!--        </span> </span>-->
                <!--    <div class="d-flex flex-column flex-grow-1 mr-2">-->
                <!--        <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Would-->
                <!--            be to people</a>-->
                <!--        <span class="text-muted font-size-sm">Due in 2 Days</span>-->
                <!--    </div>-->

                <!--    <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>-->
                <!--</div>-->
                <!--end::Item-->

                <!--begin::Item-->
                <!--<div class="d-flex align-items-center bg-light-danger rounded p-5 gutter-b">-->
                <!--    <span class="svg-icon svg-icon-danger mr-5">-->
                <!--        <span class="svg-icon svg-icon-lg">-->
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg
                <!--                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
                <!--                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
                <!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                <!--                    <rect x="0" y="0" width="24" height="24" />-->
                <!--                    <path-->
                <!--                        d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"-->
                <!--                        fill="#000000" />-->
                <!--                    <path-->
                <!--                        d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"-->
                <!--                        fill="#000000" opacity="0.3" />-->
                <!--                </g>-->
                <!--            </svg>-->
                            <!--end::Svg Icon-->
                <!--        </span> </span>-->
                <!--    <div class="d-flex flex-column flex-grow-1 mr-2">-->
                <!--        <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">Purpose-->
                <!--            would be to persuade</a>-->
                <!--        <span class="text-muted font-size-sm">Due in 2 Days</span>-->
                <!--    </div>-->

                <!--    <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>-->
                <!--</div>-->
                <!--end::Item-->

                <!--begin::Item-->
                <!--<div class="d-flex align-items-center bg-light-info rounded p-5">-->
                <!--    <span class="svg-icon svg-icon-info mr-5">-->
                <!--        <span class="svg-icon svg-icon-lg">-->
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg--><svg
                <!--                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
                <!--                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
                <!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                <!--                    <rect x="0" y="0" width="24" height="24" />-->
                <!--                    <path-->
                <!--                        d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"-->
                <!--                        fill="#000000" opacity="0.3"-->
                <!--                        transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641) " />-->
                <!--                    <path-->
                <!--                        d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"-->
                <!--                        fill="#000000"-->
                <!--                        transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359) " />-->
                <!--                    <path-->
                <!--                        d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"-->
                <!--                        fill="#000000" opacity="0.3"-->
                <!--                        transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146) " />-->
                <!--                    <path-->
                <!--                        d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"-->
                <!--                        fill="#000000" opacity="0.3"-->
                <!--                        transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961) " />-->
                <!--                </g>-->
                <!--            </svg>-->
                            <!--end::Svg Icon-->
                <!--        </span> </span>-->

                <!--    <div class="d-flex flex-column flex-grow-1 mr-2">-->
                <!--        <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">The-->
                <!--            best product</a>-->
                <!--        <span class="text-muted font-size-sm">Due in 2 Days</span>-->
                <!--    </div>-->

                <!--    <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>-->
                <!--</div>-->
                <!--end::Item-->
            </div>
            <!--end::Notifications-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->

    <!--begin::Footer-->
    <!--doc: add "bg-white" class to have footer with solod background color-->
    <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
        <!--begin::Container-->
        <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">2022&copy;</span>
                <a href="#" target="_blank" class="text-dark-75 text-hover-primary">APS</a>
            </div>
            <!--end::Copyright-->

            <!--begin::Nav-->
            <!--<div class="nav nav-dark order-1 order-md-2">-->
            <!--    <a href="#" class="nav-link pr-3 pl-0">About</a>-->
            <!--    <a href="#" class="nav-link px-3">Team</a>-->
            <!--    <a href="#" class="nav-link pl-3 pr-0">Contact</a>-->
            <!--</div>-->
            <!--end::Nav-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->
<script>
var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
</script>
<script>
        var eventFired = function ( type ) {
            var n = document.querySelector('#example');
            n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
            n.scrollTop = n.scrollHeight;     
        }
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#example');
            // table
            //     .on('order', function () {
            //         eventFired( 'Order' );
            //     })
            //     .on('search', function () {
            //         eventFired( 'Search' );
            //     })
            //     .on('page', function () {
            //         eventFired( 'Page' );
            //     });
            $(document).ready(function () {
                $('#example').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                });
            });
        });
        var eventFired1 = function ( type ) {
            var n1 = document.querySelector('#example1');
            n1.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
            n1.scrollTop = n1.scrollHeight;     
        }
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#example1');
            // table
            //     .on('order', function () {
            //         eventFired( 'Order' );
            //     })
            //     .on('search', function () {
            //         eventFired( 'Search' );
            //     })
            //     .on('page', function () {
            //         eventFired( 'Page' );
            //     });
            $(document).ready(function () {
                $('#example1').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                });
            });
        });
        var eventFired = function ( type ) {
            var n = document.querySelector('#example2');
            n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
            n.scrollTop = n.scrollHeight;     
        }
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#example2');
            // table
            //     .on('order', function () {
            //         eventFired( 'Order' );
            //     })
            //     .on('search', function () {
            //         eventFired( 'Search' );
            //     })
            //     .on('page', function () {
            //         eventFired( 'Page' );
            //     });
            $(document).ready(function () {
                $('#example2').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                });
            });
        });
        var eventFired = function ( type ) {
            var n = document.querySelector('#example3');
            n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
            n.scrollTop = n.scrollHeight;     
        }
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#example3');
            // table
            //     .on('order', function () {
            //         eventFired( 'Order' );
            //     })
            //     .on('search', function () {
            //         eventFired( 'Search' );
            //     })
            //     .on('page', function () {
            //         eventFired( 'Page' );
            //     });
            $(document).ready(function () {
                $('#example3').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                });
            });
        });
        var eventFired4 = function ( type ) {
            var n4 = document.querySelector('#example4');
            n4.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
            n4.scrollTop = n4.scrollHeight;     
        }
        document.addEventListener('DOMContentLoaded', function () {
            let table4 = new DataTable('#example4');
            // table
            //     .on('order', function () {
            //         eventFired( 'Order' );
            //     })
            //     .on('search', function () {
            //         eventFired( 'Search' );
            //     })
            //     .on('page', function () {
            //         eventFired( 'Page' );
            //     });
            $(document).ready(function () {
                $('#example4').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                });
            });
        });

        function myFunction() {
            alert("Are you want delete this entry?");
        }
</script>
<script src="assets/js/pages/crud/ktdatatable/advanced/column-rendering.js"></script>
<!--begin::Global Config(global config for global JS scripts)-->

<script type="text/javascript" src="datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables JS library -->
<script type="text/javascript" src="datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->


<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/ktdatatable/advanced/column-rendering.js"></script>
<script src="assets/js/pages/crud/ktdatatable/base/data-local.js"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>