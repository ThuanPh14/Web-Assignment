const toastElList = [].slice.call(document.querySelectorAll('.toast'))
console.log(document.querySelectorAll('.toast'));
const toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl, "delay", 5000);
})
console.log(toastList);
const myToastEl = document.getElementById('successfulToast');
console.log(myToastEl);
const myToast = bootstrap.Toast.getInstance(myToastEl);
const myToastEl2 = document.getElementById('failedToast');
const myToast2 = bootstrap.Toast.getInstance(myToastEl2);

const alternativeInput = document.querySelector("#alternativeInput");
const defaultInput = document.querySelector("#defaultInput");
const avatar = document.querySelector("#avatar");
const imgChangeNoti = document.querySelector("#imgChangeNoti");
// Thuan add two buttons
const saveBtn = document.querySelector("#saveBtn");
const updateBtn = document.querySelector("#updateBtn");
const loadBtn = document.querySelector("#loadBtn");
//--------------
alternativeInput.onclick = (e) => defaultInput.click();

const textArea = document.querySelectorAll("textarea");

textArea.forEach((text) => {
	text.onkeyup = (e) => {
		if (text.value.length === 0) text.style.height = "30px";
		let scrHeight = e.target.scrollHeight;
		text.style.height = `${scrHeight}px`;
	};
});

// update avatar for the input image
defaultInput.onchange = (e) => {
	const file = e.target.files[0];
	const reader = new FileReader();
	reader.readAsDataURL(file);
	reader.onloadend = () => {
		avatar.src = reader.result;
	};
};

// show notification when hover on avatar

avatar.addEventListener("mouseenter", function () {
	avatar.style.border = "2px solid #4CAF50"; // Add a border
	avatar.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.3)"; // Add a box shadow
});

avatar.addEventListener("mouseleave", function () {
	avatar.style.border = "none";
	avatar.style.boxShadow = "none";
});

const boxes = document.querySelectorAll(".box");

boxes.forEach((box) => {
	// box.onfocus = function () {
	//     box.style.border = '2px solid #ccc';
	//     const controls = this.querySelector('.controls');
	//     controls.style.display = 'block';
	// }

	// box.onblur= function () {
	//     box.style.border = "none";
	//     const controls = this.querySelector('.controls');
	//     controls.style.display = 'none';
	// }

	box.onclick = function () {
		const controls = this.querySelector(".controls");
		if (controls !== null) controls.style.display = "block"; //= controls.style.display === "none" || controls.style.display === "" ? "block" : "none";
	};
});

function addBox(containerId) {
	var boxContainer = document.getElementById(containerId);
	var newBox = document.createElement("div");
	newBox.className = "box";

	// Similar structure as your initial box
	if (containerId === "tel-container") {
		newBox.innerHTML = `
            <div class="controls">
                <button onclick="addBox('tel-container')">Add</button>
                <button onclick="deleteBox('tel-container')">Delete</button>
            </div>
            <div class="left">
            </div>
            <div class="right">
                <input type="tel" placeholder="0909888777" name="telNumber" id="telNumber" required/>
                <div id="errorMessageTel" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
            </div>
        `;
	} else if (containerId === "email-container") {
		newBox.innerHTML = `
            <div class="controls">
                <button onclick="addBox('email-container')">Add</button>
                <button onclick="deleteBox('email-container')">Delete</button>
            </div>
            <div class="left">
            </div>
            <div class="right">
                <input type="email" placeholder="abc@gmail.com" name="email" id="email" required/>
                <div id="errorMessageEmail" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
            </div>
        `;
	} else if (containerId === "address-container") {
		newBox.innerHTML = `
            <div class="controls">
                <button onclick="addBox('address-container')">Add</button>
                <button onclick="deleteBox('address-container')">Delete</button>
            </div>
            <div class="left">
            </div>
            <div class="right">
                <textarea class="textarea-fullwidth" name="address" id="address" placeholder="268 Ly Thuong Kiet Street, Ward 14, District 10, Ho Chi Minh City, Vietnam" required></textarea>
                <div id="errorMessageAddress" style="padding: 0.2rem; color: red; font-size: 0.75rem;"></div>
            </div>
        `;
	} else if (containerId === "education-container") {
		newBox.innerHTML = `
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
        `;
	} else if (containerId === "experiences-container") {
		newBox.innerHTML = `
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
        `;
	} else if (containerId === "activities-container") {
		newBox.innerHTML = `
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
        `;
	} else if (containerId === "certificates-container") {
		newBox.innerHTML = `
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
        `;
	} else if (containerId === "awards-container") {
		newBox.innerHTML = `
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
        `;
	} else if (containerId === "skills-container") {
		newBox.innerHTML = `
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
        `;
	}

	newBox.onclick = function () {
		const controls = this.querySelector(".controls");
		controls.style.display = "block"; //controls.style.display === "none" || controls.style.display === "" ? "block" : "none";
	};

	boxContainer.appendChild(newBox);
}

