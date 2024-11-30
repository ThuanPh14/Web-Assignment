<?php

?>
<div class="nav-container">
    <div class="cv-name-input">
        <input type="text" id="cvName" name="cvName" placeholder="CV Name" required>
        <div id="errorMessageCVName" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
    </div>
    <div class="features">
        <button type="button" id="saveBtn">Save</button>
        <button type="button" id="loadBtn" hidden>Load</button>
    </div>
</div>
<div class="container p-1">
    <div class="container" id="CV">
        <section class="header">
            <div class="personalInfo">
                <div class="profileImg">
                    <input id="defaultInput" type="file" accept=".png, .jpg, .jpeg" name="file" id="file" hidden />
                    <button id="alternativeInput" type="button">
                        <img src="/CV-Template/public/assets/profile.png" alt="Profile image" id="avatar" />
                    </button>
                </div>

                <div class="information">
                    <div class="header">
                        <div class="right">
                            <input type="text" id="nameInput" placeholder="Full Name" required>
                            <div id="errorMessageName" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                        </div>
                        <div class="right">
                            <input type="text" id="positionInput" placeholder="Position" required>
                            <div id="errorMessagePosition" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                        </div>
                    </div>

                    <div class="infoLines">
                        <div class="box">
                            <div class="left">
                                <p>Birthdate:</p>
                            </div>
                            <div class="right">
                                <input type="text" placeholder="01/12/2024" name="birthDate" id="birthDate" required/>
                                <div id="errorMessageBirthDate" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="left">
                                <p>Gender:</p>
                            </div>
                            <div class="right">
                                <input type="text" placeholder="Male/Female" name="gender" id="gender" required/>
                                <div id="errorMessageGender" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                            </div>
                        </div>
                        <div id="tel-container">
                            <div class="box">
                                <div class="controls">
                                    <button onclick="addBox('tel-container')">Add</button>
                                    <button onclick="deleteBox('tel-container')">Delete</button>
                                </div>
                                <div class="left">
                                    <p>Phone Number:</p>
                                </div>
                                <div class="right">
                                    <input type="tel" placeholder="0123456789" name="telNumber" id="telNumber" required/>
                                    <div id="errorMessageTel" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                                </div>
                            </div>
                        </div>
                        <div id="email-container">
                            <div class="box">
                                <div class="controls">
                                    <button onclick="addBox('email-container')">Add</button>
                                    <button onclick="deleteBox('email-container')">Delete</button>
                                </div>
                                <div class="left">
                                    <p>Email:</p>
                                </div>
                                <div class="right">
                                    <input type="email" placeholder="abc@gmail.com" name="email" id="email" required/>
                                    <div id="errorMessageEmail" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                                </div>
                            </div>
                        </div>
                        <div id="address-container">
                            <div class="box">
                                <div class="controls">
                                    <button onclick="addBox('address-container')">Add</button>
                                    <button onclick="deleteBox('address-container')">Delete</button>
                                </div>
                                <div class="left">
                                    <p>Address</p>
                                </div>
                                <div class="right">
                                    <textarea class="textarea-fullwidth" name="address" id="address" placeholder="268 Ly Thuong Kiet Street, Ward 14, District 10, Ho Chi Minh City, Vietnam" required></textarea>
                                    <div id="errorMessageAddress" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
                                </div>
                            </div>
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

                <textarea class="textarea-fullwidth" placeholder="Your job goal, short-term, and long-term objectives" name="" id=""></textarea>
                
            </div>

            <div class="education">
                <div class="title">
                    <h4>EDUCATIONS</h4>
                    <hr />
                </div>
                <div class="box-container" id="education-container">
                    <!-- Initial box -->
                    <div class="box">
                        <div class="controls">
                            <button onclick="addBox('education-container')">Add</button>
                            <button onclick="deleteBox('education-container')">Delete</button>
                        </div>
                        <div class="time">
                            <textarea placeholder="From" name="" id=""></textarea>
                            <span>_</span>
                            <textarea placeholder="To" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="School name" name=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Profession/Courses" name=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Process and Achievements" name=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="experiences">
                <div class="title">
                    <h4>EXPERIENCE</h4>
                    <hr />
                </div>
                <div class="box-container" id="experiences-container">
                    <!-- Initial box -->
                    <div class="box">
                        <div class="controls">
                            <button onclick="addBox('experiences-container')">Add</button>
                            <button onclick="deleteBox('experiences-container')">Delete</button>
                        </div>
                        <div class="time">
                            <textarea placeholder="From" name="" id=""></textarea>
                            <span>_</span>
                            <textarea placeholder="To" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Company name" name="" id=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Your job position" name="" id=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Experience description" name="" id=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="activities">
                <div class="title">
                    <h4>ACTIVITIES</h4>
                    <hr />
                </div>

                <div class="box-container" id="activities-container">
                    <!-- Initial box -->
                    <div class="box">
                        <div class="controls">
                            <button onclick="addBox('activities-container')">Add</button>
                            <button onclick="deleteBox('activities-container')">Delete</button>
                        </div>
                        <div class="time">
                            <textarea placeholder="From" name="" id=""></textarea>
                            <span>_</span>
                            <textarea placeholder="To" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Organization name" name=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Your position" name=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Activity description" name=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="certificates">
                <div class="title">
                    <h4>CERTIFICATES</h4>
                    <hr />
                </div>

                <div class="box-container" id="certificates-container">
                    <!-- Initial box -->
                    <div class="box">
                        <div class="controls">
                            <button onclick="addBox('certificates-container')">Add</button>
                            <button onclick="deleteBox('certificates-container')">Delete</button>
                        </div>
                        <div class="time">
                            <textarea placeholder="Time" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Certificate name" name="" id=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="awards">
                <div class="title">
                    <h4>HONORS AND AWARDS</h4>
                    <hr />
                </div>

                <div class="box-container" id="awards-container">
                    <!-- Initial box -->
                    <div class="box">
                        <div class="controls">
                            <button onclick="addBox('awards-container')">Add</button>
                            <button onclick="deleteBox('awards-container')">Delete</button>
                        </div>
                        <div class="time">
                            <textarea placeholder="Time" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Award name" name="" id=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skills">
                <div class="title">
                    <h4>SKILLS</h4>
                    <hr />
                </div>

                <div class="box-container" id="skills-container">
                    <!-- Initial box -->
                    <div class="box">
                        <div class="controls">
                            <button onclick="addBox('skills-container')">Add</button>
                            <button onclick="deleteBox('skills-container')">Delete</button>
                        </div>
                        <div class="skill-name">
                            <textarea placeholder="Skill name" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Skill description" name="" id=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hobbies">
                <div class="title">
                    <h4>HOBBIES</h4>
                    <hr />
                </div>

                <textarea class="textarea-fullwidth" placeholder="Your hobbies" name="" id=""></textarea>
            </div>
            <div class="misc">
                <div class="title">
                    <h4>ADDITIONAL INFORMATION</h4>
                    <hr />
                </div>
                <textarea class="textarea-fullwidth" placeholder="Additional information (if exist)" name="" id=""></textarea>
            </div>
            <div class="projects">
                <div class="title">
                    <h4>PROJECTS</h4>
                    <hr />
                </div>
                <div class="box-container" id="project-details">
                    <div class="project">
                        <div class="controls">
                            <button onclick="addProject()">Add</button>
                            <button onclick="deleteProject()">Delete</button>
                        </div>
                        <textarea class="textarea-fullwidth" placeholder="Project name" name="" id=""></textarea>

                        <div class="box">
                            <div class="time">
                                <textarea placeholder="From" name="" id=""></textarea>
                                <span>_</span>
                                <textarea placeholder="To" name="" id=""></textarea>
                            </div>
                            <div class="description"></div>
                        </div>
                        <div class="table p-0">
                            <div class="table-row" id="project-customer">
                                <div class="header-cell">
                                    <span> Customer </span>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Name" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row" id="project-description">
                                <div class="header-cell">
                                <span> Description </span>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Description" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row" id="project-members">
                                <div class="header-cell">
                                    <span> Members </span>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Number of members" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row" id="project-position">
                                <div class="header-cell">
                                    <span> Position </span>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Position" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row" id="project-responsibilities">
                                <div class="header-cell">
                                    <span> Responsibilities </span>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Description" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row" id="project-technologies">
                                <div class="header-cell">
                                    <span> Technologies </span>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Description" name="" id=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </section>
    </div>
</div>
<br>
<br>
<script src="/CV-Template/public/scripts/index.js"></script>
<script>
// Call setup when the document is loaded
document.addEventListener('DOMContentLoaded', setupTimeValidation);
document.addEventListener('DOMContentLoaded', setupBirthDateValidation);
// Add validation to new time inputs when boxes are added
const originalAddBox = window.addBox;
window.addBox = function(containerId) {
    originalAddBox(containerId);
    setupTimeValidation();
};
</script>
