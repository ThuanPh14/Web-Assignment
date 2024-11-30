<?php
if (isset($data['INVALID_CV'])) {
    echo '<div id="errorMessageCVName" style="padding-left: 3rem; padding-top: 5%; font-size: 2rem;">' . 'CV NOT FOUND' . '</div>';
    return;
}

$cv_data = json_decode($data['cv_data'], true);
$personalInfo = $cv_data['personalInfo'];
$education = $cv_data['education'];
$experiences = $cv_data['experiences'];
$activities = $cv_data['activities'];
$certificates = $cv_data['certificates'];
$awards = $cv_data['awards'];
$skills = $cv_data['skills'];
$projects = $cv_data['projects'];
$sharing_option = $data['is_public_to_everyone'];
$allowed_users = $data['allowed_users'];
?>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="successfulToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="fas fa-check fa-lg" style="color: #1bee6c;"></i>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Update successfully.
    </div>
  </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="failedToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="fas fa-times fa-lg" style="color: #ff2929;"></i>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Update failed.
    </div>
  </div>
</div>


<div class="nav-container">
    <div class="cv-name-input">
        <input type="text" id="cvName" name="cvName" placeholder="CV Name" value="<?= $cv_data['cvName'] ?>" required>
        <div id="errorMessageCVName" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
    </div>
    <div class="features">
        <button type="button" id="updateBtn">Update</button>
        <input type="text" id="cv_id" value="<?= $data['cv_id'] ?>" hidden>
    </div>
</div>

