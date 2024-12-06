<!DOCTYPE html>
<html>
   <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Julius+Sans+One&family=Open+Sans&display=swap" rel="stylesheet">
   </head>
   <style>
        body {
          background: rgb(204,204,204); 
          width: 21cm;
          height: 29.7cm;
          margin: 0 auto;
        }

        page {
          background: white;
          display: block;
          margin: 0 auto;
          margin-bottom: 0.5cm;
          position: relative;
        }

        page[size="A4"] {  
          width: 21cm;
          height: 29.7cm; 
        }

        @page {
          size: 21cm 29.7cm;
          margin: 0mm;
        }

        .container {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 100%;
        }
        .leftPanel {
        width: 27%;
        background-color: #484444;
        padding: 0.7cm;
        display: flex;
        flex-direction: column;
        align-items: center;
        }
        .rightPanel {
        width: 73%;
        padding: 0.7cm;
        }


        .item {
        padding-bottom: 0.7cm;
        padding-top: 0.7cm;
        }
        .item h2{
        margin-top: 0;
        }
        .bottomLineSeparator {
        border-bottom: 0.05cm solid white;
        }
        h2 {
        font-family: 'Archivo Narrow', sans-serif;
        }
        .leftPanel h2 {
        color: white;
        }
        img {
        width: 4cm;
        height: 4cm;
        margin-bottom: 0.7cm;
        border-radius: 50%;
        border: 0.15cm solid white;
        object-fit: cover;
        object-position: 50% 50%;
        }
        .details {
        width: 100%;
        display: flex;
        flex-direction: column;
        }

        .smallText, .smallText span, .smallText p, .smallText a {
            font-size: 0.45cm;
            font-family: 'Source Sans Pro', sans-serif;
            text-align: justify;
        }

        .contactIcon {
            width: 0.5cm;
            text-align: center;
        }

        .leftPanel, .leftPanel a {
            color: #bebebe;
            text-decoration: none;
        }

        .skill {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .yearsOfExperience {
            width: 1.6cm;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .alignleft {
            text-align: left !important;
            width: 1cm;
        }

        .alignright {
            text-align: right !important;
            width: 0.6cm;
            margin-right: 0.1cm;
        }

        .bolded {
            font-weight: bold;
        }

        .white {
            color: white;
        }

        h1 {
            font-family: 'Julius Sans One', sans-serif;
            font-weight: 300;
            font-size: 1.2cm;
            transform: scale(1, 1.15);
            margin-bottom: 0.2cm;
            margin-top: 0.2cm;
            text-transform: uppercase;
        }

        h3 {
            font-family: 'Open Sans', sans-serif;
        }

        .workExperience > ul > li ul {
            padding-left: 0.5cm;
            list-style-type: disc;
        }

        .workExperience > ul {
            list-style-type: none;
            padding-left: 0;
        }

        .workExperience > ul > li {
            position: relative;
            margin: 0;
            padding-bottom: 0.5cm;
            padding-left: 0.5cm;
        }

        .workExperience > ul > li:before {
            background-color: #b8abab;
            width: 0.05cm;
            content: '';
            position: absolute;
            top: 0.1cm;
            bottom: -0.2cm;
            left: 0.05cm;
        }

        .workExperience > ul > li::after {
            content: '';
            position: absolute;
            background-repeat: no-repeat;
            background-size: contain;
            left: -0.09cm;
            top: 0;
            width: 0.35cm;
            height: 0.35cm;
        }

        .jobPosition {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .jobPosition span, .projectName span {
            font-family: 'Source Sans Pro', sans-serif;
        }

        .smallText p {
            margin: 0.2cm 0;
        }

        .skill {
            margin-bottom: 0.2cm;
        }

        .workExperience li .smallText {
            margin-top: 0.2cm;
        }

        .details .item:last-child {
            border-bottom: none;
        }
        @media print {
            body, html {
                background-color: white;
            }
            
            page[size="A4"] {
                margin: 0;
                box-shadow: none;
            }
        }
   </style>

   <body>
       <page size="A4">
           <div class="container">
               <div class="leftPanel">
                   @if(!empty($data['profileImage']))
                       <img src="{{ $data['profileImage'] }}" alt="Profile Image" />
                   @else
                       <img src="avatar.png" alt="Default Avatar" />
                   @endif

                   <div class="details">
                       <div class="item bottomLineSeparator">
                           <h2>CONTACT</h2>
                           <div class="smallText">
                               <p>{{ $data['email'] ?? '' }}</p>
                               <p>{{ $data['contactdetails'] ?? '' }}</p>
                               <p>{{ $data['address'] ?? '' }}</p>
                           </div>
                       </div>

                       <div class="item bottomLineSeparator">
                           <h2>SKILLS</h2>
                           <div class="smallText">
                               @if(!empty($data['skills']))
                                   @foreach($data['skills'] as $skill)
                                       <div class="skill">
                                           <span>{{ $skill }}</span>
                                       </div>
                                   @endforeach
                               @endif
                           </div>
                       </div>

                       <div class="item">
                           <h2>EDUCATION</h2>
                           <div class="smallText">
                               @if(!empty($data['education']))
                                   @foreach($data['education'] as $education)
                                       <div>
                                           <p class="bolded">{{ $education['degree'] ?? '' }}</p>
                                           <p>{{ $education['school'] ?? '' }}</p>
                                           <p>{{ $education['startDate'] ?? '' }} - {{ $education['endDate'] ?? '' }}</p>
                                       </div>
                                   @endforeach
                               @endif
                           </div>
                       </div>
                   </div>
               </div>

               <div class="rightPanel">
                   <div>
                       <h1>{{ $data['resumefirstname'] ?? '' }} {{ $data['resumelastname'] ?? '' }}</h1>
                   </div>

                   <div>
                       <h2>About me</h2>
                       <div class="smallText">
                           <p>{{ $data['formAboutme'] ?? '' }}</p>
                       </div>
                   </div>

                   <div class="workExperience">
                       <h2>Work experience</h2>
                       <ul>
                           @if(!empty($data['employment']))
                               @foreach($data['employment'] as $employment)
                                   <li>
                                       <div class="jobPosition">
                                           <span class="bolded">{{ $employment['jobTitle'] ?? '' }}</span>
                                           <span>{{ $employment['startDate'] ?? '' }} - {{ $employment['endDate'] ?? '' }}</span>
                                       </div>
                                       <div class="projectName bolded">
                                           <span>{{ $employment['company'] ?? '' }}</span>
                                       </div>
                                       <div class="smallText">
                                           <p>{{ $employment['description'] ?? '' }}</p>
                                       </div>
                                   </li>
                               @endforeach
                           @endif
                       </ul>
                   </div>
               </div>
           </div>
       </page>
   </body>
</html>