function deleteBox(containerId) {
	var boxContainer = document.getElementById(containerId);
	var boxes = boxContainer.getElementsByClassName("box");

	// Check if there is at least one box left before removing
	if (boxes.length > 1) {
		boxContainer.removeChild(boxes[boxes.length - 1]);
	}
}

// function updateButtons(containerId) {
//     var boxContainer = document.getElementById(containerId);
//     var boxes = boxContainer.getElementsByClassName('box');
//     var controls = boxContainer.querySelector('.controls');

//     // Hide buttons if no boxes are present
//     controls.style.display = boxes.length > 0 ? 'block' : 'none';
// }
const projects = document.querySelectorAll(".project");
projects.forEach((project) => {
	project.onclick = function () {
		const controls = this.querySelector(".controls");
		controls.style.display = "block"; //controls.style.display === "none" || controls.style.display === "" ? "block" : "none";
	};
});

function addProject() {
	var boxContainer = document.getElementById("project-details");
	var newBox = document.createElement("div");
	newBox.className = "project";

	newBox.innerHTML = `
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
        <div class="table">
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
    `;
	newBox.onclick = function () {
		const controls = this.querySelector(".controls");
		controls.style.display = "block"; //controls.style.display === "none" || controls.style.display === "" ? "block" : "none";
	};

	boxContainer.appendChild(newBox);

	return;
}

function deleteProject() {
	var boxContainer = document.getElementById("project-details");
	var boxes = boxContainer.getElementsByClassName("project");

	// Check if there is at least one box left before removing
	if (boxes.length > 1) {
		boxContainer.removeChild(boxes[boxes.length - 1]);
	}
}

// make controls disappear when click outside
document.onclick = function (e) {
	const boxes = document.querySelectorAll(".box");
	const projects = document.querySelectorAll(".project");
	boxes.forEach((box) => {
		const controls = box.querySelector(".controls");
		if (controls !== null && !box.contains(e.target)) {
			controls.style.display = "none";
		}
	});
	projects.forEach((project) => {
		const controls = project.querySelector(".controls");
		if (controls !== null && !project.contains(e.target)) {
			controls.style.display = "none";
		}
	});
};

