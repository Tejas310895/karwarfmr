<div class="container-fluid px-0">
        <ul class="nav nav-pills nav-fill my-0" id="pills-tab" role="tablist">
            <li class="nav-item mx-0">
                <a class="nav-link rounded-0 active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">CREDITS</a>
            </li>
            <li class="nav-item mx-0">
                <a class="nav-link rounded-0" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">DEBITS</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="table table">
                    <thead>
                    <tr class="text-center">
                        <th>
                        Date
                        </th>
                        <th>
                        Amount
                        </th>
                        <th>
                        Remarks
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    $get_credits = "select * from fmr_settlements where fmr_id='$fmr_id'";
                    $run_credits = mysqli_query($con,$get_credits);
                    while($row_credits = mysqli_fetch_array($run_credits)){

                        $settlement_amt = $row_credits['settlement_amt'];
                        $settlement_type = $row_credits['settlement_type'];
                        $credit_updated_date = $row_credits['updated_date'];
                    
                    ?>
                    <tr class="text-center table-success">
                        <td>
                        <?php echo date('d/M/Y,h:i:s a',strtotime($credit_updated_date)); ?>
                        </td>
                        <td>
                        ₹ <?php echo number_format($settlement_amt,2); ?>
                        </td>
                        <td>
                        <?php echo $settlement_type; ?>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <table class="table table">
                    <thead>
                    <tr class="text-center">
                        <th>
                        Date
                        </th>
                        <th>
                        Amount
                        </th>
                        <th>
                        Remarks
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    $get_debits = "select * from fmr_debits where fmr_id='$fmr_id'";
                    $run_debits = mysqli_query($con,$get_debits);
                    while($row_debits=mysqli_fetch_array($run_debits)){

                        $debit_updated_date = $row_debits['updated_date'];
                        $fmr_debit_amt = $row_debits['fmr_debit_amt'];
                        $fmr_debit_comment = $row_debits['fmr_debit_comment'];
                    
                    ?>
                    <tr class="text-center table-danger">
                        <td>
                        <?php echo date('d/M/Y,h:i:s a',strtotime($debit_updated_date)); ?>
                        </td>
                        <td>
                        ₹ <?php echo number_format($fmr_debit_amt,2); ?>
                        </td>
                        <td>
                        <?php echo $fmr_debit_comment; ?>
                        </td>
                    </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>