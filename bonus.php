<div class="container-fluid px-0">
    <div class="table-responsive">
        <table class="table table">
            <thead>
            <tr class="text-center">
                <th>
                Date
                </th>
                <th>
                Bonus AMT
                </th>
            </tr>
            </thead>
            <tbody>
            <?php 
            
            $get_bonus = "select * from fmr_bonus where fmr_id='$fmr_id'";
            $run_bonus = mysqli_query($con,$get_bonus);
            while($row_bonus=mysqli_fetch_array($run_bonus)){
            
            $updated_date = $row_bonus['updated_date'];
            $bonus_amt = $row_bonus['bonus_amt'];

            ?>
            <tr class="text-center table-info">
                <td>
                <?php echo date('d/M/Y',strtotime($updated_date)); ?>
                </td>
                <td>
                ₹ <?php echo number_format($bonus_amt,2) ?>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