<div class="container p-1">
    
    <div class="container" id="CV" style="position: relative!important;">
        <section class="header">
            <div class="personalInfo">
                <div class="profileImg">
                    <input id="defaultInput" type="file" accept=".png, .jpg, .jpeg" name="file" id="file" hidden />
                    <button id="alternativeInput" type="button">
                        <img src="<?php echo (isset($data['image']) ? $data['image'] : '/CV-Template/public/assets/profile.png'); ?>" alt="Profile image" id="avatar" />
                    </button>
                </div>

                <div class="information">

                    <div class="header">
                        <div class="right">
                            <input type="text" id="nameInput" placeholder="Full Name" value="<?= $personalInfo['name'] ?> " required>
                            <div id="errorMessageName" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                        </div>
                        <div class="right">
                            <input type="text" id="positionInput" placeholder="Position" value="<?php echo strlen(trim($personalInfo['position'])) == 0 ? "" : $personalInfo['position']; ?>">
                        </div>
                    </div>

                    <div class="infoLines">
                        <div class="box">
                            <div class="left">
                                <p>Birthdate:</p>
                            </div>
                            <div class="right">
                                <input type="text" placeholder="20/11/2023" name="birthDate" id="birthDate" value="<?= $personalInfo['birthDate'] ?>" required />
                                <div id="errorMessageBirthDate" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="left">
                                <p>Gender:</p>
                            </div>
                            <div class="right">
                                <input type="text" placeholder="Male/Female" name="gender" id="gender" value="<?= $personalInfo['gender'] ?>" required />
                                <div id="errorMessageGender" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                            </div>
                        </div>
                        <div id="tel-container">
                            <?php
                            foreach ($personalInfo['telNumber'] as $value) {
                                echo '<div class="box">';
                                echo '<div class="controls">';
                                echo '<button onclick="addBox(\'tel-container\')">Add</button>';
                                echo '<button onclick="deleteBox(\'tel-container\')">Delete</button>';
                                echo '</div>';
                                echo '<div class="left">';
                                if ($value === $personalInfo['telNumber'][0]) echo '<p>Phone Number:</p>';
                                echo '</div>';
                                echo '<div class="right">';
                                echo '<input type="tel" placeholder="0123456789" name="tel" id="tel" value="' . $value . '" required />';
                                echo '<div id="errorMessageTel" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div id="email-container">
                            <?php
                            foreach ($personalInfo['email'] as $value) {
                                echo '<div class="box">';
                                echo '<div class="controls">';
                                echo '<button onclick="addBox(\'email-container\')">Add</button>';
                                echo '<button onclick="deleteBox(\'email-container\')">Delete</button>';
                                echo '</div>';
                                echo '<div class="left">';
                                if ($value === $personalInfo['email'][0]) echo '<p>Email:</p>';
                                echo '</div>';
                                echo '<div class="right">';
                                echo '<input type="email" placeholder="abc@gmail.com" name="email" id="email" value="' . $value . '" required />';
                                echo '<div id="errorMessageEmail" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div id="address-container">
                            <?php
                            foreach ($personalInfo['address'] as $value) {
                                echo '<div class="box">';
                                echo '<div class="controls">';
                                echo '<button onclick="addBox(\'address-container\')">Add</button>';
                                echo '<button onclick="deleteBox(\'address-container\')">Delete</button>';
                                echo '</div>';
                                echo '<div class="left">';
                                if ($value === $personalInfo['address'][0]) echo '<p>Address:</p>';
                                echo '</div>';
                                echo '<div class="right">';
                                echo '<textarea class="textarea-fullwidth" name="address" id="address" placeholder="117-119 Lý Chính Thắng, Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh" required>' . $value . '</textarea>';
                                echo '<div id="errorMessageAddress" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body">
            <div class="objective">
                <div class="title">
                    <h4>CAREER OBJECTIVES</h4>
                    <hr />
                </div>

                <textarea class="textarea-fullwidth" placeholder="Your job goal, short-term, and long-term objectives" value="<?= $cv_data['objective'] ?>" name="" id=""></textarea>

            </div>

            <div class="education">
                <div class="title">
                    <h4>EDUCATIONS</h4>
                    <hr />
                </div>
                <div class="box-container" id="education-container">
                    <!-- Initial box -->
                    <?php
                    foreach ($education as $value) {
                        echo '<div class="box">';
                        echo '<div class="controls">';
                        echo '<button onclick="addBox(\'education-container\')">Add</button>';
                        echo '<button onclick="deleteBox(\'education-container\')">Delete</button>';
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea placeholder="From" name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '<span>_</span>';
                        echo '<textarea placeholder="To" name="" id="">' . $value['time'][1] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea class="textarea-fullwidth" placeholder="School name">' . $value['description'][0] . '</textarea>';
                        echo '<textarea class="textarea-fullwidth" placeholder="Profession/Courses">' . $value['description'][1] . '</textarea>';
                        echo '<textarea class="textarea-fullwidth" placeholder="Process and Achievements">' . $value['description'][2] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>

            <div class="experiences">
                <div class="title">
                    <h4>EXPERIENCE</h4>
                    <hr />
                </div>
                <div class="box-container" id="experiences-container">
                    <!-- Initial box -->
                    <?php
                    foreach ($experiences as $value) {
                        echo '<div class="box">';
                        echo '<div class="controls">';
                        echo '<button onclick="addBox(\'experiences-container\')">Add</button>';
                        echo '<button onclick="deleteBox(\'experiences-container\')">Delete</button>';
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea placeholder="From" name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '<span>_</span>';
                        echo '<textarea placeholder="To" name="" id="">' . $value['time'][1] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Company name">' . $value['description'][0] . '</textarea>';
                        echo '<textarea class="textarea-fullwidth" placeholder="Your job position">' . $value['description'][1] . '</textarea>';
                        echo '<textarea class="textarea-fullwidth" placeholder="Experience description">' . $value['description'][2] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="activities">
                <div class="title">
                    <h4>ACTIVITIES</h4>
                    <hr />
                </div>

                <div class="box-container" id="activities-container">
                    <!-- Initial box -->
                    <?php
                    foreach ($activities as $value) {
                        echo '<div class="box">';
                        echo '<div class="controls">';
                        echo '<button onclick="addBox(\'activities-container\')">Add</button>';
                        echo '<button onclick="deleteBox(\'activities-container\')">Delete</button>';
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea placeholder="From" name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '<span>_</span>';
                        echo '<textarea placeholder="To" name="" id="">' . $value['time'][1] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Organization name">' . $value['description'][0] . '</textarea>';
                        echo '<textarea class="textarea-fullwidth" placeholder="Your position">' . $value['description'][1] . '</textarea>';
                        echo '<textarea class="textarea-fullwidth" placeholder="Activity description">' . $value['description'][2] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="certificates">
                <div class="title">
                    <h4>CERTIFICATES</h4>
                    <hr />
                </div>

                <div class="box-container" id="certificates-container">
                    <!-- Initial box -->
                    <?php
                    foreach ($certificates as $value) {
                        echo '<div class="box">';
                        echo '<div class="controls">';
                        echo '<button onclick="addBox(\'certificates-container\')">Add</button>';
                        echo '<button onclick="deleteBox(\'certificates-container\')">Delete</button>';
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea placeholder="Time" name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Certificate name">' . $value['description'][0] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="awards">
                <div class="title">
                    <h4>HONORS AND AWARDS</h4>
                    <hr />
                </div>

                <div class="box-container" id="awards-container">
                    <!-- Initial box -->
                    <?php
                    foreach ($awards as $value) {
                        echo '<div class="box">';
                        echo '<div class="controls">';
                        echo '<button onclick="addBox(\'awards-container\')">Add</button>';
                        echo '<button onclick="deleteBox(\'awards-container\')">Delete</button>';
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea placeholder="Time" name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Award name">' . $value['description'][0] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="skills">
                <div class="title">
                    <h4>SKILLS</h4>
                    <hr />
                </div>

                <div class="box-container" id="skills-container">
                    <!-- Initial box -->
                    <?php
                    foreach ($skills as $value) {
                        echo '<div class="box">';
                        echo '<div class="controls">';
                        echo '<button onclick="addBox(\'skills-container\')">Add</button>';
                        echo '<button onclick="deleteBox(\'skills-container\')">Delete</button>';
                        echo '</div>';

                        echo '<div class="skill-name">';
                        echo '<textarea placeholder="Skill name" name="" id="">' . $value['name'] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Skill description">' . $value['description'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="hobbies">
                <div class="title">
                    <h4>HOBBIES</h4>
                    <hr />
                </div>

                <textarea class="textarea-fullwidth" placeholder="Your hobbies" name="" id=""><?= $cv_data['hobbies'] ?></textarea>
            </div>
            <div class="misc">
                <div class="title">
                    <h4>ADDITIONAL INFORMATION</h4>
                    <hr />
                </div>
                <textarea class="textarea-fullwidth" placeholder="Additional information (if exist)" name="" id=""><?= $cv_data['misc'] ?></textarea>
            </div>
            <div class="projects">
                <div class="title">
                    <h4>PROJECTS</h4>
                    <hr />
                </div>
                <div class="box-container" id="project-details">
                    <?php
                    foreach ($projects as $value) {
                        echo '<div class="project">';
                        echo '<div class="controls">';
                        echo '<button onclick="addProject()">Add</button>';
                        echo '<button onclick="deleteProject()">Delete</button>';
                        echo '</div>';

                        echo '<textarea class="textarea-fullwidth" placeholder="Project name" name="" id="">' . $value['title'] . '</textarea>';
                        echo '<div class="box">';
                        echo '<div class="time">';
                        echo '<textarea placeholder="From" name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '<span>_</span>';
                        echo '<textarea placeholder="To" name="" id="">' . $value['time'][1] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description"></div>';
                        echo '</div>';
                        echo '<div class="table">';
                        echo '<div class="table-row" id="project-customer">';
                        echo '<div class="header-cell">';
                        echo '<span> Customer </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Name" name="" id="">' . $value['tableData']['Customer'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-description">';
                        echo '<div class="header-cell">';
                        echo '<span> Description </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Description" name="" id="">' . $value['tableData']['Description'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-members">';
                        echo '<div class="header-cell">';
                        echo '<span> Members </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Number of members" name="" id="">' . $value['tableData']['Members'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-position">';
                        echo '<div class="header-cell">';
                        echo '<span> Position </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Position" name="" id="">' . $value['tableData']['Position'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-responsibilities">';
                        echo '<div class="header-cell">';
                        echo '<span> Responsibilities </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Description" name="" id="">' . $value['tableData']['Responsibilities'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-technologies">';
                        echo '<div class="header-cell">';
                        echo '<span> Technologies </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea class="textarea-fullwidth" placeholder="Description" name="" id="">' . $value['tableData']['Technologies'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <br>
        </section>
    </div>
</div>

<br>
<br>
<script src="/CV-Template/public/scripts/index.js"></script>
<script>// Call setup when the document is loaded
document.addEventListener('DOMContentLoaded', setupTimeValidation);
document.addEventListener('DOMContentLoaded', setupBirthDateValidation);
// Add validation to new time inputs when boxes are added
const originalAddBox = window.addBox;
window.addBox = function(containerId) {
    originalAddBox(containerId);
    setupTimeValidation();
};
</script>
