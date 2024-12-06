<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .section { margin-bottom: 15px; }
        .section-title { font-weight: bold; margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="header">
        @if(!empty($data['profileImage']))
            <img src="{{ $data['profileImage'] }}" alt="Profile Image" style="width: 150px; height: 150px; border-radius: 50%;">
        @endif
        <h1>{{ $data['resumefirstname'] ?? '' }} {{ $data['resumelastname'] ?? '' }}</h1>
        <p>{{ $data['email'] ?? '' }} | {{ $data['contactdetails'] ?? '' }} | {{ $data['address'] ?? '' }}</p>
    </div>

    <div class="section">
        <div class="section-title">About Me</div>
        <p>{{ $data['formAboutme'] ?? '' }}</p>
    </div>

    @if(!empty($data['employment']))
        <div class="section">
            <div class="section-title">Employment History</div>
            @foreach($data['employment'] as $employment)
                <div>
                    <strong>{{ $employment['jobTitle'] ?? '' }}</strong>
                    @if(!empty($employment['company']))
                        at {{ $employment['company'] }}
                    @endif
                    @if(!empty($employment['startDate']) || !empty($employment['endDate']))
                        ({{ $employment['startDate'] ?? '' }} - {{ $employment['endDate'] ?? '' }})
                    @endif
                    <p>{{ $employment['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    @endif
    
    @if(!empty($data['education']))
        <div class="section">
            <div class="section-title">Education</div>
            @foreach($data['education'] as $education)
                <div class="entry">
                    <div class="entry-header">{{ $education['degree'] ?? '' }}</div>
                    <div class="entry-subheader">
                        {{ $education['school'] ?? '' }}
                        @if(!empty($education['location']))
                            | {{ $education['location'] }}
                        @endif
                        @if(!empty($education['startDate']) || !empty($education['endDate']))
                            | {{ $education['startDate'] ?? '' }} - {{ $education['endDate'] ?? '' }}
                        @endif
                    </div>
                    <p>{{ $education['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    @endif

    @if(!empty($data['skills']))
        <div class="section">
            <div class="section-title">Skills</div>
            <div class="skills-list">
                @foreach($data['skills'] as $skill)
                    <span class="skill-item">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
    @endif
</body>
</html>
