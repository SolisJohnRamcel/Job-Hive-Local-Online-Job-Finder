<!-- this is the main for homepage -->
<main>
    <div class="bg-image" style="background-image: url('{{ URL('assets/img/shanghai2.jpg') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover; height: 500px;">
        <div class="d-flex justify-content-right" style="padding-top: 0px; padding-left: 50px;">
            <div class="ps-lg-5 col-xxl-3 col-lg-5 col-md-5 text-xs-center">
                <div style="text-shadow: 0px 0px 0px #212121;">
                    <h1 class="text-white display-6 fw-bold mt-4">Welcome to Job Hive Local!</h1>
                    <p class="lead text-white">Introducing a new model for online job searching, helping you find available jobs in your local area.</p>
                    <a role="button" class="btn rounded-pill text-white" style="background-color: #947439;" href="/signup">Join Us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="me-5 content ps-lg-5">
  
            <x-career_advice></x-career_advice>
            <h2>Find your next company</h2>
            <p>view company profile to find perfect workplace for you. Learn about Jobs, ratings, company info, benefits and more. </p>
            <x-try></x-try>
        </div>
    </div>
    
</main>

