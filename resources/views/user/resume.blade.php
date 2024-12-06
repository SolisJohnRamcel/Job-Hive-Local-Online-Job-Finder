@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row bg-light shadow-sm py-3">
        <div class="col d-flex justify-content-center align-items-center position-relative">
            <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Create your resume</h2>
        </div>
    </div>


    <!-- Resume Picture Section -->
    <div class="row p-4 justify-content-center">
        @foreach([2] as $index)
        <div class="col-sm-6 col-md-3 text-center mb-4">
            <button id="resume{{ $index }}" data-bs-toggle="modal" data-bs-target="#myModal" class="border-0 bg-transparent p-0">
                <img src="assets/img/resumeversion{{ $index }}.png" class="img-fluid rounded shadow-sm hover-scale" alt="Resume Image {{ $index }}">
            </button>
        </div>
        @endforeach
    </div>

    <!-- Resume Preview Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-dark" style="background-color: #d7a343;">
                    <h5 class="modal-title" id="myModalLabel">Resume Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modal-img" src="" class="img-fluid d-none" alt="Resume Image">
                    <div id="file-input-container" class="d-none">
                        <input type="file" id="resumeUpload" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#customizemodal" class="btn btn-dark">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Options Modal -->
    <div class="modal fade" id="dotsModal" tabindex="-1" aria-labelledby="dotsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-dark" style="background-color: #d7a343;">
                    <h5 class="modal-title" id="dotsModalLabel">Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a href="{{route('saved_resume')}}" class="btn btn-dark w-100 mb-2">Saved Resume</a>

                </div>
            </div>
        </div>
    </div>


    <!-- customize modal  -->
    
    <div class="modal fade" id="customizemodal" tabindex="-1" aria-labelledby="customizeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-dark" style="background-color: #d7a343;">
                    <h5 class="modal-title" id="reportModalLabel">Create Resume</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #F5F5F5;">
                    <form action="{{ route('generate.resume') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- profile image -->
                        <div class="mb-2">
                            <label for="ResumeProfileImage" class="form-label">Upload Profile Image</label>
                            <input type="file" class="form-control" id="ResumeProfileImage" name="resumeprofileimage" accept="image/*">
                        </div>
                        <!-- user name -->
                        <div class="mb-3">
                            <label for="formResumeName" class="form-label">Name</label>
                            <div class="d-flex gap-2">
                                <input type="text" id="formResumeFirstName" name="resumefirstname" class="form-control" placeholder="First name">
                                <input type="text" id="formResumeLastName" name="resumelastname" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formAboutme" class="form-label">About me</label>
                            <textarea id="formAboutme" name="formAboutme" class="form-control" rows="4" placeholder="Briefly explain about yourself"></textarea>
                        </div>

                        <!-- contact section -->
                        <h5 class=" mb-0" ><i class="bi bi-envelope me-2"></i>CONTACTS</h6>
                        <!-- contact infos -->
                        <div class="mb-2">
                            <label for="formContactDetails" class="form-label">Contact</label>
                            <input type="ContactDetails" id="formContactDetails" name="contactdetails" class="form-control" placeholder="Contact Number">
                        </div>
                        <div class="mb-3">
                            <label for="formEmail" class="form-label">Email</label>
                            <input type="Email" id="formEmail" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <label for="formAddress" class="form-label">Address</label>
                            <input type="Address" id="formAddress" name="address" class="form-control" placeholder="Street Address">
                        </div>

                        <!-- experience section -->
                        <h5 class="mb-2"><i class="bi bi-briefcase me-2 "></i>EMPLOYMENT HISTORY</h5>
                        <div id="employment-section"></div>
                        <button id="add-employment" type="button" class="btn fw-bold text-success mb-5">
                            <i class="bi bi-plus me-2 "></i>Add employment
                        </button>

                        <!-- education section -->
                        <h5 class="mb-2" ><i class="bi bi-mortarboard me-2 "></i>EDUCATION</h5>
                        <div id="education-section"></div>
                        <button id="add-education" type="button" class="btn fw-bold text-success mb-5">
                            <i class="bi bi-plus me-2 "></i>Add education
                        </button>



                        <!-- skills section -->
                        <h5 class="mb-2"><i class="bi bi-puzzle me-2 "></i>SKILLS</h5>
                        <div id="skill-section"></div>
                        <button id="add-skills" type="button" class="btn fw-bold text-success mb-5">
                            <i class="bi bi-plus me-2 "></i>Add skills
                        </button>
                 
                  
                </div>
                <div class="modal-footer" style="background-color: #F5F5F5;">
                      <button type="submit" class="btn btn-dark">Generate Resume</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>





