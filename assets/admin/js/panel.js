function slugify(string) {
    return string.toString().toLowerCase().replace(/\s+/g, '-').replace(/\-\-+/g, '-').replace(/^-+/, '').replace(/-+$/, '');
}

function slug(one, two) {
    $(one).change(function () {
        var slug = slugify($(one).val());
        $(two).val(slug);
    });
}

$(function () {
    var menu_url = location;
    var menu_a = $('.archive-menuCategory-container ul li a');
    menu_a.each(function () {
        var m_a = $(this).attr('href');
        if (m_a == menu_url) {
            $(this).parent('li').addClass('active');
        }
    });
});

// this is base url
var images = [];
var baseUrl = $('meta[name=base-url]').attr('content');

function sendImage(id, type, maxfile, folder, method, maxFileSize, tag, name, waterMark, height, width) {
    if (name == undefined) {

        name = 'photos[]'
    }

    $('#' + id + "").addClass('dropzone');
    var dropzoneOptions = {
        url: baseUrl + "/panel/uploads/" + folder + "/" + waterMark + "/" + height + "/" + width,
        acceptedFiles: type,
        maxFiles: maxfile,
        method: method,
        dictCancelUpload: "انصراف",
        dictRemoveFile: "حذف",
        dictDefaultMessage: "عکس خود را انتخاب کنید یا به اینجا بکشید",
        enqueueForUpload: true,
        autoDiscover: true,
        maxFilesize: maxFileSize,
        addRemoveLinks: true,
        params: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },


        init: function () {
            this.on("removedfile", function (file) {

                $.each(images, function (index, value) {

                    if (value != undefined) {
                        if (value.oldName == file.name) {

                            images.splice(index, 1);

                            ajax_connect('panel/uploads/file/delete', {'url': value.newName}).then(function (data) {
                            });

                        }
                    } else {
                        images.splice(index, 1);
                    }

                });

                createTag_image(images, tag, name);

            });
            this.on("addedfile", function (file) {

                if (file.update != undefined) {
                    images.push({
                        'oldName': file.name,
                        'newName': file.name,
                        'name': name
                    });
                }


                $('.dz-message').removeClass('display-none');
                $('.dz-uploaded').remove();


            });
            this.on("maxfilesexceeded", function (file) {
                    alert('شما مجاز به آپلود بیش از 20 فایل نمی باشید')
            });
            this.on("success", function (file, response) {

                images.push({
                    'oldName': file.name,
                    'newName': response.data,
                    'name': name
                });

                createTag_image(images, tag, name);
            });
        }
    };
    var uploader = document.querySelector('#' + id + '');
    var dropzone_create = new Dropzone(uploader, dropzoneOptions);


    if (tag == undefined) {

        $.each($('.some-image').children(), function (index, value) {

            var mockFile = {name: $(value).val(), update: true};
            dropzone_create.emit("addedfile", mockFile);
            dropzone_create.emit("thumbnail", mockFile, "" + baseUrl + '/' + $(value).val() + "");
            dropzone_create.emit("complete", mockFile);
        });
    } else {
        $.each($('.' + tag + '').children(), function (index, value) {
            var mockFile = {name: $(value).val(), update: true};
            dropzone_create.emit("addedfile", mockFile);
            dropzone_create.emit("thumbnail", mockFile, "" + baseUrl + '/' + $(value).val() + "");
            dropzone_create.emit("complete", mockFile);
        });
    }


}

function createTag_image(items, tag, name) {

    if (name == undefined) {
        name = 'photos[]'
    }

    if (tag == undefined) {
        $('.some-image').empty();
        $.each(items, function (index, value) {
            if (name == value.name) {
                $('.some-image').append('<input type="hidden" value="' + value.newName + '" name="' + name + '"/>')
            }
        });
    } else {
        $('.' + tag + '').empty();
        $.each(items, function (index, value) {
            if (name == value.name) {
                $('.' + tag + '').append('<input type="hidden" value="' + value.newName + '" name="' + name + '"/>')
            }
        });
    }


}

//ajax connect
function ajax_connect(url, data) {
    return new Promise(
        function (resolve, reject) {
            if (data == undefined)
                data = {};

            $.ajax({
                url: baseUrl + '/' + url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success: function (data) {

                    resolve(data);
                },
                failure: function (errMsg) {

                    reject(errMsg);
                }
            });
        })
}

$(document).ready(function () {

    $('form').on('keypress', function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });

});

