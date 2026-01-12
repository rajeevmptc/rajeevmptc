/*This file contains JavaScript functions for various operations */

/********************************************************************************************/
function toggleForm() {
	const login = document.getElementById('login-form');
        const reg = document.getElementById('register-form');
        login.style.display = login.style.display === 'none' ? 'block' : 'none';
        reg.style.display = reg.style.display === 'none' ? 'block' : 'none';
}
/********************************************************************************************/

/********************************************************************************************/
function toggleSubmenu(id) {
        const allSubmenus = document.querySelectorAll('.submenu');
        allSubmenus.forEach(sub => {
            	if(sub.id !== id) sub.classList.remove('show');
        });

        const element = document.getElementById(id);
        element.classList.toggle('show');
}
/********************************************************************************************/

/********************************************************************************************/
window.onclick = function(event) {
        if (!event.target.matches('.menu-link')) {
            	const dropdowns = document.getElementsByClassName("submenu");
            	for (let i = 0; i < dropdowns.length; i++) {
                	dropdowns[i].classList.remove('show');
            	}
        }
}
/********************************************************************************************/
function fetchStudent() {
 	const regno = document.getElementById('regno').value;
    	const container = document.getElementById('result-container');

    	if (!regno) {
        	alert("Please enter a registration number");
        	return;
    	}

    	const formData = new FormData();
    	formData.append('regno', regno);

    	fetch('fetchstud.php', {
        	method: 'POST',
        	body: formData
    	})
    	
    	.then(response => {
        	if (!response.ok) {
            		throw new Error('Network response was not ok');
        	}
        		return response.json();
    		})
    	
    	.then(data => {
        	container.classList.remove('hidden');
        	const rawDate = new Date(data.dob);
		const formattedDOB = rawDate.toLocaleDateString('en-GB');
        	if (data.error) {
            		container.innerHTML = `<p style="color:red; text-align:center; padding: 20px;">${data.error}</p>`;
        	} 
        	else {
            		container.innerHTML = `
                		<div class="student-header">
                    			<h2 style="margin:0; color:#4a90e2;">${data.name}</h2>
                    			<small>Reg No: ${data.regno} | ${data.branch}</small>
                		</div>
                		
                		<div class="grid-container">
                    			<div class="info-item"><label>Semester</label><span>${data.semester}</span></div>
				    	<div class="info-item"><label>Gender</label><span>${data.gender}</span></div>
				    	<div class="info-item"><label>DOB</label><span>${data.dob}</span></div>
				    	<div class="info-item"><label>Nationality</label><span>${data.nationality}</span></div>
				    	<div class="info-item"><label>Blood Group</label><span>${data.bloodgroup}</span></div>
				    	<div class="info-item"><label>Email</label><span>${data.email}</span></div>
				    	<div class="info-item"><label>Mobile</label><span>${data.mobile}</span></div>
				    	<div class="info-item"><label>Father's Name</label><span>${data.fathername}</span></div>
				    	<div class="info-item"><label>Mother's Name</label><span>${data.mothername}</span></div>
				    	<div class="info-item" style="grid-column: span 2;">
						<label>Address</label><span>${data.address}</span>
                    			</div>
                		</div>
                		
                		<div class="button-footer">
                    			<button class="home-btn" onclick="window.location.href='menu.php'">Return Home</button>
                		</div>
            		`;
        	}
    	})
    	.catch(error => {
        	console.error('Error:', error);
        	container.innerHTML = `<p style="color:red; text-align:center;">Failed to fetch data. Check console for details.</p>`;
        	container.classList.remove('hidden');
    	});
}


