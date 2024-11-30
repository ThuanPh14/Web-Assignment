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
?>

<style>
    input:disabled, 
textarea:disabled {
    background-color: #ffffff!important; /* Light gray background */
}
</style>
<div class="container p-1">
    <div class="container" id="CV">
        <section class="header">
            <div class="personalInfo">
                <div class="profileImg">
                    <input id="defaultInput" type="file" accept=".png, .jpg, .jpeg" name="file" id="file" hidden />
                    
                        <img src="<?php echo (isset($data['image']) ? $data['image'] : '/CV-Template/public/assets/profile.png'); ?>" alt="Profile image" id="avatar" />
                    
                </div>

                <div class="information">

                    <div class="header">
                        <div class="right">
                            <input disabled type="text" id="nameInput"  value="<?= $personalInfo['name'] ?> " required>
                            <div id="errorMessageName" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                        </div>
                        <div class="right">
                            <input disabled type="text" id="positionInput"  value="<?php echo strlen(trim($personalInfo['position'])) == 0 ? "" : $personalInfo['position']; ?>">
                        </div>
                    </div>

                    <div class="infoLines">
                        <div class="box">
                            <div class="left">
                                <p>Birthdate:</p>
                            </div>
                            <div class="right">
                                <input disabled type="text"  name="birthDate" id="birthDate" value="<?= $personalInfo['birthDate'] ?>" required />
                                <div id="errorMessageBirthDate" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="left">
                                <p>Gender:</p>
                            </div>
                            <div class="right">
                                <input disabled type="text"  name="gender" id="gender" value="<?= $personalInfo['gender'] ?>" required />
                                <div id="errorMessageGender" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                            </div>
                        </div>
                        <div id="tel-container">
                            <?php
                            foreach ($personalInfo['telNumber'] as $value) {
                                echo '<div class="box">';
                                echo '<div class="controls">';
                                echo '</div>';
                                echo '<div class="left">';
                                if ($value === $personalInfo['telNumber'][0]) echo '<p>Phone Number:</p>';
                                echo '</div>';
                                echo '<div class="right">';
                                echo '<input disabled type="tel"  name="tel" id="tel" value="' . $value . '" required />';
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
                                echo '</div>';
                                echo '<div class="left">';
                                if ($value === $personalInfo['email'][0]) echo '<p>Email:</p>';
                                echo '</div>';
                                echo '<div class="right">';
                                echo '<input disabled type="email"  name="email" id="email" value="' . $value . '" required />';
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
                                echo '</div>';
                                echo '<div class="left">';
                                if ($value === $personalInfo['address'][0]) echo '<p>Address:</p>';
                                echo '</div>';
                                echo '<div class="right">';
                                echo '<textarea disabled disabled class="textarea-fullwidth" name="address" id="address"  required>' . $value . '</textarea>';
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

                <textarea disabled class="textarea-fullwidth"  value="<?= $cv_data['objective'] ?>" name="" id=""></textarea>

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
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea disabled  name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '<span>_</span>';
                        echo '<textarea disabled  name="" id="">' . $value['time'][1] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][0] . '</textarea>';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][1] . '</textarea>';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][2] . '</textarea>';
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
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea disabled  name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '<span>_</span>';
                        echo '<textarea disabled  name="" id="">' . $value['time'][1] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][0] . '</textarea>';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][1] . '</textarea>';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][2] . '</textarea>';
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
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea disabled  name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '<span>_</span>';
                        echo '<textarea disabled  name="" id="">' . $value['time'][1] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][0] . '</textarea>';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][1] . '</textarea>';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][2] . '</textarea>';
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
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea disabled  name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][0] . '</textarea>';
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
                        echo '</div>';

                        echo '<div class="time">';
                        echo '<textarea disabled  name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'][0] . '</textarea>';
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
                        echo '</div>';

                        echo '<div class="skill-name">';
                        echo '<textarea disabled  name="" id="">' . $value['name'] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<textarea disabled class="textarea-fullwidth" >' . $value['description'] . '</textarea>';
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

                <textarea disabled class="textarea-fullwidth"  name="" id=""><?= $cv_data['hobbies'] ?></textarea>
            </div>
            <div class="misc">
                <div class="title">
                    <h4>ADDITIONAL INFORMATION</h4>
                    <hr />
                </div>
                <textarea disabled class="textarea-fullwidth"  name="" id=""><?= $cv_data['misc'] ?></textarea>
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
                        echo '</div>';

                        echo '<textarea disabled class="textarea-fullwidth"  name="" id="">' . $value['title'] . '</textarea>';
                        echo '<div class="box">';
                        echo '<div class="time">';
                        echo '<textarea disabled  name="" id="">' . $value['time'][0] . '</textarea>';
                        echo '<span>_</span>';
                        echo '<textarea disabled  name="" id="">' . $value['time'][1] . '</textarea>';
                        echo '</div>';
                        echo '<div class="description"></div>';
                        echo '</div>';
                        echo '<div class="table">';
                        echo '<div class="table-row" id="project-customer">';
                        echo '<div class="header-cell">';
                        echo '<span> Customer </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea disabled class="textarea-fullwidth"  name="" id="">' . $value['tableData']['Customer'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-description">';
                        echo '<div class="header-cell">';
                        echo '<span> Description </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea disabled class="textarea-fullwidth"  name="" id="">' . $value['tableData']['Description'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-members">';
                        echo '<div class="header-cell">';
                        echo '<span> Members </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea disabled class="textarea-fullwidth"  name="" id="">' . $value['tableData']['Members'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-position">';
                        echo '<div class="header-cell">';
                        echo '<span> Position </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea disabled class="textarea-fullwidth"  name="" id="">' . $value['tableData']['Position'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-responsibilities">';
                        echo '<div class="header-cell">';
                        echo '<span> Responsibilities </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea disabled class="textarea-fullwidth"  name="" id="">' . $value['tableData']['Responsibilities'] . '</textarea>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="table-row" id="project-technologies">';
                        echo '<div class="header-cell">';
                        echo '<span> Technologies </span>';
                        echo '</div>';
                        echo '<div class="info-cell">';
                        echo '<textarea disabled class="textarea-fullwidth"  name="" id="">' . $value['tableData']['Technologies'] . '</textarea>';
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