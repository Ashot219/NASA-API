let camera_name;
let selected_date;
let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {

    $('.get_photos').on('click', function () {
        let date = $('.date_for_images').val();
        let camera = $('.rover_camera').val();
        camera_name = $('.rover_camera').find('option:selected').text();
        if (!date) {
            date = '2021-12-08';
        }
        if ($('.get_data_using').val() == 'js') {
            getDataFromApi(camera, date);
        }else {
            getDataFromApiAjax(camera, date);
        }
    })
})


async function getDataFromApi(camera, date) {
    selected_date = date;
    let API_KEY = 'oOAFOTmJAzdKGtafIRzrRrlbue4I76ib1tB72qm5';

    let response = await fetch(`https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?page=1&camera=${camera}&earth_date=${date}&api_key=${API_KEY}`);
    let data = await response.json()
    useData(data, date);
}

async function getDataFromApiAjax(camera, date) {
    selected_date = date;
    let request = $.ajax({
        url: 'getMarsRoverPhotos',
        method: 'POST',
        dataType: 'json',
        data: {
            camera: camera,
            date: date,
            _token: CSRF_TOKEN
        }
    })
    await request.done(function (response){
        useDataAjax(response, date);
    })

}

function useData(data, date) {
    $('.content').empty();
    if (data.photos.length > 0) {
        $.each(data.photos, function (key, value) {
            $('.content').append(`<div class="col-4"><img src="${value.img_src}" data-id="${value.id}"></div>`);
        });
    } else {
        $('.content').append(`<div class="col-12"><h2>Sorry! There were no images for selected camera on ${date} date.</h2></div>`);
    }
    $('.camera_name').text(camera_name);
    $('.photo_date').text(selected_date);
    $('.step_2').removeClass('hidden');
    $('.step_1').addClass('hidden');

}

function useDataAjax(data, date) {
    console.log(data.photos);
    $('.content').empty();
    if (data.photos.length > 0) {
        $.each(data.photos, function (key, value) {
            $('.content').append(`<div class="col-4"><img src="${value.img_src}" data-id="${value.id}"></div>`);
        });
    } else {
        $('.content').append(`<div class="col-12"><h2>Sorry! There were no images for selected camera on ${date} date.</h2></div>`);
    }
    $('.camera_name').text(camera_name);
    $('.photo_date').text(selected_date);
    $('.step_2').removeClass('hidden');
    $('.step_1').addClass('hidden');

}

$('.to_step_1').on('click', function () {
    $('.step_1').removeClass('hidden');
    $('.step_2').addClass('hidden');
})
$('.to_step_2').on('click', function () {
    $('.step_2').removeClass('hidden');
    $('.step_3').addClass('hidden');
})

$('.content').on('click', 'img', function () {
    let src = $(this).attr('src');
    let photo_id = $(this).data('id');
    $('.img_modal').attr('src', src);
    $('.photo_id').text(photo_id);
    $('.step_3').removeClass('hidden');
    $('.step_2').addClass('hidden');
})

$('.download').on('click', function () {
    let url = $('.img_modal').attr('src');
    downloadImage(url)
})

function downloadImage(url) {
    let a = $("<a>")
        .attr("href", url)
        .attr("target", '_blank')
        .attr("download", 'mars_img.jpg')
        .appendTo("body");
    a[0].click();
    a.remove();
}
