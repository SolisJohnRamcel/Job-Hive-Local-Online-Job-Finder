@extends('layouts.app')

@section('content')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 w-100 shadow-sm">
        <div class="container">
            <a href="{{ route('index_user') }}" class="d-flex align-items-center gap-1 text-decoration-none">
                <img src="{{ URL('assets/img/Job Hive_icon.png')}}" class="navbar-brand m-0" alt="Job Finder Logo" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                <h1 class="mb-0 fw-bold" style="color: #d7a343;font-family: Poppins;">Find Your Next Job</h1>
            </a>
           
            <form action="{{ route('jobs.search') }}" method="GET" class="container-fluid p-3" >
            @csrf
            <!-- Main Search Group -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="row g-2">
                        <!-- Search Input -->
                        <div class="col-12 col-md">
                            <input type="text" name="search" class="form-control" placeholder="Search for jobs">
                        </div>
                        <!-- Location Input -->
                        <div class="col-12 col-md">
                            <input type="text" name="location" class="form-control" placeholder="Location">
                        </div>
                        <select name="classification" class="form-select" id="classification" style="width: 160px;">
                            <option value="" selected disabled>Job categories</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Business">Business</option>
                            <option value="Health Care">Health Care</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Education">Education</option>
                            <option value="Law and Public Service">Law and Public Service</option>
                            <option value="Trades and Skill Labor">Trades and Skill Labor</option>
                        </select>
                        <!-- Search Button -->
                        <div class="col-12 col-md-auto">
                            <button class="btn btn-success w-100" type="submit">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Filters Group -->
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Work Types -->
                        <select name="work_type" class="form-select" id="worktypes" style="width: 160px;">
                            <option value="" selected disabled>All Work Types</option>
                            <option value="Full time">Full time</option>
                            <option value="Part time">Part time</option>
                            <option value="Contract/Temp">Contract/Temp</option>
                            <option value="Casual/Vacation">Casual/Vacation</option>
                        </select>
                        <!-- Posted Time -->
                        <select class="form-select" id="joblisttimeposted" name="posted_time" style="width: 190px;">
                            <option value="" selected disabled>Joblist posted time</option>
                            <option value="Any time">Any time</option>
                            <option value="Last 3 days">Last 3 days</option>
                            <option value="Last 7 days">Last 7 days</option>
                            <option value="Last 14 days">Last 14 days</option>
                            <option value="Last 30 days">Last 30 days</option>
                        </select>

                        
                        <!-- Salary From Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="salaryDropdown" data-bs-toggle="dropdown">
                                Paying ₱0
                            </button>
                            <div class="dropdown-menu p-3" style="min-width: 300px;">
                                <label class="form-label">Salary (PHP)</label>
                                <div class="btn-group w-100 mb-3" role="group">
                                    <input type="radio" class="btn-check" name="salaryType" id="annually" value="annually" checked>
                                    <label class="btn btn-outline-dark" for="annually">Annually</label>
                                    <input type="radio" class="btn-check" name="salaryType" id="monthly" value="monthly">
                                    <label class="btn btn-outline-dark" for="monthly">Monthly</label>
                                    <input type="radio" class="btn-check" name="salaryType" id="hourly" value="hourly">
                                    <label class="btn btn-outline-dark" for="hourly">Hourly</label>
                                </div>
                                


                                <select class="form-select salary-range" id="salaryRangeAnnually" name="salaryRangeAnnually" style="display: block;">
                                                    <option value="0" selected>₱0</option>
                                                    <option value="150000">₱150K</option>
                                                    <option value="200000">₱200K</option>
                                                    <option value="300000">₱300K</option>
                                                    <option value="400000">₱400K</option>
                                                    <option value="500000">₱500K</option>
                                                    <option value="600000">₱600K</option>
                                                    <option value="750000">₱750K</option>
                                                    <option value="900000">₱900K</option>
                                                    <option value="1100000">₱1.1M</option>
                                                    <option value="1300000">₱1.3M</option>
                                                    <option value="1500000">₱1.5M</option>
                                                    <option value="2000000">₱2M</option>
                                                </select>
                                                <select class="form-select salary-range" id="salaryRangeMonthly" name="salaryRangeMonthly" style="display: none;">
                                                    <option value="0" selected>₱0</option>
                                                    <option value="10000">₱10K</option>
                                                    <option value="15000">₱15K</option>
                                                    <option value="20000">₱20K</option>
                                                    <option value="30000">₱30K</option>
                                                    <option value="40000">₱40K</option>
                                                    <option value="50000">₱50K</option>
                                                    <option value="60000">₱60K</option>
                                                    <option value="70000">₱70K</option>
                                                    <option value="80000">₱80K</option>
                                                    <option value="100000">₱100K</option>
                                                    <option value="120000">₱120K</option>
                                                    <option value="150000">₱150K</option>
                                                </select>
                                                <select class="form-select salary-range" id="salaryRangeHourly" name="salaryRangeHourly" style="display: none;">
                                                    <option value="0" selected>₱0</option>
                                                    <option value="50">₱50</option>
                                                    <option value="100">₱100</option>
                                                    <option value="150">₱150</option>
                                                    <option value="200">₱200</option>
                                                    <option value="250">₱250</option>
                                                    <option value="300">₱300</option>
                                                    <option value="350">₱350</option>
                                                    <option value="400">₱400</option>
                                                    <option value="450">₱450</option>
                                                    <option value="500">₱500</option>
                                                    <option value="700">₱700</option>
                                                    <option value="900">₱900</option>
                                                </select>
                            </div>
                        </div>

                        <!-- Salary To Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="salaryDropdownTo" data-bs-toggle="dropdown">
                                to ₱2M
                            </button>
                            <div class="dropdown-menu p-3" style="min-width: 300px;">
                                <li>
                                            <div class="px-3 py-2">
                                                <label for="salary-type" class="form-label">Salary (PHP)</label>
                                                <div class="btn-group w-100 mb-3" role="group">
                                                    <input type="radio" class="btn-check" name="salaryType2" id="annuallyto" value="annually" autocomplete="off" checked>
                                                    <label class="btn btn-outline-dark" for="annuallyto">Annually</label>
                                                    <input type="radio" class="btn-check" name="salaryType2" id="monthlyto" value="monthly" autocomplete="off">
                                                    <label class="btn btn-outline-dark" for="monthlyto">Monthly</label>
                                                    <input type="radio" class="btn-check" name="salaryType2" id="hourlyto" value="hourly" autocomplete="off">
                                                    <label class="btn btn-outline-dark" for="hourlyto">Hourly</label>
                                                </div>
                                                <select class="form-select" id="salaryRangeToAnnually" name="salaryRangeToAnnually">
                                                    <option value="150000" selected>₱150K</option>
                                                    <option value="200000">₱200K</option>
                                                    <option value="300000">₱300K</option>
                                                    <option value="400000">₱400K</option>
                                                    <option value="500000">₱500K</option>
                                                    <option value="600000">₱600K</option>
                                                    <option value="750000">₱750K</option>
                                                    <option value="900000">₱900K</option>
                                                    <option value="1100000">₱1.1M</option>
                                                    <option value="1300000">₱1.3M</option>
                                                    <option value="1500000">₱1.5M</option>
                                                    <option value="2000000">₱2M</option>
                                                    <option value="2000000plus">₱2M+</option>
                                                </select>
                                                <select class="form-select" id="salaryRangeToMonthly" name="salaryRangeToMonthly" style="display: none;">
                                                    <option value="10000" selected>₱10K</option>
                                                    <option value="15000">₱15K</option>
                                                    <option value="20000">₱20K</option>
                                                    <option value="30000">₱30K</option>
                                                    <option value="40000">₱40K</option>
                                                    <option value="50000">₱50K</option>
                                                    <option value="60000">₱60K</option>
                                                    <option value="70000">₱70K</option>
                                                    <option value="80000">₱80K</option>
                                                    <option value="100000">₱100K</option>
                                                    <option value="120000">₱120K</option>
                                                    <option value="150000">₱150K</option>
                                                    <option value="150000plus">₱150K+</option>
                                                </select>
                                                <select class="form-select" id="salaryRangeToHourly" name="salaryRangeToHourly" style="display: none;">
                                                    <option value="50" selected>₱50</option>
                                                    <option value="100">₱100</option>
                                                    <option value="150">₱150</option>
                                                    <option value="200">₱200</option>
                                                    <option value="250">₱250</option>
                                                    <option value="300">₱300</option>
                                                    <option value="350">₱350</option>
                                                    <option value="400">₱400</option>
                                                    <option value="450">₱450</option>
                                                    <option value="500">₱500</option>
                                                    <option value="700">₱700</option>
                                                    <option value="900">₱900</option>
                                                    <option value="900plus">₱900+</option>
                                                </select>
                                            </div>
                                        </li>
                            </div>
                        </div>

                   
                </div>
            </div>
            <input type="hidden" name="salary_from" id="hiddenSalaryFrom">
            <input type="hidden" name="salary_to" id="hiddenSalaryTo">
            <input type="hidden" name="salary_type" id="hiddenSalaryType">

        </form>

        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            
        </div>
    </div>

  
  <!-- Job Listings -->
  <div class="container my-5">
        <div class="row">
            @foreach($joblist as $job)
                <div class="col-md-4 mb-4">
                    <div class="card job-card h-100 shadow-sm">
                        <div class="card-body">
                            <img src="{{asset ('storage/' . $job->job_img) }}" class="img-fluid mb-3" alt="IT Jobs" style="height:50px; width:100px;">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <p class="card-text">{{ $job->company_name  }}</p>
                            <div class="mb-3">
                                <p class="card-text mb-0">{{ $job->location }}</p>
                                <p class="card-text mb-0"> ₱{{ number_format($job->salary_min) }} – ₱{{ number_format($job->salary_max) }} per month</p>
                                <p class="card-text mb-3">{{ $job->job_category  }}</p>
                                <p class="card-text mb-0 text-secondary">{{ $job->created_at->diffForHumans() }}</p>
                            </div>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ViewJobModal{{ $job->id }}">View Details</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>




    @foreach($joblist as $job)
        <div class="modal fade" id="ViewJobModal{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                                <div class="modal-header text-dark" style="background-color: #d7a343;">
                                <h5 class="modal-title">View Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                        <div class="modal-body">
                        <div class="container-fluid">
                        
                        <div class="position-relative mb-3">
                                <img src="{{ $job->job_cover_photo ? asset('storage/' . $job->job_cover_photo) : asset('assets/img/default-image.jpg') }}"class="card-img-top" 
                                alt="Cover Photo" 
                                style="height: 250px; object-fit: cover;" >
                        </div>

                        <div class="position-relative mb-3">
                                <img src="{{ $job->job_img ? asset('storage/' . $job->job_img) : asset('assets/img/default-image.jpg') }}" class="card-img-top" 
                                alt="Cover Photo" 
                                style="height: 50px; width: 100px; object-fit: cover;">
                        </div>
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text">{{ $job->company_name  }}</p>
                        <div class="mb-3">
                        <p class="card-text mb-0">{{ $job->location }}</p>
                        <p class="card-text mb-0 text-secondary">{{ $job->work_type }}</p>
                        <p class="card-text mb-0"> ₱{{ number_format($job->salary_min) }} – ₱{{ number_format($job->salary_max) }} per month</p>
                        <p class="card-text mb-3">{{ $job->job_category  }}</p>
                        <p class="card-text mb-3 text-secondary ">{{ $job->created_at->diffForHumans() }}</p>
                        
                        <div class="d-flex gap-2 mb-4">
                        <a href="{{ route('apply', ['job_id' => $job->id]) }}" type="button" class="btn btn-dark">Apply Now</a>
                        
                        </div>

                        <p class="card-text">{{ $job->additional_info }}</p>
                        </div>
                        @if($job->companyProfile)
                        <hr>
                        <h5>Company Profile</h5>
                        <div class="position-relative mb-3">
                            <img src="{{ $job->companyProfile->logo ? asset('storage/' . $job->companyProfile->logo) : 'https://via.placeholder.com/150' }}"
                                 alt="Company Logo" class="img-fluid mb-3" style="height: 100px; object-fit: contain;">
                        </div>
                        <p><strong>Name:</strong> {{ $job->companyProfile->company_name }}</p>
                        <p><strong>Email:</strong> {{ $job->companyProfile->email }}</p>
                        <p><strong>Description:</strong> {{ $job->companyProfile->description }}</p>
                        <p><strong>Location:</strong> {{ $job->companyProfile->location }}</p>
                        <p><strong>Website:</strong> <a href="{{ $job->companyProfile->website }}" target="_blank">{{ $job->companyProfile->website }}</a></p>
                        <p><strong>Contact Person:</strong> {{ $job->companyProfile->contact_person }}</p>
                        <p><strong>Contact Email:</strong> {{ $job->companyProfile->contact_email }}</p>
                        <p><strong>Contact Phone:</strong> {{ $job->companyProfile->contact_phone }}</p>
                        @endif




                        </div>
                        </div>
                        
                </div>
                </div>
        </div>       
        @endforeach
    




    <script>


        // Salary dropdown functionality
        document.addEventListener('DOMContentLoaded', function () {
            const salaryTypeInputs = document.querySelectorAll('input[name="salaryType"]');
            const salaryRanges = document.querySelectorAll('.salary-range');
            const salaryDropdownButton = document.querySelector('#salaryDropdown');

            // Initialize the dropdown button with the default salary range
            function updateSalaryDropdown() {
                const visibleRange = Array.from(salaryRanges).find(range => range.style.display === 'block');
                if (visibleRange) {
                    const selectedOption = visibleRange.options[visibleRange.selectedIndex];
                    salaryDropdownButton.textContent = `Paying ${selectedOption.textContent.trim()}`;
                }
            }

            // Event listener for salary type radio buttons
            salaryTypeInputs.forEach(input => {
                input.addEventListener('change', function () {
                    // Hide all ranges and show the appropriate one
                    salaryRanges.forEach(range => range.style.display = 'none');
                    const selectedRange = document.querySelector(`#salaryRange${this.id.charAt(0).toUpperCase() + this.id.slice(1)}`);
                    if (selectedRange) {
                        selectedRange.style.display = 'block';
                    }
                    // Update the dropdown text
                    updateSalaryDropdown();
                });
            });

            // Event listener for changes in salary range select inputs
            salaryRanges.forEach(range => {
                range.addEventListener('change', updateSalaryDropdown);
            });

            // Initial update to reflect the default settings
            updateSalaryDropdown();
        });





        document.addEventListener('DOMContentLoaded', function () {
            const salaryTypeInputsTo = document.querySelectorAll('input[name="salaryType2"]'); // Matches name attribute
            const salaryRangesTo = {
                annually: document.querySelector('#salaryRangeToAnnually'),
                monthly: document.querySelector('#salaryRangeToMonthly'),
                hourly: document.querySelector('#salaryRangeToHourly'),
            };
            const salaryDropdownButtonTo = document.querySelector('#salaryDropdownTo');

            // Function to update the dropdown button text
            function updateSalaryDropdownTo() {
                const visibleRange = Object.values(salaryRangesTo).find(range => range && range.style.display === 'block');
                if (visibleRange) {
                    const selectedOption = visibleRange.options[visibleRange.selectedIndex];
                    salaryDropdownButtonTo.textContent = `to ${selectedOption.textContent.trim()}`;
                }
            }

            // Event listener for salary type radio buttons
            salaryTypeInputsTo.forEach(input => {
                input.addEventListener('change', function () {
                    // Hide all ranges and show the selected one
                    Object.values(salaryRangesTo).forEach(range => range.style.display = 'none');
                    const selectedRange = salaryRangesTo[this.value]; // Match input value to range
                    if (selectedRange) {
                        selectedRange.style.display = 'block';
                    }
                    // Update the dropdown text
                    updateSalaryDropdownTo();
                });
            });

            // Event listener for changes in salary range select inputs
            Object.values(salaryRangesTo).forEach(range => {
                if (range) {
                    range.addEventListener('change', updateSalaryDropdownTo);
                }
            });

            // Initial setup: show the default selected range and update the dropdown text
            Object.values(salaryRangesTo).forEach(range => {
                range.style.display = 'none'; // Hide all ranges initially
            });
            const defaultRange = salaryRangesTo.annually; // Default to "Annually"
            if (defaultRange) {
                defaultRange.style.display = 'block'; // Show the default range
            }
            updateSalaryDropdownTo(); // Update the dropdown text with default
        });



        document.addEventListener('DOMContentLoaded', function () {
            const salaryTypeInputs = document.querySelectorAll('input[name="salaryType"]');
            const salaryTypeInputsTo = document.querySelectorAll('input[name="salaryType2"]');
            const salaryRanges = document.querySelectorAll('.salary-range');
            const salaryRangesTo = {
                annually: document.querySelector('#salaryRangeToAnnually'),
                monthly: document.querySelector('#salaryRangeToMonthly'),
                hourly: document.querySelector('#salaryRangeToHourly'),
            };

            const salaryDropdownButton = document.querySelector('#salaryDropdown');
            const salaryDropdownButtonTo = document.querySelector('#salaryDropdownTo');

            // Update salary dropdown button text
            function updateSalaryDropdown(button, visibleRange) {
                if (visibleRange) {
                    const selectedOption = visibleRange.options[visibleRange.selectedIndex];
                    button.textContent = `Paying ${selectedOption.textContent.trim()}`;
                }
            }

            // Update the visibility of salary ranges and synchronize selections
            function updateSalaryRanges(selectedValue) {
                salaryRanges.forEach(range => range.style.display = 'none');
                Object.values(salaryRangesTo).forEach(range => range.style.display = 'none');

                const selectedRange = document.querySelector(`#salaryRange${selectedValue.charAt(0).toUpperCase() + selectedValue.slice(1)}`);
                const selectedRangeTo = salaryRangesTo[selectedValue];

                if (selectedRange) selectedRange.style.display = 'block';
                if (selectedRangeTo) selectedRangeTo.style.display = 'block';

                updateSalaryDropdown(salaryDropdownButton, selectedRange);
                updateSalaryDropdown(salaryDropdownButtonTo, selectedRangeTo);
            }

            // Event listener for salary type changes
            function handleSalaryTypeChange(event) {
                const selectedValue = event.target.value;

                // Sync both salary type groups
                salaryTypeInputs.forEach(input => {
                    if (input.value === selectedValue) input.checked = true;
                });
                salaryTypeInputsTo.forEach(input => {
                    if (input.value === selectedValue) input.checked = true;
                });

                // Update ranges
                updateSalaryRanges(selectedValue);
            }

            // Add event listeners to salary type inputs
            salaryTypeInputs.forEach(input => input.addEventListener('change', handleSalaryTypeChange));
            salaryTypeInputsTo.forEach(input => input.addEventListener('change', handleSalaryTypeChange));

            // Initial setup
            const defaultSalaryType = 'annually'; // Default value
            updateSalaryRanges(defaultSalaryType);
        });

        document.addEventListener('DOMContentLoaded', function () {
    const fromSelects = document.querySelectorAll('.salary-range'); // All "From" dropdowns
    const toSelects = {
        annually: document.querySelector('#salaryRangeToAnnually'),
        monthly: document.querySelector('#salaryRangeToMonthly'),
        hourly: document.querySelector('#salaryRangeToHourly'),
    };

    function updateToOptions(fromSelect, toSelect) {
        const fromValue = parseInt(fromSelect.value, 10);

        Array.from(toSelect.options).forEach(option => {
            const optionValue = parseInt(option.value, 10);

            // Disable options less than or equal to the selected "From" value
            if (optionValue <= fromValue) {
                option.disabled = true;
            } else {
                option.disabled = false;
            }
        });

        // Ensure the "To" dropdown has a valid value selected
        if (parseInt(toSelect.value, 10) <= fromValue) {
            toSelect.value = "";
        }
    }

    fromSelects.forEach(fromSelect => {
        fromSelect.addEventListener('change', function () {
            const salaryType = fromSelect.id.replace('salaryRange', '').toLowerCase(); // Extract type (annually, monthly, hourly)
            const toSelect = toSelects[salaryType];
            if (toSelect) updateToOptions(fromSelect, toSelect);
        });
    });

    // Add listeners for salary type changes to synchronize ranges
    const salaryTypeInputs = document.querySelectorAll('input[name="salaryType"]');
    const salaryTypeInputsTo = document.querySelectorAll('input[name="salaryType2"]');

    function handleSalaryTypeChange(event) {
        const selectedValue = event.target.value;

        salaryTypeInputs.forEach(input => input.checked = input.value === selectedValue);
        salaryTypeInputsTo.forEach(input => input.checked = input.value === selectedValue);

        Object.values(toSelects).forEach(select => select.style.display = 'none');
        const selectedToSelect = toSelects[selectedValue];
        if (selectedToSelect) selectedToSelect.style.display = 'block';
    }

    salaryTypeInputs.forEach(input => input.addEventListener('change', handleSalaryTypeChange));
    salaryTypeInputsTo.forEach(input => input.addEventListener('change', handleSalaryTypeChange));
});



