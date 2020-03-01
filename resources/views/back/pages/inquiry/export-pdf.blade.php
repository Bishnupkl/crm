<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css" media="all">
        input{
            position: relative;

            border-radius: 2rem;
        }
        .content-right {
            position: relative;
            width: 50%;
            float: right;
        }
        .content-left {
            position: relative;
            width: 50%;
            float: left;
        }
        .content {
            /*width: 50%;*/
            margin: 0.5rem;
            padding: 0.3rem;
        }
        body {
            font-family: sans, sans-serif;
        }
        .name{
            text-color :red;
        }
    </style>
</head>

        <div class="personal-information">
            <h2>Personal Information : </h2>
            <div class="content-left">
                <div class="content">
                    <label class="name">Name :</label>
                    <strong>{{$detail->name}}</strong>
                </div>
                <div class="content">
                    <label>Date of Birth :</label>
                    {{$detail->dob}}
                </div>
                <div class="content">
                    <label>Permanent Address :</label>
                    {{$detail->permanent_address}}
                </div>
                <div class="content">
                    <label>Landline Number :</label>
                    {{$detail->landline}}
                </div>
                <div class="content">
                    <label>Gender :</label>
                    {{$detail->gender}}
                </div>
                @if(isset($detail->marital_date))
                <div class="content">
                    <label>Marriage Date :</label>
                    {{$detail->marital_date}}
                </div>
                @endif

            </div>
            <div class="content-right">
                <div class="content">
                    <label>Email :</label>
                   {{$detail->email}}
                </div>
                @if(isset($detail->landline))
                <div class="content">
                    <label>Mobile Number :</label>
                    {{$detail->landline}}
                </div>
                @endif

                <div class="content">
                    <label>Temporary Address :</label>
                    {{$detail->temporary_address}}
                </div>
                <div class="content">
                    <label>Mobile Number :</label>
                    {{$detail->mobile}}
                </div>
                <div class="content">
                    <label>Marital Status :</label>
                    {{$detail->marital_status}}
                </div>

            </div>
        </div>
        
        @if(isset($detail->emergencyContact))
        <div class="content">
            <div class="emergency-contact">
                <h2>Emergency Contacts</h2>
                <div class="content">
                    <label>Parents Name :</label>
                    {{$detail->emergencyContact->name}}
                </div>
                <div class="content">
                    <label>Contact Number :</label>
                    {{$detail->emergencyContact->contact}}
                </div>
                <div class="content">
                    <label>Relation :</label>
                    {{$detail->emergencyContact->relation}}
                </div>
            </div>
        </div>
        @endif
        
        @if(isset($detail->interest))
        <div class="content">
            <div class="interest">
                <h2>Interests</h2>
                @if(isset($detail->interest->country))
                <div class="content">
                    <label>Country Name :</label>
                    {{$detail->interest->country->name}}
                </div>
                @endif
                 @if(isset($detail->interest->intake))
                <div class="content">
                    <label>Intake :</label>
                    {{$detail->interest->intake->intake_type}}
                </div>
                @endif
                 @if(isset($detail->interest->university))
                <div class="content">
                    <label>University :</label>
                    {{$detail->interest->university->name}}
                </div>
                @endif
                 @if(isset($detail->interest->course))
                <div class="content">
                    <label>Courses  :</label>
                    {{$detail->interest->course->course_name}}
                </div>
                @endif
            </div>
        </div>
        @endif
        
        @if(isset($detail->academicDetail))
        <div class="academic-details">
            <h2>Academic Details</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Qualification</th>
                    <th>Institution</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Percentage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detail->academicDetail as $academic)
                
                <tr>
                    
                    <td> {{$academic->name_of_qualification}}</td>
                    <td> {{$academic->name_of_institution}}</td>
                    <td> {{$academic->start_date}}</td>
                    <td> {{$academic->end_date}}</td>
                    <td> {{$academic->percentage}}</td>
                    
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
        
        @if(isset($detail->experiences))
        <div class="experience-training">
            <h2>Experience and Training</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name of Employer/Institution</th>
                    <th>Duties</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detail->experiences as $experience)
                <tr>
                    <td>{{$experience->name_of_employer}}</td>
                    <td>{{$experience->duties}}</td>
                    <td>{{$experience->start_date}}</td>
                    <td>{{$experience->end_date}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
        @if(isset($detail->englishProficiencyTest))
        <div class="content-left">
            <div class="interest">
                <h2>English Proficiency Test</h2>
                <div class="content">
                    <label>Country Name</label>
                    <input type="text" readonly value="Name">
                </div>
                <div class="content">
                    <label>Intake</label>
                    <input type="text" readonly value="Name">
                </div>
                <div class="content">
                    <label>University</label>
                    <input type="text" readonly value="Name">
                </div>
                <div class="content">
                    <label>Courses</label>
                    <input type="text" readonly value="Name">
                </div>
            </div>
        </div>
        @endif
        @if(count($detail->documents)>0)
        <p style="page-break-after:always;"></p>
        <div class="document">
            <h2>Documents</h2>
           <!--@foreach($detail->douments as $document)-->
           <!--<img src="{{URL::to('images/}}"-->
           
           <!--@endforeach-->
        </div>
        @endif
    </body>
</html>