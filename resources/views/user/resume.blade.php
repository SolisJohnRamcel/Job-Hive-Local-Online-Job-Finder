@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row bg-light shadow-sm py-3">
        <div class="col d-flex justify-content-center align-items-center position-relative">
            <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Customize your dream resume</h2>
            <div class="position-absolute end-0 me-3">
                <i class="bi bi-three-dots-vertical display-6" data-bs-toggle="modal" data-bs-target="#dotsModal"></i>
            </div>
        </div>
    </div>


    <!-- Resume Picture Section -->
    <div class="row p-4 justify-content-center">
        @foreach([2, 3, 4] as $index)
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
                    <button type="button" data-bs-toggle="modal" data-bs-target="#customizemodal" class="btn btn-dark">Customize</button>
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
                    <a href="#" class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#reportModal">Report</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-dark" style="background-color: #d7a343;">
                    <h5 class="modal-title" id="reportModalLabel">Submit a Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="reportDescription" class="form-label">Description</label>
                            <textarea id="reportDescription" class="form-control" rows="4" placeholder="Describe the issue or report..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="reportEmail" class="form-label">Your Email</label>
                            <input type="email" id="reportEmail" class="form-control" placeholder="Enter your email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Submit Report</button>
                </div>
            </div>
        </div>
    </div>

    <!-- customize modal  -->
    <div class="modal fade" id="customizemodal" tabindex="-1" aria-labelledby="customizeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-dark" style="background-color: #d7a343;">
                    <h5 class="modal-title" id="reportModalLabel">Customize Resume</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
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
                            <textarea id="formAboutme" class="form-control" rows="4" placeholder="Briefly explain about yourself"></textarea>
                        </div>
                        <h5 class=" mb-0" style="color: #d7a343;"><i class="bi bi-envelope me-2"></i>CONTACTS</h6>
                        <!-- contact infos -->
                        <div class="mb-2">
                            <label for="formContactDetails" class="form-label">Contact</label>
                            <input type="ContactDetails" id="formContactDetails" name="contactdetails" class="form-control" placeholder="Contact Number">
                        </div>
                        <div class="mb-3">
                            <label for="formEmail" class="form-label">Email</label>
                            <input type="Email" id="formEmail" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="formAddress" class="form-label">Address</label>
                            <input type="Address" id="formAddress" name="address" class="form-control" placeholder="Street Address">
                        </div>
                        <h5 class=" mb-0" style="color: #d7a343;"><i class="bi bi-briefcase me-2"></i>EXPERIENCE</h5>
                        <h5 class=" mb-0" style="color: #d7a343;"><i class="bi bi-mortarboard me-2"></i>EDUCATION</h5>
                        <h5 class=" mb-0" style="color: #d7a343;"><i class="bi bi-puzzle me-2"></i>SKILLS</h5>

                        <div class="mb-2">
                            <label for="input_5" class="form-label">Skills</label>
                            <select 
                                class="form-select" 
                                id="input_5" 
                                name="q5_skillLevel" 
                                style="width: 200px;" 
                                required 
                                aria-label="Skill Level">
                                <option value="" selected disabled>Please Select</option>
                                <option value="College Graduate">College Graduate</option>
                                <option value="Career Changer">Career Changer</option>
                                <option value="Inexperienced">Inexperienced</option>
                                <option value="Experienced">Experienced</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Save</button>
                    <button type="button" class="btn btn-dark">Print</button>
                </div>
            </div>
        </div>
    </div>

</div>







<script>
    const imageMapping = {     
        'resume2': 'assets/img/resumeversion2.png',
        'resume3': 'assets/img/resumeversion3.png',
        'resume4': 'assets/img/resumeversion4.png'
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
</script>

@endsection
