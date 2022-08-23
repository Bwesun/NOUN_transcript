<?php 
include('postgraduate_header.php');
?>
    
<br><br><br><br><br>
    <main class="container">
        <div class="card">
            <div class="card-header text-center">
              <h2>Postgraduate Transcript Application Form</h2>
            </div>
            <div class="card-body text-center">
                <strong>Note: All input without "(Optional)" are required</strong> 
            </div>
        </div>
        
        <br><br>
        <form class="form-floating" action="" method="post" enctype="multipart/form-data">
            <fieldset>
<?php

if(isset($_POST['sub_application'])){

    include('connect.php');

    $title=$_POST['title'];
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $sex=$_POST['sex'];
    $matric_no=$_POST['matric_no'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $programme=$_POST['programme'];
    $date_of_graduation=$_POST['date_of_graduation'];
    $applied_before=$_POST['applied_before'];
    $recipient=$_POST['recipient'];
    $recipient_name=$_POST['recipient_name'];
    $address=$_POST['address'];
    $city_town=$_POST['city_town'];
    $postal_code=$_POST['postal_code'];
    $country=$_POST['country'];
    $transcript_label=$_POST['transcript_label'];
    $rrr=$_POST['rrr'];

    $file1=$_FILES['file1']['name'];
    $savefile1=move_uploaded_file($_FILES['file1']['tmp_name'], "files/".$_FILES['file1']['name']);

    $file2=$_FILES['file2']['name'];
    $savefile2=move_uploaded_file($_FILES['file2']['tmp_name'], "files/".$_FILES['file2']['name']);

    $file3=$_FILES['file3']['name'];
    $savefile3=move_uploaded_file($_FILES['file3']['tmp_name'], "files/".$_FILES['file3']['name']);

    $status='Awaiting Processing';

    //echo "<br>SQL Error: ".mysqli_error($conn);
    $sql2="SELECT * FROM postgraduate WHERE rrr='$rrr' ";
    $result2=mysqli_query($conn, $sql2);
    $count=mysqli_num_rows($result2);


    if($count==0){
        $sql="INSERT INTO postgraduate(title, firstname, middlename, lastname, sex, matric_no, phone, dob, email, programme, date_of_graduation, applied_before, recipient, recipient_name, address, city_town, postal_code, country, transcript_label, rrr, file1, file2, file3, status)VALUES('$title', '$firstname', '$middlename', '$lastname', '$sex', '$matric_no', '$phone', '$dob', '$email', '$programme', '$date_of_graduation', '$applied_before', '$recipient', '$recipient_name', '$address', '$city_town', '$postal_code', '$country', '$transcript_label', '$rrr', '$file1', '$file2', '$file3', '$status') ";
        $result=mysqli_query($conn, $sql);
        $insert_id=mysqli_insert_id($conn);//Variablize Insert ID
            if($result){
                $subject='Transcript Application Notice';
                $admin_subject='New Transcript Application Notice';
                $message="Dear $title $firstname $middlename $lastname, Your Transcript Application is Successful! \n See below the information you submitted: \n \n Name: $title $firstname $middlename $lastname\n Sex: $sex\n Matriculation No.: $matric_no\n Phone No: $phone\n E-mail: $email\n Date of Birth: $dob\n Programme: $programme\n Date of Graduation: $date_of_graduation\n Have You Applied for Transcript Before?: $applied_before\n Recipient: $recipient\n Recipient Name/Office: $recipient_name\n Address: $address\n City/Town: $city_town\n Postal Code: $postal_code\n Country: $country\n Transcript Label: $transcript_label\n Remita RRR: $rrr ";
                $admin_message="New Transcript Application Detected! \n Application Details: \n \n Name: $title $firstname $middlename $lastname\n Sex: $sex\n Matriculation No.: $matric_no\n Phone No: $phone\n E-mail: $email\n Date of Birth: $dob\n Programme: $programme\n Date of Graduation: $date_of_graduation\n Have You Applied for Transcript Before?: $applied_before\n Recipient: $recipient\n Recipient Name/Office: $recipient_name\n Address: $address\n City/Town: $city_town\n Postal Code: $postal_code\n Country: $country\n Transcript Label: $transcript_label\n Remita RRR: $rrr ";
                $headers ='From: transcriptapp.nou.edu.ng';
                $admin_email ='mabolarin@noun.edu.ng';
                $mail_result=mail($email, $subject, $message, $headers);
                $admin_mail_result=mail($admin_email, $admin_subject, $admin_message, $headers);
                
                echo "<script>alert('Application Successful!')</script>";
                echo "<script>window.open('p_view_application.php?id=".$insert_id."', '_self')</script>";

            }else{
                echo "<script>alert('Application failed! Please Check and try again.')</script>";
            }
    }else{
        echo "<script>alert('Oops! your RRR Code: ".$rrr." has already been used!')</script>";
    }
}

?>
                <legend>Personal Information</legend>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="title" id="floatingSelect" aria-label="Floating label select example" required>
                                <option value="">------ Select ------</option>
                                <option value="Mr.">Mr</option>
                                <option value="Mrs.">Mrs</option>
                                <option value="Ms.">Ms</option>
                                <option value="Miss.">Miss</option>
                                <option value="Dr.">Dr</option>
                                <option value="Prof.">Prof</option>
                            </select>
                            <label for="floatingSelect">Title</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" name="firstname" class="form-control" id="floatingInput" placeholder="First Name" required>
                            <label for="floatingInput">First Name</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="middlename" id="floatingInput" placeholder="Middle Name">
                            <label for="floatingInput">Middle Name (Optional)</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" name="lastname" class="form-control" id="floatingInput" placeholder="Last Name" required>
                            <label for="floatingInput">Last Name</label>
                        </div>  
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="sex" id="floatingSelect" aria-label="Floating label select example" required>
                                <option value="">------ Select ------</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label for="floatingSelect">Sex</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="date" name="dob" class="form-control" id="floatingInput" placeholder="Date of Birth" required>
                            <label for="floatingInput">Date of Birth</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" name="phone" id="phone"  name="phone" pattern="+[0-9]{3} [0-9]{3} [0-9]{3} [0-9]{4}" placeholder="Phone Number" required>
                            <label for="floatingInput phone">Phone Number</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email"  name="email" placeholder="Your Email Address" required>
                            <label for="floatingInput phone">Your Email Address</label>
                        </div>  
                    </div> 
                </div>
            </fieldset>

            <fieldset>
                <legend>Programme Details</legend>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="matric_no" id="text" maxlength="12" placeholder="Matriculation No." required>
                            <label for="floatingInput">Matriculation No.</label>
                        </div> 
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="programme" aria-label="Floating label select example" required>
                                <option value="Select">-- Select --</option>
                                <option value="PGD. Agricultural Extension and Management">PGD. Agricultural Extension and Management</option>
                                <option value="PGD. Business Administration">PGD. Business Administration</option>
                                <option value="PGD. Financial Management">PGD. Financial Management</option>
                                <option value="PGD. HIV/AIDS Education and Management">PGD. HIV/AIDS Education and Management</option>
                                <option value="PGD. Legislative Drafting">PGD. Legislative Drafting.</option>
                                <option value="PGD. Journalism">PGD. Journalism</option>
                                <option value="PGD. Public Administration">PGD. Public Administration</option>
                                <option value="PGD. Christian Religious Studies">PGD. Christian Religious Studies</option>
                                <option value="PGD. Criminology and Security Studies">PGD. Criminology and Security Studies</option>
                                <option value="PGD. Information Technology">PGD. Information Technology</option>
                                <option value="PGD. Peace Studies and Conflict Resolution">PGD. Peace Studies and Conflict Resolution</option>
                                <option value="PGDE. Postgraduate Diploma in Education">PGDE. Postgraduate Diploma in Education</option>
                                <option value="PGD. Mobile Wireless Communication">PGD. Mobile Wireless Communication</option>
                                <option value="PGD. Digital Communication">PGD. Digital Communication</option>
                                <option value="M.A. Christian Religious Studies">M.A. Christian Religious Studies</option>
                                <option value="M.Ed. Guidance and Counselling">M.Ed. Guidance and Counselling</option>
                                <option value="M.Ed. Educational Administration and Planning">M.Ed. Educational Administration and Planning</option>
                                <option value="M.Ed. Educational Technology">M.Ed. Educational Technology</option>
                                <option value="M.Ed. Science Education">M.Ed. Science Education</option>
                                <option value="M.Sc. Information Technology">M.Sc. Information Technology</option>
                                <option value="MBA - Master of Business Administration">MBA - Master of Business Administration</option>
                                <option value="MPA - Master of Public Administration">MPA - Master of Public Administration</option>
                                <option value="M.Sc. Business Administration">M.Sc. Business Administration</option>
                                <option value="M.Sc. Public Administration">M.Sc. Public Administration</option>
                                <option value="M.Sc. Peace Studies and Conflict Resolution">M.Sc. Peace Studies and Conflict Resolution</option>
                                <option value="M.Sc. Mass Communication">M.Sc. Mass Communication</option>
                                <option value="M.Sc. Public Sector Management">M.Sc. Public Sector Management</option>
                                <option value="Ph.D Christian Religious Studies">Ph.D Christian Religious Studies</option>
                                <option value="Ph.D Educational Administration and Planning">Ph.D Educational Administration and Planning</option>
                                <option value="Ph.D Educational Technology">Ph.D Educational Technology</option>
                                <option value="Ph.D Mathematical Education">Ph.D Mathematical Education</option>
                                <option value="Ph.D Science Education">Ph.D Science Education</option>
                            </select>
                            <label for="floatingSelect">Program of Study</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="month" class="form-control" name="date_of_graduation" id="floatingInput bdayMonth" placeholder="Date of Birth" required>
                            <label for="floatingInput bdayMonth">Date of Graduation</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <fieldset>
                            <strong>Have You Applied for Transcript Before?</strong>
                            <div class="form-check form-check-inline form-switch">
                                <input class="form-check-input" type="radio" name="applied_before" role="switch" id="flexSwitchCheckDefault inlineCheckbox1" value="Yes">
                                <label class="form-check-label" for="flexSwitchCheckDefault inlineCheckbox">Yes</label>
                            </div>
                            <div class="form-check form-check-inline form-switch">
                                <input class="form-check-input" type="radio" name="applied_before" role="switch" id="flexSwitchCheckDefault inlineCheckbox1" value="No">
                                <label class="form-check-label" for="flexSwitchCheckChecked inlineCheckbox1">No</label>
                            </div>  
                        </fieldset> 
                    </div>  
                </div>
            </fieldset>
            
            <fieldset>
                <legend>Transcript Destination Detail</legend>
                <div class="row g-2">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="recipient" id="floatingInput" placeholder="Recipient" required>
                            <label for="floatingInput">Recipient</label>
                        </div>  
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="recipient_name" id="floatingInput" placeholder="Recipient Name/Office" required>
                            <label for="floatingInput">Recipient Name/Office</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" name="address" class="form-control" id="floatingInput" placeholder="Address" required>
                            <label for="floatingInput">Address</label>
                        </div>  
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="city_town" class="form-control" id="floatingInput" placeholder="City/Town" required>
                                        <label for="floatingInput">City/Town</label>
                                    </div>  
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="postal_code" class="form-control" id="floatingInput" placeholder="Postal Code">
                                        <label for="floatingInput">Postal Code (Optional)</label>
                                    </div>  
                                </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="country" aria-label="Floating label select example" required>
                                <option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="The Bahamas">The Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cabo Verde">Cabo Verde</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo (DRC)">Congo (DRC)</option><option value="Congo Brazzaville">Congo Brazzaville</option><option value="Costa Rica">Costa Rica</option><option value="Côte d’Ivoire">Côte d’Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Eswatini">Eswatini</option><option value="Ethiopia">Ethiopia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="Gabon">Gabon</option><option value="The Gambia">The Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Greece">Greece</option><option value="Grenada">Grenada</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea, North">Korea, North</option><option value="Korea, South">Korea, South</option><option value="Kosovo">Kosovo</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Micronesia, Federated States of">Micronesia, Federated States of</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar (Burma)">Myanmar (Burma)</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="North Macedonia">North Macedonia</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Sudan, South">Sudan, South</option><option value="Suriname">Suriname</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            <label for="floatingInput phone">Country</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="transcript"  name="transcript_label" placeholder="Transcript Label">
                            <label for="floatingInput phone">Transcript Label (If Applicable)</label>
                        </div>  
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Upload Supporting Documents</legend>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="rrr" id="floatingInput" maxlength="12" placeholder="Remita RRR" required>
                            <label for="floatingInput">Remita RRR</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Remita Receipt</label>
                            <input class="form-control form-control-sm" required type="file" name="file1" id="formFileSm">
                        </div>  
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <div class="row g-2">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Notification of Result/Certificate</label>
                            <input class="form-control form-control-sm" required type="file" name="file2" id="formFileSm">
                        </div> 
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Birth Certificate/Declaration of Age</label>
                            <input class="form-control form-control-sm" required type="file" name="file3" id="formFileSm">
                        </div> 
                    </div> 
                </div>
            </fieldset>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <div class="row g-2">
                <div class="col-md">
                    <div class="mb-3 text-center">
                        <a href="#">
                            <button class='btn btn-outline-success btn' type='submit' name="sub_application">
                                Submit Application &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                </svg> 
                            </button></a>
                    </div> 
                </div>
                <div class="col-md">
                    <div class="mb-3 text-center">
                        <a href="#">
                            <button class='btn btn-outline-danger btn' type='submit'>
                                Cancel Application &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                  </svg> 
                            </button>
                        </a>
                    </div> 
                </div> 
            </div>
        </form>
    </main>
    <footer class="footer" style="background-color:#068a50;">
      <div class="container">
        <span style="color:white;">&copy; <?php echo date("Y");?> NOUN DICT. All Rights Reserved<strong>  |Powered by: NOUN Web Team</strong></span>
      </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<?php 
include('../virus.txt');
?>
</html>