<!-- ADD WORK EXPERIENCE FORM -->
<div id="employment-template" class="d-none" style="background-color:white;">
    <div class="employment-entry border p-3 mb-3 rounded-3">
        <div class="mb-2">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label fw-bold">(Not specified)</label>
                <button type="button" class="btn btn-sm toggle-details" data-expanded="true">
                <i class="bi bi-chevron-up"></i>
                </button>
            </div>
        </div>

        <!-- Details Section -->
        <div class="details-section">
            <div class="mb-2">
                <label class="form-label">Job Title</label>
                <input type="text" name="employment[][jobTitle]" class="form-control job-title" placeholder="Job Title">
            </div>
            <div class="mb-2">
                <label class="form-label">Company</label>
                <input type="text" name="employment[][company]" class="form-control" placeholder="Company">
            </div>
            <div class="mb-2">
                <label class="form-label">Start & End Date</label>
                <div class="d-flex gap-2">
                    <input type="month" name="employment[][startDate]" class="form-control" placeholder="MM/YYYY">
                    <input type="month" name="employment[][endDate]" class="form-control" placeholder="MM/YYYY">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="employment[][description]" rows="3" placeholder="Describe your role..."></textarea>
            </div>
        </div>
        <button type="button" class="btn remove-entry text-danger"><i class="bi bi-trash-fill me-2"></i>Remove</button>
    </div>
</div>

<!-- ADD SCHOOL FORM -->
<div id="education-template" class="d-none" style="background-color:white;">
    <div class="education-entry border p-3 mb-3">
        <div class="mb-2">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label fw-bold">(Not specified)</label>
                <button type="button" class="btn btn-sm toggle-education-details" data-expanded="true">
                <i class="bi bi-chevron-up"></i>
                </button>
            </div>
        </div>
    

        <!-- Details Section -->
        <div class="education-details-section">
            <div class="mb-2">
                <label class="form-label">School</label>
                <input type="text" name="education[][school]" class="form-control school-name" placeholder="School">
            </div>
            <div class="mb-2">
                <label class="form-label">Degree</label>
                <input type="text" name="education[][degree]" class="form-control" placeholder="Degree">
            </div>
            <div class="mb-2">
                <label class="form-label">Start & End Date</label>
                <div class="d-flex gap-2">
                    <input type="month" name="education[][startDate]" class="form-control" placeholder="MM/YYYY">
                    <input type="month" name="education[][endDate]" class="form-control" placeholder="MM/YYYY">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">City</label>
                <input type="text" name="education[][location]" class="form-control" placeholder="City">
            </div>
            <div class="mb-2">
                <label class="form-label">Description</label>
                <textarea  name="education[][description]" class="form-control" rows="3" placeholder="Brief description"></textarea>
            </div>
        </div>
        <button type="button" class="btn remove-entry text-danger"><i class="bi bi-trash-fill me-2"></i>Remove</button>
    </div>
</div>

<!-- ADD SKILLS FORM -->
<div id="skills-template" class="d-none" style="background-color:white;">
    <div class="skills-entry border p-3 mb-3">
        <div class="mb-2">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label fw-bold">(Not specified)</label>
                <button type="button" class="btn btn-sm toggle-skills-details" data-expanded="true">
                <i class="bi bi-chevron-up"></i>
                </button>
            </div>
        </div>
    

        <!-- Details Section -->
        <div class="skill-details-section">
            <div class="mb-2">
                <label class="form-label">Skill</label>
                <input type="text" name="skills[]" class="form-control skill-name" placeholder="Skill">
            </div>
        </div>
        <button type="button" class="btn remove-entry text-danger"><i class="bi bi-trash-fill me-2"></i>Remove</button>
</div>