document.addEventListener('DOMContentLoaded', function() {
   // Add this to ensure hidden fields are properly updated before form submission
    const form = document.querySelector('form');

});
// Add this to your existing JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const salaryRanges = document.querySelectorAll('.salary-range');
    const salaryRangesTo = {
        annually: document.querySelector('#salaryRangeToAnnually'),
        monthly: document.querySelector('#salaryRangeToMonthly'),
        hourly: document.querySelector('#salaryRangeToHourly')
    };

    function submitFormWithAjax() {
        const form = document.querySelector('form');
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin',
            body: formData
        })
        .then(response => response.text())
        .then(html => {
            document.querySelector('.container.my-5').innerHTML = html;
        });
    }

    // Add change listeners to salary range dropdowns
    salaryRanges.forEach(range => {
        range.addEventListener('change', function() {
            updateHiddenFields();
            submitFormWithAjax();
        });
    });

    Object.values(salaryRangesTo).forEach(range => {
        if (range) {
            range.addEventListener('change', function() {
                updateHiddenFields();
                submitFormWithAjax();
            });
        }
    });

    function updateHiddenFields() {
        const activeSalaryRange = document.querySelector('.salary-range[style*="display: block"]');
        const activeSalaryRangeTo = Object.values(salaryRangesTo).find(range => range.style.display === 'block');
        
        document.getElementById('hiddenSalaryFrom').value = activeSalaryRange?.value || '';
        document.getElementById('hiddenSalaryTo').value = activeSalaryRangeTo?.value || '';
        document.getElementById('hiddenSalaryType').value = document.querySelector('input[name="salaryType"]:checked')?.value || '';
    }
});








</script>

    
@endsection