var is_new = 0;
$(document).ready(function () {
    $image_crop = $('#image_demo').croppie({
        viewport: {
            width: 1000,
            height: 244,
            type: 'square'
        },
        // enableResize: true,
        boundary: { //1920X470
            width: 1200,
            height: 500
        },
        enableExif: true
    });

    $('#crop_image_source').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (event) {

            $('#crop_image_source_display').attr('src', event.target.result);
            is_new = 1;

            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        // $('#insertimageModal').modal('show');
    });

    $('.crop_image').click(function (event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            $('#crop_image_data').val(response);
            $.ajax({
                url: POST_IMAGE_URL,
                type: "POST",
                data: {
                    "image": response
                },
                success: function (data) {
                    $('#insertimageModal').modal('hide');
                    $('#crop_image_result').html(data);

                }
            })
        })
    });
    $('#crop_image_old').click(function (event) {
        if(is_new == 0){
            $image_crop.croppie('bind', {
                url: $('#crop_image_source_display').attr('src'),
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        $('#insertimageModal').modal('show');
        return false;
    });
});
var is_new2 = 0;
$(document).ready(function () {
    $image_crop2 = $('#image_demo2').croppie({
        viewport: {
            width: 400,
            height: 400,
            type: 'square'
        },
        // enableResize: true,
        boundary: { //1920X470
            width: 1200,
            height: 500
        },
        enableExif: true
    });

    $('#crop_image_source2').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $('#crop_image_source_display2').attr('src', event.target.result);
            // is_new2 = 1;
            // $image_crop2.croppie('bind', {
            //     url: event.target.result
            // }).then(function () {
            //     console.log('jQuery bind complete');
            // });
        }
        $('#is_remove').val(0);
        reader.readAsDataURL(this.files[0]);
        // $('#insertimageModal').modal('show');
    });

    $('.crop_image2').click(function (event) {
       // alert(1);
        $image_crop2.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            $('#crop_image_data2').val(response);
            $.ajax({
                url: POST_IMAGE_URL,
                type: "POST",
                data: {
                    "image": response
                },
                success: function (data) {
                    $('#insertimageModal2').modal('hide');
                    $('#crop_image_result2').html(data);

                }
            })
        })
    });
    $('#crop_image_old2').click(function (event) {
        if(is_new2 == 0){
            $image_crop2.croppie('bind', {
                url: $('#crop_image_source_display2').attr('src'),
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        $('#insertimageModal2').modal('show');
        return false;
    });

    $('#removeImge').click(function (event) {
        $('#is_remove').val(1);
        $('#crop_image_source_display2').attr('src', '#');
        $('#crop_image_source_display2').attr('display', 'none');
    });

});