//Thuan adds event handler for two buttons: save and load
//on click save button
if (saveBtn != null)
	saveBtn.onclick = (e) => {
		console.log("here")
		if (!checkPersonalInfoValidity()) {
			return;
		}
		// Define the URL of the server endpoint
		// Create the data object you want to send
		// const data = {
		// 	key1: "value1",
		// 	key2: "value2",
		// };

		// // Get all input and textarea elements
		// const inputElements = document.querySelectorAll('input, textarea');

		// // Iterate through each element and add its value to the data object
		// inputElements.forEach(function (element) {
		// 	// Check if the element has an ID and is not the file input

		// 	if (element.id && element.type !== 'file') {
		// 		// Add the element's value to the data object using its ID as the key
		// 		data[element.id] = element.value;

		// 	}
		// });
		const data = extractFormData();
		console.log(data);

		// Use fetch API to make the POST request
		fetch("/CV-Template/public/mycv/saveCreateCV", {
			method: "POST", // Specify the method
			headers: {
				// Specify any needed headers. This is how you tell the server you're sending JSON.
				"Content-Type": "application/json",
			},
			body: JSON.stringify(data), // Convert the JavaScript object to a JSON string
		})
			.then((response) => {
				// The server responds with the data in JSON format, parse it to create a JavaScript object
				if (!response.ok) {
					// If the response has HTTP status code which is not successful, throw an error
					throw new Error("Network response was not ok " + response.statusText);
				}
				return response.text(); // parses JSON response into native JavaScript objects
			})
			.then((data) => {
				// Handle the response data
				console.log("Success post:", );
				const json = JSON.parse(data);
				const id = json.cvID;
				const updateImage_URL = `/CV-Template/public/mycv/uploadImage/${id}`;

				const fileInput = document.getElementById("defaultInput");
				const imageName = fileInput.src;

				if (fileInput.files.length > 0 && imageName != "/CV-Template/public/assets/profile.png") {
					const formData = new FormData();
					formData.append("file", fileInput.files[0]);

					fetch(updateImage_URL, {
						method: "POST",
						body: formData,
					})
						.then((response) => response.text())
						.then((data) => {
							console.log("Success post:", JSON.parse(data));
							// myToast.show();
							window.location.href = '/CV-Template/public/mycv/edit_cv/' + id;
						})
						.catch((error) => {
							console.error("Error:", error);
							// myToast.show();
						});
				}
				else window.location.href = '/CV-Template/public/mycv/edit_cv/' + id;

			})
			.catch((error) => {
				// Handle any errors here
				console.error("Error:", error);
			});
	};

if (updateBtn != null)
	updateBtn.onclick = (e) => {
		if (!checkPersonalInfoValidity()) {
			return;
		}

		const data = extractFormData();
		const id = document.querySelector("#cv_id").value;
		const updateJSON_URL = `/CV-Template/public/mycv/saveEditCV/${id}`;
		const updateImage_URL = `/CV-Template/public/mycv/uploadImage/${id}`;

		// Use fetch API to make the POST request
		fetch(updateJSON_URL, {
			method: "POST", // Specify the method
			headers: {
				// Specify any needed headers. This is how you tell the server you're sending JSON.
				"Content-Type": "application/json",
			},
			body: JSON.stringify(data), // Convert the JavaScript object to a JSON string
		})
			.then((response) => {
				// The server responds with the data in JSON format, parse it to create a JavaScript object
				if (!response.ok) {
					// If the response has HTTP status code which is not successful, throw an error
					throw new Error("Network response was not ok " + response.statusText);
				}
				return response.text(); // parses JSON response into native JavaScript objects
			})
			.then((data) => {
				// Handle the response data
				console.log("Success post:", JSON.parse(data));

				const fileInput = document.getElementById("defaultInput");
				const imageName = fileInput.src;

				if (fileInput.files.length > 0 && imageName != "/CV-Template/public/assets/profile.png") {
					const formData = new FormData();
					formData.append("file", fileInput.files[0]);

					fetch(updateImage_URL, {
						method: "POST",
						body: formData,
					})
						.then((response) => response.text())
						.then((data) => {
							console.log("Success post:", JSON.parse(data));
							myToast.show();
						})
						.catch((error) => {
							console.error("Error:", error);
						});
					
				}
				else myToast.show();
			})
			.catch((error) => {
				// Handle any errors here
				console.error("Error:", error);
				myToast2.show();
			});

		//////////////////////////
	};

