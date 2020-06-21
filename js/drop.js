/**
 *
 * app.js
 *
 */
function readFile(input) {
    if (input.files) {
        inputLength = input.files.length;

        for (var i = 0; i < inputLength; i++) {
            var reader = new FileReader()
            reader.onload = function (e) {
                var htmlPreview =
                    '<img width="200" src="' + e.target.result + '" />' + '   ';
                $('.box-body').append(htmlPreview);

            }
            reader.readAsDataURL(input.files[i]);
        }
    }
}

function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
}
$(".dropzone").change(function () {
    readFile(this);
});
$('.dropzone-wrapper').on('dragover', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragover');
});
$('.dropzone-wrapper').on('dragleave', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragover');
});
$('.remove-preview').on('click', function () {
    var boxZone = $(this).parents('.preview-zone').find('.box-body');
    var previewZone = $(this).parents('.preview-zone');
    var dropzone = $(this).parents('.form-group').find('.dropzone');
    boxZone.empty();
    previewZone.addClass('hidden');
    reset(dropzone);
});