<table class="table table-bordered table-striped table-display">
    <tr>
        <th>Sl</th>
        <th>Employee Name</th>
        <th>Month</th>
        <th>Year</th>
        <th>Total Working Day</th>
        <th>Attended</th>
        <th>Absent</th>
        <th>Gross Salary</th>
        <th>Provident Fund</th>
        <th>Tax</th>
        <th>Net Salary</th>
    </tr>
    <!-- <form action="" method="post"> -->
    <?php
    $employee = mysqli_query($conn, "SELECT users.*,salary.total_salary,salary.working_days,salary.deduction_rate,salary.bonus, salary.provident_fund, salary.professional_tax FROM users INNER JOIN salary ON users.id = salary.employee_id where users.id IN(SELECT DISTINCT employee_id FROM salary WHERE status='active') AND salary.status='active';");
    
    $sl = 1;
    while ($fetch = mysqli_fetch_assoc($employee)) {
        $user_id = $fetch['id'];
        $presentDays = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total FROM `attendance_details` WHERE `month` = $month and `year` = $year and `user_id` = $user_id;"));
        $present = (int)$presentDays["total"];
        $work = (int)$fetch['working_days'];
        // echo '<br>';
        // die();
        $absent = $work - $present;

        $totalSalary = $fetch['total_salary'];
        $providentFund = $fetch['provident_fund'];
        $tax = $fetch['professional_tax'];
        $deductedRate = $fetch['deduction_rate'];

        $grossSalary = $totalSalary - ($absent * $deductedRate);
        $netSalary = $grossSalary - $providentFund - $tax;

    ?>
        <tr>
            <td><?= $sl ?></td>
            <td><?= $fetch['first_name'] . ' ' . $fetch['last_name'] ?></td>
            <td><input type="text" readonly style="width: 50px;" value="<?= $month ?>" name="month" id=""></td>
            <td><input type="text" style="width: 50px;" readonly value="<?= $year ?>" name="year" id=""></td>
            <td><input type="text" style="width: 50px;" readonly name="working_days[]" value="<?= $work ?>" id="working_days_<?= $fetch['id'] ?>"></td>
            <td>
                <input type="number" readonly name="attended[]" oninput="return checkAttended(this.value,<?= $fetch['id'] ?>);" onblur="return checkAttended(this.value,<?= $fetch['id'] ?>);" min="0" value="<?= $present ?>" max="<?= $fetch['working_days'] ?>" id="attended_<?= $fetch['id'] ?>">
            </td>
            <td>
                <input type="text" readonly style="width: 50px;" value="<?= $absent ?>" name="absent[]" min="0" id="absent_<?= $fetch['id'] ?>">
            </td>
            <input type="hidden" name="" value="<?= $deductedRate ?>" id="deduct_<?= $fetch['id'] ?>">
            <input type="hidden" name="employee_id[]" id="employee_id" value="<?= $fetch['id'] ?>">
            <input type="hidden" name="" id="salary_<?= $fetch['id'] ?>" value="<?= $fetch['total_salary'] ?>">
            <td>
                <input type="text" style="width: 80px;" value="<?= $grossSalary ?>" readonly name="total_salary[]" id="total_salary_<?= $fetch['id'] ?>">
            </td>
            <td><input type="text" style="width: 80px;" value="<?= $providentFund ?>" readonly name="provident_fund[]" id="provident_fund_<?= $fetch['id'] ?>"></td>
            <td><input type="text" style="width: 80px;" value="<?= $tax ?>" readonly name="professional_tax[]" id="professional_tax_<?= $fetch['id'] ?>"></td>
            <td>
                <input type="text" style="width: 80px;" value="<?= $netSalary ?>" readonly name="" id="net_salary_<?= $fetch['id'] ?>">
            </td>
        </tr>
    <?php $sl++;
    } ?>
    <!-- <tr> -->
    <!-- <input type="submit" class="btn btn-sm btn-outline-success" name="add_attendance" id="" value="Add"> -->
    <!-- </tr> -->
    </form>
</table>
<script>
    function checkAttended(val, id) {
        let attn = val;
        let elmid = id;
        let work = document.querySelector('#working_days_' + elmid).value;
        if (attn > work) {
            document.querySelector('#attended_' + elmid).value = work;
        } else {
            let deduct = document.querySelector('#deduct_' + elmid).value;
            let salary = document.querySelector('#salary_' + elmid).value;
            let fund = document.querySelector('#provident_fund_' + elmid).value;
            let tax = document.querySelector('#professional_tax_' + elmid).value;
            let abs = parseInt(work) - parseInt(attn);
            let newsal = parseInt(salary) - (parseInt(abs) * parseInt(deduct));
            let netSal = parseInt(newsal) - parseInt(fund) - parseInt(tax);
            if (isNaN(newsal) || attn == 0) {
                newsal = 0;
                netSal = 0;
            }
            if (isNaN(abs)) {
                abs = work;
                // document.querySelector('#attended_'+elmid).value=0;
            }

            document.querySelector('#total_salary_' + elmid).value = newsal;
            document.querySelector('#net_salary_' + elmid).value = netSal;
            document.querySelector('#absent_' + elmid).value = abs;
            // console.log(`${newsal}`);
        }
    }
</script>