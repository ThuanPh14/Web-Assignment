const alternativeInput = document.querySelector("#alternativeInput");
const defaultInput = document.querySelector("#defaultInput");
const avatar = document.querySelector("#avatar");
const imgChangeNoti = document.querySelector("#imgChangeNoti");
alternativeInput.onclick = (e) => defaultInput.click();

const textArea = document.querySelectorAll("textarea");

textArea.forEach((text) => {
	text.onkeyup = (e) => {
		if (text.value.length === 0)
			text.style.height = "30px";
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
}

// show notification when hover on avatar

avatar.addEventListener("mouseenter", function () {
    avatar.style.border = "2px solid #4CAF50"; // Add a border
    avatar.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.3)"; // Add a box shadow
});

avatar.addEventListener("mouseleave", function () {
    avatar.style.border = "none";
    avatar.style.boxShadow = "none";
});


const boxes = document.querySelectorAll('.box');

boxes.forEach(box => {

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
        const controls = this.querySelector('.controls');
        if (controls !== null)
            controls.style.display = controls.style.display === 'none' || controls.style.display === '' ? 'block' : 'none';
    };
});

function addBox(containerId) {
    var boxContainer = document.getElementById(containerId);
    var newBox = document.createElement('div');
    newBox.className = 'box';

    // Similar structure as your initial box
	
    if (containerId === 'certificates-container' || containerId === 'awards-container') {
        newBox.innerHTML = `
            <div class="controls">
                <button class="add-button" onclick="addBox('${containerId}')">Add</button>
                <button class="delete-button" onclick="deleteBox('${containerId}')">Delete</button>
            </div>
            <div class="time">
                <textarea placeholder="Job objective" name=""></textarea>
                <span>_</span>
                <textarea placeholder="Job objective" name=""></textarea>
            </div>
            <div class="description">
                <textarea class="textarea-fullwidth" placeholder="Job objective" name=""></textarea>
            </div>
        `;
    } else {
        newBox.innerHTML = `
            <div class="controls">
                <button class="add-button" onclick="addBox('${containerId}')">Add</button>
                <button class="delete-button" onclick="deleteBox('${containerId}')">Delete</button>
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
        `;
    }
    
    newBox.onclick = function () {
        const controls = this.querySelector('.controls');
        controls.style.display = controls.style.display === 'none' || controls.style.display === '' ? 'block' : 'none';
    };

    boxContainer.appendChild(newBox);
}

function deleteBox(containerId) {
    var boxContainer = document.getElementById(containerId);
    var boxes = boxContainer.getElementsByClassName('box');

    // Check if there is at least one box left before removing
    if (boxes.length > 1) {
        boxContainer.removeChild(boxes[boxes.length - 1]);
        updateButtons(containerId);
    }
}

// function updateButtons(containerId) {
//     var boxContainer = document.getElementById(containerId);
//     var boxes = boxContainer.getElementsByClassName('box');
//     var controls = boxContainer.querySelector('.controls');

//     // Hide buttons if no boxes are present
//     controls.style.display = boxes.length > 0 ? 'block' : 'none';
// }
const project = document.querySelector('.project');

project.onclick = function () {
    const controls = this.querySelector('.controls');
    controls.style.display = controls.style.display === 'none' || controls.style.display === '' ? 'block' : 'none';
};

function addProject() {
    var boxContainer = document.getElementById("project-details");
    var newBox = document.createElement('div');
    newBox.className = 'project';

    newBox.innerHTML= `
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
    `;
    newBox.onclick = function () {
        const controls = this.querySelector('.controls');
        controls.style.display = controls.style.display === 'none' || controls.style.display === '' ? 'block' : 'none';
    };

    boxContainer.appendChild(newBox);
    
    return;
}

function deleteProject() {
    var boxContainer = document.getElementById("project-details");
    var boxes = boxContainer.getElementsByClassName('project');

    // Check if there is at least one box left before removing
    if (boxes.length > 1) {
        boxContainer.removeChild(boxes[boxes.length - 1]);
        updateButtons(containerId);
    }
}

// make controls disappear when click outside
document.onclick = function (e) {
    const boxes = document.querySelectorAll('.box');
    const projects = document.querySelectorAll('.project');
    boxes.forEach(box => {
        const controls = box.querySelector('.controls');
        if (controls !== null && !box.contains(e.target)) {
            controls.style.display = 'none';
        }
    });
    projects.forEach(project => {
        const controls = project.querySelector('.controls');
        if (controls !== null && !project.contains(e.target)) {
            controls.style.display = 'none';
        }
    });
}
