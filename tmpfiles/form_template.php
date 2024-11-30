<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <section class="header">
            <div class="personalInfo">
                <div class="profileImg">
                    <input id="defaultInput" type="file" name="file" id="file" hidden />
                    <button id="alternativeInput" type="button">
                        <img src="assets/profile.png" alt="Profile image" id="avatar" />
                    </button>
                </div>

                <div class="information">
                    <div class="header">
                        <h1>Name</h1>
                        <p>Vi tri ung tuyen</p>
                    </div>

                    <div class="infoLines">
                        <div class="box">
                            <div class="left">
                                <p>Ngay sinh:</p>
                            </div>
                            <div class="right">
                                <input type="text" placeholder="20/11/2023" name="" id="" />
                            </div>
                        </div>

                        <div class="box">
                            <div class="left">
                                <p>Gioi tinh:</p>
                            </div>
                            <div class="right">
                                <input type="text" placeholder="Nam/Nu" name="" id="" />
                            </div>
                        </div>

                        <div class="box">
                            <div class="left">
                                <p>So dien thoai:</p>
                            </div>
                            <div class="right">
                                <input type="tel" placeholder="0909888777" name="" id="" />
                            </div>
                        </div>

                        <div class="box">
                            <div class="left">
                                <p>Email:</p>
                            </div>
                            <div class="right">
                                <input type="email" placeholder="abc@gmail.com" name="" id="" />
                            </div>
                        </div>

                        <div class="box">
                            <div class="left">
                                <p>Dia chi</p>
                            </div>
                            <div class="right">
                                <textarea class="textarea-fullwidth" name="" id="" placeholder="117-119 Lý Chính Thắng, Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body">
            <div class="objective">
                <div class="title">
                    <h4>MỤC TIÊU NGHỀ NGHIỆP</h4>
                    <hr />
                </div>

                <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
            </div>

            <div class="education">
                <div class="title">
                    <h4>HỌC VẤN</h4>
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
                            <textarea placeholder="Job objective" name=""></textarea>
                            <span>_</span>
                            <textarea placeholder="Job objective" name=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="experiences">
                <div class="title">
                    <h4>KINH NGHIỆM LÀM VIỆC</h4>
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
                            <textarea placeholder="Job objective" name="" id=""></textarea>
                            <span>_</span>
                            <textarea placeholder="Job objective" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="activities">
                <div class="title">
                    <h4>HOẠT ĐỘNG</h4>
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
                            <textarea placeholder="Job objective" name=""></textarea>
                            <span>_</span>
                            <textarea placeholder="Job objective" name=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name=""></textarea>
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="certificates">
                <div class="title">
                    <h4>CHỨNG CHỈ</h4>
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
                            <textarea placeholder="Job objective" name="" id=""></textarea>
                            <span>_</span>
                            <textarea placeholder="Job objective" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="awards">
                <div class="title">
                    <h4>DANH HIỆU VÀ GIẢI THƯỞNG</h4>
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
                            <textarea placeholder="Job objective" name="" id=""></textarea>
                            <span>_</span>
                            <textarea placeholder="Job objective" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skills">
                <div class="title">
                    <h4>KỸ NĂNG</h4>
                    <hr />
                </div>

                <div class="box-container" id="skills-container">
                    <!-- Initial box -->
                    <div class="box">
                        <div class="controls">
                            <button onclick="addBox('skills-container')">Add</button>
                            <button onclick="deleteBox('skills-container')">Delete</button>
                        </div>
                        <div class="time">
                            <textarea placeholder="Job objective" name="" id=""></textarea>
                            <span>_</span>
                            <textarea placeholder="Job objective" name="" id=""></textarea>
                        </div>
                        <div class="description">
                            <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hobbies">
                <div class="title">
                    <h4>SỞ THÍCH</h4>
                    <hr />
                </div>

                <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
            </div>
            <div class="misc">
                <div class="title">
                    <h4>THÔNG TIN THÊM</h4>
                    <hr />
                </div>
                <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
            </div>
            <div class="Reference">
                <div class="title">
                    <h4>NGƯỜI GIỚI THIỆU</h4>
                    <hr />
                </div>
                <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>
            </div>
            <div class="projects">
                <div class="title">
                    <h4>DỰ ÁN</h4>
                    <hr />
                </div>
                <div class="box-container" id="project-details">
                    <div class="project">
                        <div class="controls">
                            <button onclick="addProject()">Add</button>
                            <button onclick="deleteProject()">Delete</button>
                        </div>
                        <textarea class="textarea-fullwidth" placeholder="Job objective" name="" id=""></textarea>

                        <div class="box">
                            <div class="time">
                                <textarea placeholder="Job objective" name="" id=""></textarea>
                                <span>_</span>
                                <textarea placeholder="Job objective" name="" id=""></textarea>
                            </div>
                            <div class="description"></div>
                        </div>
                        <div class="table">
                            <div class="table-row">
                                <div class="header-cell">
                                    <textarea placeholder="Khach hang" name="" id=""></textarea>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Ten khach hang" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row">
                                <div class="header-cell">
                                    <textarea placeholder="Khach hang" name="" id=""></textarea>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Ten khach hang" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row">
                                <div class="header-cell">
                                    <textarea placeholder="Khach hang" name="" id=""></textarea>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Ten khach hang" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row">
                                <div class="header-cell">
                                    <textarea placeholder="Khach hang" name="" id=""></textarea>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Ten khach hang" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="table-row">
                                <div class="header-cell">
                                    <textarea placeholder="Khach hang" name="" id=""></textarea>
                                </div>
                                <div class="info-cell">
                                    <textarea class="textarea-fullwidth" placeholder="Ten khach hang" name="" id=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="index.js"></script>
</body>

</html>