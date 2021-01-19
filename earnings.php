<div class="container-fluid px-0">
    <div class="table-responsive">
        <table class="table table">
            <thead>
            <tr class="text-center">
                <th>
                Name
                </th>
                <th>
                Orders
                </th>
                <th>
                Commission
                </th>
            </tr>
            </thead>
            <tbody>
            <?php 

                    $get_client_data = "select * from fmr_clients where fmr_id='$fmr_id'";
                    $run_client_data = mysqli_query($con,$get_client_data);
                    while($row_client_data = mysqli_fetch_array($run_client_data)){

                    $customer_id = $row_client_data['customer_id'];
                    $updated_date = $row_client_data['updated_date'];


                    $get_customer = "select * from customers where customer_id='$customer_id'";
                    $run_customer = mysqli_query($con,$get_customer);
                    $row_customer = mysqli_fetch_array($run_customer);

                    $customer_name = $row_customer['customer_name'];

                    $get_orders = "SELECT * from customer_orders where customer_id='$customer_id' group by invoice_no";
                    $run_orders = mysqli_query($con,$get_orders);
                    $total_purchase = 0;
                    $client_orders = 0;
                    while($row_orders=mysqli_fetch_array($run_orders)){
                        $invoice_no = $row_orders['invoice_no'];

                        $get_order_count = "select distinct(invoice_no) from customer_orders where invoice_no='$invoice_no' and order_status='Delivered'";
                        $run_order_count = mysqli_query($con,$get_order_count);
                        $order_count = mysqli_num_rows($run_order_count);

                        $client_orders += $order_count;

                        $get_total = "select sum(due_amount) as order_total from customer_orders where invoice_no='$invoice_no' and order_status='Delivered'";
                        $run_total = mysqli_query($con,$get_total);
                        $row_total = mysqli_fetch_array($run_total);
                        $order_total = $row_total['order_total'];

                        $total_purchase += $order_total;

                    }

            ?>
            <tr class="text-center table-info">
                <td>
                <?php echo $customer_name; ?>
                </td>
                <td>
                <?php echo $client_orders; ?>
                </td>
                <td>
                ₹ <?php echo number_format(($total_purchase*0.01),2); ?>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