function checkPersonalInfoValidity() {
	// Check the validity of each personal info input
	const cvNameValid = document.getElementById("cvName").checkValidity();
	let isValid = true;
	if (!cvNameValid) {
		document.getElementById("errorMessageCVName").textContent = "Please fill into this field";
		document.getElementById("cvName").style.border = "1px solid red";
		document.getElementById("cvName").onclick = function () {
			document.getElementById("cvName").style.border = "none";
		};
		isValid = false;
	}
	const nameValid = document.getElementById("nameInput").checkValidity();
	if (!nameValid) {
		document.getElementById("errorMessageName").textContent = "Please fill into this field";
		document.getElementById("nameInput").style.border = "1px solid red";
		document.getElementById("nameInput").onclick = function () {
			document.getElementById("nameInput").style.border = "none";
		};
		isValid = false;
	}
	const positionValid = document.getElementById('positionInput').checkValidity();
	if (!positionValid) {
		document.getElementById("errorMessagePosition").textContent = "Please fill into this field";
		document.getElementById("positionInput").style.border = "1px solid red";
		document.getElementById("positionInput").onclick = function () {
			document.getElementById("positionInput").style.border = "none";
		};
		isValid = false;
	}
	const birthDateValid = document.getElementById("birthDate").checkValidity();
	if (!birthDateValid) {
		document.getElementById("errorMessageBirthDate").textContent = "Please fill into this field";
		document.getElementById("birthDate").style.border = "1px solid red";
		document.getElementById("birthDate").onclick = function () {
			document.getElementById("birthDate").style.border = "none";
		};
		isValid = false;
	}
	const genderValid = document.getElementById("gender").checkValidity();
	if (!genderValid) {
		document.getElementById("errorMessageGender").textContent = "Please fill into this field";
		document.getElementById("gender").style.border = "1px solid red";
		document.getElementById("gender").onclick = function () {
			document.getElementById("gender").style.border = "none";
		};
		isValid = false;
	}
	const telNumberBoxes = document.querySelectorAll("#tel-container .box");
	telNumberBoxes.forEach((telNumberBox) => {
		const telNumber = telNumberBox.querySelector("input");
		const telNumberValid = telNumber.checkValidity();
		if (!telNumberValid) {
			telNumberBox.querySelector("#errorMessageTel").textContent = "Please fill into this field";
			telNumber.style.border = "1px solid red";
			telNumber.onclick = function () {
				telNumber.style.border = "none";
			};
			isValid = false;
		}
	});

	const emailBoxes = document.querySelectorAll("#email-container .box");
	emailBoxes.forEach((emailBox) => {
		const email = emailBox.querySelector("input");
		const emailValid = email.checkValidity();
		if (!emailValid) {
			emailBox.querySelector("#errorMessageEmail").textContent = "Please fill into this field";
			email.style.border = "1px solid red";
			email.onclick = function () {
				email.style.border = "none";
			};
			isValid = false;
		}
	});

	const addressBoxes = document.querySelectorAll("#address-container .box");
	addressBoxes.forEach((addressBox) => {
		const address = addressBox.querySelector("#address");
		if (!address.checkValidity() || address.value.trim().length === 0) {
			addressBox.querySelector("#errorMessageAddress").textContent = "Please fill into this field";
			address.style.border = "1px solid red";
			address.onclick = function () {
				address.style.border = "none";
			};

			if (address.value.trim().length === 0) {
				address.value = "";
			}

			isValid = false;
		}
	});

	return isValid;
}

function extractFormData() {
	const data = {
		cvName: document.getElementById("cvName").value,
		personalInfo: extractPersonalInfo(),
		objective: document.querySelector(".objective textarea").value,
		education: extractSectionData("education-container"),
		experiences: extractSectionData("experiences-container"),
		activities: extractSectionData("activities-container"),
		certificates: extractSectionData("certificates-container"),
		awards: extractSectionData("awards-container"),
		skills: extractSkillsData(),
		hobbies: document.querySelector(".hobbies textarea").value,
		misc: document.querySelector(".misc textarea").value,
		projects: extractProjectData(),
	};

	// Perform further actions with the extracted data as needed
	return data;
}

function extractPersonalInfo() {
	const personalInfo = {
		name: document.getElementById("nameInput").value,
		position: document.getElementById("positionInput").value,
		birthDate: document.getElementById("birthDate").value,
		gender: document.getElementById("gender").value,
		telNumber: extractMultiPersonalData("tel-container"),
		email: extractMultiPersonalData("email-container"),
		address: extractMultiPersonalData("address-container"),
	};

	return personalInfo;
}

function extractMultiPersonalData(containerId) {
	const container = document.getElementById(containerId);
	const boxes = container.querySelectorAll(".box");
	const multiPersonalData = [];

	boxes.forEach((box) => {
		const input = box.querySelector("input, textarea").value;
		multiPersonalData.push(input);
	});

	return multiPersonalData;
}

