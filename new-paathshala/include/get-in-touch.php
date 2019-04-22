  <?php error_reporting(0);?>
<section class="padding-tb-100px background-dark wow fadeInUp" style="background-image: url('assets/img/banner-18.jpeg'); visibility: visible; animation-name: fadeInUp;">
  <div class="container padding-bottom-40px wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="row justify-content-center text-center">
      <div class="col-md-7">
        <h1 class="text-white text-center">Looking for the best institute for your ward?</h1>
        <h1 class="text-white text-center">You are at the right place!</h1>
        <br>
        <h1 class="text-white text-center"><span class="padding-tb-10px padding-lr-40px border-3">Get in touch with us</span></h1>
      </div>
    </div>
    <div class="row justify-content-md-center padding-tb-100px">
      <div class="col-lg-12">
        <div class="padding-30px background-dark" style="opacity: 0.9;">
          <form id="getinTouchForm">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-form-label text-white">Your Name</label>
                  <input type="text" class="form-control rounded-0" placeholder="Enter Name" id="name" name="name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-form-label text-white">Select Relation</label>
                  <select class="form-control rounded-0" id="relation" name="relation">
                    <option value="0">Select</option>
                    <option value="student">I am the student</option>
                    <option value="father">Student's Father</option>
                    <option value="mother">Student's Mother</option>
                    <option value="sibling">Student's Brother/Sister</option>
                    <option value="guardian">Student's Guardian</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="col-form-label text-white">Mobile Number</label>
                  <input type="text" class="form-control rounded-0" placeholder="Enter Mobile Number" id="mobile" name="mobile" value="<?php echo $_POST['mobile'];?>" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="col-form-label text-white">Email ID</label>
                  <input type="text" class="form-control rounded-0" placeholder="Enter Email Id" id="email" name="email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="col-form-label text-white">Select Standard</label>
                  <select class="form-control rounded-0" id="standard" name="standard">
                    <option value="0">Select</option>
                    <option value="viii">VIII</option>
                    <option value="ix">IX</option>
                    <option value="x">X</option>
                    <option value="xi">XI</option>
                    <option value="xii">XII</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="col-form-label text-white">Exams preparing for</label>
                  <select class="form-control rounded-0" id="exams" name="exams[]" multiple>
                    <option value="JEE [Main] + JEE [Advanced] + Boards">JEE [Main] + JEE [Advanced] + Boards</option>
                    <option value="NEET/AIIMS/JIPMER + Boards">NEET/AIIMS/JIPMER + Boards</option>
                    <option value="JEE Repeater">JEE Repeater</option>
                    <option value="NEET Repeater">NEET Repeater</option>
                    <option value="Only Boards [12th]">Only Boards [12th]</option>
                    <option value="Looking for only one/two subjects">Looking for only one/two subjects</option>
                    <option value="KVPY, IISER">KVPY, IISER</option>
                    <option value="Olympiads">Olympiads</option>
                    <option value="Foundation">Foundation</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12" align="center">
                <div class="form-group">
                  <div id="loader"><i class="fa fa-spinner fa-spin text-white fa-2x"></i></div>
                  <button class="btn btn-info rounded-0 text-black" type="submit" name="submit">SUBMIT</button>
                </div>
              </div>
              <div class="form-group col-lg-12">
                <div class="alert alert-danger" id="invname"><strong>Error!</strong> Invalid name format</div>
                <div class="alert alert-danger" id="invrelation"><strong>Error!</strong> Select relation</div>
                <div class="alert alert-danger" id="invmobile"><strong>Error!</strong> Invalid mobile number</div>
                <div class="alert alert-danger" id="invemail"><strong>Error!</strong> Invalid email format</div>
                <div class="alert alert-danger" id="invstandard"><strong>Error!</strong> Select standard</div>
                <div class="alert alert-danger" id="fail"><strong>Error!</strong> Something goes wrong unable to proceed your request kindly contact to the administrator</div>
                <div class="alert alert-success" id="success"><strong>Success!</strong> Thank you! we will get back to you shortly</div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>