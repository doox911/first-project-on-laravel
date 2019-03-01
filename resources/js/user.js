//-------------------
// -------- USER ----
//-------------------
$('body').on('click', '.btn-change-login', function () {
    const login = $('input[name="login"]').val(),
          id = $(this).attr('data-user');
    $.ajax({
        url: '/updatelogin',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        data: {login:login, id:id},
        success: function (data) { $('input[name="login"]').val(data) },
    });
});
$('body').on('click', '.btn-change-name', function () {
    const name = $('input[name="name"]').val(),
          id = $(this).attr('data-user');
    $.ajax({
        url: '/updatename',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        data: {name:name, id:id},
        success: function (data) { $('input[name="name"]').val(data) },
    });
});
$('body').on('click', '.btn-change-second-name', function () {
    const secondname = $('input[name="second-name"]').val(),
          id = $(this).attr('data-user');
    $.ajax({
        url: '/updatesecondname',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        data: {secondname:secondname, id:id},
        success: function (data) { $('input[name="second-name"]').val(data) },
    });
});
$('body').on('click', '.btn-change-patronumic', function () {
    const patronumic = $('input[name="patronumic"]').val(),
          id = $(this).attr('data-user');
    $.ajax({
        url: '/updatepatronumic',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        data: {patronumic:patronumic, id:id},
        success: function (data) { $('input[name="patronumic"]').val(data) },
    });
});
$('body').on('click', '.btn-change-email', function () {
    const email = $('input[name="email"]').val(),
          id = $(this).attr('data-user');
    $.ajax({
        url: '/updateemail',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        data: {email:email, id:id},
        success: function (data) { $('input[name="email"]').val(data) },
    });
});
$('body').on('click', '.btn-change-signature', function () {
    const signature = $('textarea[name="signature"]').val(),
          id = $(this).attr('data-user');
    $.ajax({
        url: '/updatesignature',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        data: {signature:signature, id:id},
        success: function (data) { $('textarea[name="signature"]').val(data) },
    });
});
$('body').on('click', '.btn-change-foto', function () {

    const foto = $('input[name="foto"]').prop('files')[0];

    let fd = new FormData();

    fd.append( 'foto', foto );
    fd.append( 'id', $(this).attr('data-user') );

    $.ajax({
        url: '/updatefoto',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            $('.person-avatar').attr('src', data);
            $('.foto-container .foto').after('<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:204px; margin: 0 auto; margin-bottom:10px;">'+
                                                'Фото обновленно'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                                    '<span aria-hidden="true">&times;</span>'+
                                                '</button>'+
                                             '</div>');
        },
    });
});
$('body').on('click', '.personal-foto-remove', function () {

    const id = $(this).attr('data-user');

    if ( confirm ( 'ВНИМАНИЕ! Фото будет удалено!' ) ) {

        $.ajax({
            url: '/removefoto',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: {id:id},
            success: function (data) {
                $('.person-avatar').attr('src', data);
                $('.foto-container .foto').after('<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:204px; margin: 0 auto; margin-bottom:10px;">'+
                                                    'Фото удалено'+
                                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                                        '<span aria-hidden="true">&times;</span>'+
                                                    '</button>'+
                                                 '</div>');
            },
        });

    }

});

$('body').on('click', '.generate-password', function (e) {

    e.preventDefault();

    let newPassword = randomize('Aa0', 8);

    $('input[name="password"]').prop('type', 'text').val(newPassword);
    $('input[name="password_confirmation"]').prop('type', 'text').val(newPassword);

});

//-------------------
// -------- task ----
//-------------------
