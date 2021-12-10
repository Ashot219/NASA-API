<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nasa mars photos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container pad15">
    <div class="row search">
        <div class="col-4 offset-4">
            <div class="row bg_img step_1">
                <div class="col-12">
                    <h3>Nasa Mars photos</h3>
                    <h4>Select Camera and Date </h4>

                </div>
                <div class="col-12">

                    <label for="rover_camera">Rover camera</label>
                    <select name="camera" id="rover_camera" class="form-control input-sm rover_camera">
                        <option value="fhaz">Front Hazard Avoidance Camera</option>
                        <option value="rhaz">Rear Hazard Avoidance Camera</option>
                        <option value="mast">Mast Camera</option>
                        <option value="chemcam">Chemistry and Camera Complex</option>
                        <option value="mahli">Mars Hand Lens Imager</option>
                        <option value="mardi">Mars Descent Imager</option>
                        <option value="navcam">Navigation Camera</option>
                        <option value="pancam">Panoramic Camera</option>
                        <option value="minites">Miniature Thermal Emission Spectrometer (Mini-TES)</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="date">Date</label>
                    <input type="date" id="date" class="date_for_images form-control input-sm">
                </div>
                <div class="col-12">
                    <label for="get_data_using">Get data using</label>
                    <select name="" id="get_data_using" class="form-control input-sm get_data_using">
                        <option value="laravel">Laravel</option>
                        <option value="js">Js</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="button" class="get_photos btn btn-primary w100">Explore</button>
                </div>
            </div>

            <div class="row step_2 hidden">
                <div class="col-12">
                    <h4 class="text_center"><i class="fas fa-angle-left to_step_1 text_left"></i>
                        <span class="camera_name "></span></h4>
                    <h5 class="photo_date text_center">Date</h5>
                    <div class="row content">

                    </div>
                </div>
            </div>

            <div class="row img_modal step_3 hidden">
                <div class="col-12">
                    <h3 class="text_center"><i class="fas fa-angle-left to_step_2 text_left"></i>
                        <span>Photo ID</span>
                        <i class="fa fa-download download text_right" aria-hidden="true"></i>
                        <br><span class="photo_id text_center"></span></h3>
                </div>
                <div class="col-12">
                    <img src="" alt="" class="w100 img_modal">
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="js/nasa.js"></script>
</body>
</html>