function extractSectionData(containerId) {
	const container = document.getElementById(containerId);
	const boxes = container.querySelectorAll(".box");
	const sectionData = [];

	boxes.forEach((box) => {
		const timeFields = box.querySelectorAll(".time textarea");
		const descriptionFields = box.querySelectorAll(".description textarea");

		const entry = {
			time: Array.from(timeFields).map((field) => field.value),
			description: Array.from(descriptionFields).map((field) => field.value),
		};

		sectionData.push(entry);
	});

	return sectionData;
}

function extractSkillsData() {
	const container = document.getElementById("skills-container");
	const boxes = container.querySelectorAll(".box");
	const skillsData = [];

	boxes.forEach((box) => {
		const skillName = box.querySelector(".skill-name textarea").value;
		const description = box.querySelector(".description textarea").value;

		const skillEntry = {
			name: skillName,
			description: description,
		};

		skillsData.push(skillEntry);
	});

	return skillsData;
}

function extractProjectData() {
	const projectContainer = document.getElementById("project-details");
	const projectBoxes = projectContainer.querySelectorAll(".project");
	const projects = [];

	projectBoxes.forEach((projectBox) => {
		const projectTitle = projectBox.querySelectorAll("textarea")[0].value;
		const timeFields = projectBox.querySelectorAll(".time textarea");

		const projectData = {
			title: projectTitle,
			time: Array.from(timeFields).map((field) => field.value),
			tableData: {},
		};

		// Iterate over each table row and extract data
		const rows = projectBox.querySelectorAll(".table-row");
		rows.forEach((row) => {
			const headerCell = row.querySelector(".header-cell");
			const infoCell = row.querySelector(".info-cell textarea");

			// Use the content of the header cell as the key in tableData
			const header = headerCell.innerText.trim();
			// Use the content of the info cell as the value in tableData
			const info = infoCell.value;

			// Assign key-value pair to tableData
			projectData.tableData[header] = info;
		});

		projects.push(projectData);
	});

	return projects;
}
function validateTimeInput(input) {
    // Remove any leading/trailing whitespace
    const value = input.value.trim();
    
    // Regular expressions for different date formats
    const yearRegex = /^\d{4}$/;  // e.g., 2024
    const monthYearRegex = /^(0?[1-9]|1[0-2])\/\d{4}$/;  // e.g., 3/2024 or 03/2024
    const fullDateRegex = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;  // e.g., 15/03/2024 or 15/3/2024
    
    // Check if the input matches any of the allowed formats
    if (yearRegex.test(value)) {
        const year = parseInt(value);
        const currentYear = new Date().getFullYear();
        
        if (year < 1900 || year > currentYear + 10) {
            return {
                isValid: false,
                message: `Year must be between 1900 and ${currentYear + 10}`
            };
        }
        return { isValid: true, message: '' };
    }
    
    if (monthYearRegex.test(value)) {
        const [month, year] = value.split('/').map(num => parseInt(num));
        const currentYear = new Date().getFullYear();
        
        if (year < 1900 || year > currentYear + 10) {
            return {
                isValid: false,
                message: `Year must be between 1900 and ${currentYear + 10}`
            };
        }
        return { isValid: true, message: '' };
    }
    
    if (fullDateRegex.test(value)) {
        const [day, month, year] = value.split('/').map(num => parseInt(num));
        const currentYear = new Date().getFullYear();
        
        if (year < 1900 || year > currentYear + 10) {
            return {
                isValid: false,
                message: `Year must be between 1900 and ${currentYear + 10}`
            };
        }
        
        // Check if the date is valid (e.g., not 31/02/2024)
        const date = new Date(year, month - 1, day);
        if (date.getDate() !== day || date.getMonth() !== month - 1 || date.getFullYear() !== year) {
            return {
                isValid: false,
                message: 'Invalid date'
            };
        }
        
        return { isValid: true, message: '' };
    }
    
    return {
        isValid: false,
        message: 'Use format: YYYY or MM/YYYY or DD/MM/YYYY'
    };
}