<script>
    const imageMapping = {     
        'resume2': 'assets/img/resumeversion2.png',
    };

    const myModal = document.getElementById('myModal');
    myModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const buttonId = button.id;
        const modalImage = document.getElementById('modal-img');
        const fileInputContainer = document.getElementById('file-input-container');

        if (buttonId === 'resume0') {
            modalImage.classList.add('d-none');
            fileInputContainer.classList.remove('d-none');
            document.getElementById('modal-action-btn').textContent = "OK";
        } else {
            modalImage.classList.remove('d-none');
            fileInputContainer.classList.add('d-none');
            modalImage.src = imageMapping[buttonId];
            document.getElementById('modal-action-btn').textContent = "Customize";
        }
    });

    myModal.addEventListener('hidden.bs.modal', function () {
        document.getElementById('modal-img').src = '';
        document.getElementById('modal-img').classList.add('d-none');
        document.getElementById('file-input-container').classList.add('d-none');
        document.getElementById('modal-action-btn').textContent = "Customize";
    });







    

    // add work exp,education

    // Add Employment Form
    document.getElementById("add-employment").addEventListener("click", function () {
        const template = document.getElementById("employment-template").cloneNode(true);
        template.id = ""; // Remove the ID
        template.classList.remove("d-none");
        document.getElementById("employment-section").appendChild(template);
    });

    // Toggle Details Visibility
    document.addEventListener("click", function (e) {
        if (e.target.closest(".toggle-details")) {
            const button = e.target.closest(".toggle-details");
            const detailsSection = button.closest(".employment-entry").querySelector(".details-section");
            const isExpanded = button.getAttribute("data-expanded") === "true";

            if (isExpanded) {
                // Collapse details
                detailsSection.style.display = "none";
                button.innerHTML = '<i class="bi bi-chevron-down"></i>';
                button.setAttribute("data-expanded", "false");
            } else {
                // Expand details
                detailsSection.style.display = "block";
                button.innerHTML = '<i class="bi bi-chevron-up"></i>';
                button.setAttribute("data-expanded", "true");
            }
        }
    });
    // Update Employment Title dynamically
    document.addEventListener("input", function (e) {
        if (e.target.classList.contains("job-title")) {
            const jobTitleInput = e.target.value.trim();
            const label = e.target.closest(".employment-entry").querySelector(".form-label.fw-bold");
            label.textContent = jobTitleInput || "(Not specified)";
        }
    });

    // Remove Entry
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-entry")) {
            e.target.closest(".employment-entry").remove();
        }
    });



    // Add Education Form
    document.getElementById("add-education").addEventListener("click", function () {
        const template = document.getElementById("education-template").cloneNode(true);
        template.id = ""; // Remove the ID
        template.classList.remove("d-none");
        document.getElementById("education-section").appendChild(template);
    });

    // Toggle Education Details Visibility
    document.addEventListener("click", function (e) {
        if (e.target.closest(".toggle-education-details")) {
            const button = e.target.closest(".toggle-education-details");
            const detailsSection = button.closest(".education-entry").querySelector(".education-details-section");
            const isExpanded = button.getAttribute("data-expanded") === "true";

            if (isExpanded) {
                // Collapse details
                detailsSection.style.display = "none";
                button.innerHTML = '<i class="bi bi-chevron-down"></i>';
                button.setAttribute("data-expanded", "false");
            } else {
                // Expand details
                detailsSection.style.display = "block";
                button.innerHTML = '<i class="bi bi-chevron-up"></i>';
                button.setAttribute("data-expanded", "true");
            }
        }
    });
    // Update Education School Name dynamically
    document.addEventListener("input", function (e) {
        if (e.target.classList.contains("school-name")) {
            const schoolNameInput = e.target.value.trim();
            const label = e.target.closest(".education-entry").querySelector(".form-label.fw-bold");
            label.textContent = schoolNameInput || "(Not specified)";
        }
    });
    // Remove Entry
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-entry")) {
            e.target.closest(".employment-entry, .education-entry").remove();
        }
    });




    // Add Skills Form
    document.getElementById("add-skills").addEventListener("click", function () {
        const template = document.getElementById("skills-template").cloneNode(true);
        template.id = ""; // Remove the ID
        template.classList.remove("d-none");
        document.getElementById("skill-section").appendChild(template);
    });

    // Toggle Skills Details Visibility
    document.addEventListener("click", function (e) {
        if (e.target.closest(".toggle-skills-details")) {
            const button = e.target.closest(".toggle-skills-details");
            const detailsSection = button.closest(".skills-entry").querySelector(".skill-details-section");
            const isExpanded = button.getAttribute("data-expanded") === "true";

            if (isExpanded) {
                // Collapse details
                detailsSection.style.display = "none";
                button.innerHTML = '<i class="bi bi-chevron-down"></i>';
                button.setAttribute("data-expanded", "false");
            } else {
                // Expand details
                detailsSection.style.display = "block";
                button.innerHTML = '<i class="bi bi-chevron-up"></i>';
                button.setAttribute("data-expanded", "true");
            }
        }
    });
    // Update Skills Name dynamically
    document.addEventListener("input", function (e) {
        if (e.target.classList.contains("skill-name")) {
            const schoolNameInput = e.target.value.trim();
            const label = e.target.closest(".skills-entry").querySelector(".form-label.fw-bold");
            label.textContent = schoolNameInput || "(Not specified)";
        }
    });
    // Remove Entry
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-entry")) {
            e.target.closest(".employment-entry, .education-entry, .skills-entry").remove();
        }
    });


</script>

@endsection
