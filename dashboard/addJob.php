<?php include "../includes/conn.php"; ?>
<?php include "../includes/indexHeader.php"; ?>

<body>
  <?php include "../includes/indexNavbar.php"; ?>

  <div class="dashboard-container">
    <?php include "../dashboard/dashboardSidebar.php" ?>

    <div class="add-job-container">
      <div class="add-job-content-container">
        <div class="headline">
          <h3>Add New Job</h3>
        </div>
        <form class="job-form-container">
          <div class="input-group item-a">
            <label for="job-title">Job Title/Designation</label>
            <input type="text" placeholder="Job Title" name="jobtitle" required>
          </div>
          <div class="input-group item-b">
            <label for="job-title">Job Category</label>
            <div class="select-container">
              <select id="select-category">
                <option value="Accounting/Finance">Accounting/Finance</option>
                <option value="Bank/Non-Bank Financial Institution">Bank/Non-Bank Financial Institution</option>
                <option value="Supply Chain/Procurement">Supply Chain/Procurement</option>
                <option value="Education/Training">Education/Training</option>
                <option value="Engineer/Architects">Engineer/Architects</option>
                <option value="Garments/Textile">Garments/Textile</option>
                <option value="HR/Org. Development">HR/Org. Development</option>
                <option value="Gen Mgt/Admin">Gen Mgt/Admin</option>
                <option value="Design/Creative">Design/Creative</option>
                <option value="Production/Operation">Production/Operation</option>
                <option value="Hospitality/Travel/Tourism">Hospitality/Travel/Tourism</option>
                <option value="Commercial">Commercial</option>
                <option value="Beauty Care/Health & Fitness">Beauty Care/Health & Fitness</option>
                <option value="IT & Telecommunication">IT & Telecommunication</option>
                <option value="Marketing/Sales">Marketing/Sales</option>
                <option value="Customer Service/Call Centre">Customer Service/Call Centre</option>
                <option value="Media/Ad./Event Mgt.">Media/Ad./Event Mgt.</option>
                <option value="Medical/Pharma">Medical/Pharma</option>
                <option value="Agro (Plant/Animal/Fisheries)">Agro (Plant/Animal/Fisheries)</option>
                <option value="NGO/Development">NGO/Development</option>
                <option value="Research/Consultancy">Research/Consultancy</option>
                <option value="Secretary/Receptionist">Secretary/Receptionist</option>
                <option value="Data Entry/Operator/BPO">Data Entry/Operator/BPO</option>
                <option value="Driving/Motor Technician">Driving/Motor Technician</option>
                <option value="Security/Support Service">Security/Support Service</option>
                <option value="Law/Legal">Law/Legal</option>
                <option value="Electrician/Construction/Repair">Electrician/Construction/Repair</option>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="input-group  item-c">
            <label for="job-title">Job Type</label>
            <div class="select-container">
              <select id="select-category">
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
                <option value="Internship">Internship</option>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="input-group  item-d">
            <label for="job-title">Experience (Years)</label>
            <input type="number" placeholder="Experience" min="0" required="" name="experience">
          </div>
          <div class="input-group  item-e">
            <label for="job-title">Edu. Qualification</label>
            <input type="text" name="edu_qualification" required>
          </div>
          <div class="input-group  item-f">
            <label for="job-title">Division/State</label>
            <div class="select-container">
              <select id="select-category" name="region" required>
                <?php $divisionSql = "SELECT * from states";
                $divisionQuery = $conn->query($divisionSql);
                while ($division = $divisionQuery->fetch_assoc()) {
                ?>
                  <option value="<?php echo $division['id'] ?>"><?php echo $division['name'] ?></option>
                <?php } ?>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="input-group  item-g">
            <label for="job-title">District/City</label>
            <div class="select-container">
              <select id="select-category">
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Khulna">Khulna</option>
                <option value="Comilla">Comilla</option>
                <option value="Barisal">Barisal</option>
                <option value="Mymensingh">Mymensingh</option>
                <option value="Cox's Bazar">Cox's Bazar</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Jessore">Jessore</option>
                <option value="Narayanganj">Narayanganj</option>
                <option value="Gazipur">Gazipur</option>
                <option value="Bogra">Bogra</option>
                <option value="Dinajpur">Dinajpur</option>
                <option value="Tangail">Tangail</option>
                <option value="Jamalpur">Jamalpur</option>
                <option value="Pabna">Pabna</option>
                <option value="Narsingdi">Narsingdi</option>
                <option value="Naogaon">Naogaon</option>
                <option value="Kushtia">Kushtia</option>
                <option value="Rangamati">Rangamati</option>
                <option value="Cox's Bazar">Cox's Bazar</option>
                <option value="Noakhali">Noakhali</option>
                <option value="Bhola">Bhola</option>
                <option value="Sherpur">Sherpur</option>
                <option value="Kishoreganj">Kishoreganj</option>
                <option value="Satkhira">Satkhira</option>
                <option value="Chandpur">Chandpur</option>
                <option value="Patuakhali">Patuakhali</option>
                <option value="Bagerhat">Bagerhat</option>
                <option value="Sirajganj">Sirajganj</option>
                <option value="Moulvibazar">Moulvibazar</option>
                <option value="Faridpur">Faridpur</option>
                <option value="Brahmanbaria">Brahmanbaria</option>
                <option value="Kushtia">Kushtia</option>
                <option value="Panchagarh">Panchagarh</option>
                <option value="Sunamganj">Sunamganj</option>
                <option value="Narail">Narail</option>
                <option value="Chuadanga">Chuadanga</option>
                <option value="Joypurhat">Joypurhat</option>
                <option value="Netrokona">Netrokona</option>
                <option value="Magura">Magura</option>
                <option value="Thakurgaon">Thakurgaon</option>
                <option value="Lakshmipur">Lakshmipur</option>
                <option value="Meherpur">Meherpur</option>
                <option value="Jhenaidah">Jhenaidah</option>
                <option value="Lalmonirhat">Lalmonirhat</option>
                <option value="Gaibandha">Gaibandha</option>
                <option value="Satkhira">Satkhira</option>
                <option value="Habiganj">Habiganj</option>
                <option value="Barguna">Barguna</option>
                <option value="Shariatpur">Shariatpur</option>
                <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                <option value="Khagrachhari">Khagrachhari</option>
                <option value="Manikganj">Manikganj</option>
                <option value="Nilphamari">Nilphamari</option>
                <option value="Jhalokati">Jhalokati</option>
                <option value="Pirojpur">Pirojpur</option>
                <option value="Madaripur">Madaripur</option>
                <option value="Bandarban">Bandarban</option>
                <option value="Natore">Natore</option>
                <option value="Munshiganj">Munshiganj</option>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="input-group  item-h">
            <label for="job-title">Minimum Salary</label>
            <input type="number" placeholder="Min Salary" min="0" name="minimumsalary" required>
          </div>
          <div class="input-group  item-i">
            <label for="job-title">Maximum Salary</label>
            <input type="number" placeholder="Max Salary" min="0" required="" name="maximumsalary">
          </div>
          <div class="input-group  item-j">
            <label for="job-title">Deadline</label>
            <input type="date" name="deadline" required>
          </div>
          <div class="input-group  item-k">
            <label for="job-title">Job Skills</label>
            <textarea cols="20" rows="5" placeholder="Skills..." name="skills" required=""></textarea>
          </div>
          <div class="input-group  item-l">
            <label for="job-title">Job Description</label>
            <textarea cols="20" rows="5" placeholder="Job Description..." required="" name="description"></textarea>
          </div>
          <div class="button-container item-m">
            <button type="submit" name="myProfile" class="btn btn-secondary">Submit Job</button>
          </div>

        </form>

      </div>

    </div>
  </div>
</body>