// Function to add validation to all time inputs
function setupTimeValidation() {
    const timeInputs = document.querySelectorAll('.time textarea');
    
    timeInputs.forEach(input => {
        // Create error message element if it doesn't exist
        let errorDiv = input.nextElementSibling;
        if (!errorDiv || !errorDiv.classList.contains('error-message')) {
            errorDiv = document.createElement('div');
            errorDiv.classList.add('error-message');
            errorDiv.style.color = 'red';
            errorDiv.style.fontSize = '0.75rem';
            errorDiv.style.padding = '0.2rem';
            input.parentNode.insertBefore(errorDiv, input.nextSibling);
        }
        
        // Variable to store timeout
        let errorTimeout;
        
        // Add validation on blur
        input.addEventListener('blur', function() {
            // Clear any existing timeout
            if (errorTimeout) {
                clearTimeout(errorTimeout);
            }
            
            const result = validateTimeInput(this);
            if (!result.isValid) {
                errorDiv.textContent = result.message;
                this.style.borderColor = 'red';
                
                // Set timeout to clear error message after 3 seconds
                errorTimeout = setTimeout(() => {
                    errorDiv.textContent = '';
                    // Keep the red border to indicate there's still an error
                }, 3000);
            } else {
                errorDiv.textContent = '';
                this.style.borderColor = '';
            }
        });
        
        // Clear error on focus
        input.addEventListener('focus', function() {
            // Clear any existing timeout
            if (errorTimeout) {
                clearTimeout(errorTimeout);
            }
            errorDiv.textContent = '';
            this.style.borderColor = '';
        });
    });
}
function validateBirthDate(input) {
    // Remove any leading/trailing whitespace
    const value = input.value.trim();
    
    // Regular expression for DD/MM/YYYY format
    const birthDateRegex = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;
    
    if (!birthDateRegex.test(value)) {
        return {
            isValid: false,
            message: 'Use format: DD/MM/YYYY (e.g., 01/12/2000)'
        };
    }
    
    const [day, month, year] = value.split('/').map(num => parseInt(num));
    const currentYear = new Date().getFullYear();
    
    // Check if year is reasonable (between 1900 and current year)
    if (year < 1900 || year > currentYear) {
        return {
            isValid: false,
            message: `Year must be between 1900 and ${currentYear}`
        };
    }
    
    // Check if the date is valid (e.g., not 31/02/2000)
    const date = new Date(year, month - 1, day);
    if (date.getDate() !== day || date.getMonth() !== month - 1 || date.getFullYear() !== year) {
        return {
            isValid: false,
            message: 'Invalid date'
        };
    }
    
    // Check if the date is not in the future
    if (date > new Date()) {
        return {
            isValid: false,
            message: 'Birth date cannot be in the future'
        };
    }
    
    // Check if age is reasonable (less than 120 years)
    const age = (new Date()).getFullYear() - year;
    if (age > 120) {
        return {
            isValid: false,
            message: 'Please enter a valid birth date'
        };
    }
    
    return { isValid: true, message: '' };
}

function setupBirthDateValidation() {
    const birthDateInput = document.getElementById('birthDate');
    const errorDiv = document.getElementById('errorMessageBirthDate');
    let errorTimeout;

    if (birthDateInput && errorDiv) {
        birthDateInput.addEventListener('blur', function() {
            // Clear any existing timeout
            if (errorTimeout) {
                clearTimeout(errorTimeout);
            }
            
            const result = validateBirthDate(this);
            if (!result.isValid) {
                errorDiv.textContent = result.message;
                this.style.borderColor = 'red';
                
                // Set timeout to clear error message after 3 seconds
                errorTimeout = setTimeout(() => {
                    errorDiv.textContent = '';
                    // Keep the red border to indicate there's still an error
                }, 3000);
            } else {
                errorDiv.textContent = '';
                this.style.borderColor = '';
            }
        });
        
        birthDateInput.addEventListener('focus', function() {
            // Clear any existing timeout
            if (errorTimeout) {
                clearTimeout(errorTimeout);
            }
            errorDiv.textContent = '';
            this.style.borderColor = '';
        });
    }
}