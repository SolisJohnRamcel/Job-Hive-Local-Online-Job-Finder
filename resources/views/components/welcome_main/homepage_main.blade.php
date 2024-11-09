<main>
    <div class="bg-image" style="background-image: url('{{ URL('assets/img/shanghai2.jpg') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover; min-height: 500px;">
        <div class="container">
            <div class="row min-vh-50">
                <div class="col-12 col-md-8 col-lg-6 px-4 py-5">
                    <div class="text-center text-md-start">
                        <h1 class="text-white display-6 fw-bold mt-4">Welcome to Job Hive Local!</h1>
                        <p class="lead text-white">Introducing a new model for online job searching, helping you find available jobs in your local area.</p>
                        <a role="button" class="btn rounded-pill text-white" style="background-color: #947439;" href="/signup">Join Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 px-4">
                <x-career_advice></x-career_advice>
                
                <div class="text-center text-md-start">
                    <h2>Find your next company</h2>
                    <p>View company profile to find perfect workplace for you. Learn about Jobs, ratings, company info, benefits and more.</p>
                </div>
                
                <x-try></x-try>
            </div>
        </div>
    </div>
</main>
