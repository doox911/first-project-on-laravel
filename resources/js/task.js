"use strict";

$('body').on('click', '.delete-task', function() {

    const taskId = parseInt ( $(this).attr('data-task').replace( /\D+/g, "" ) );

    if ( confirm ( 'ВНИМАНИЕ! Задача будет беззвозвратно удалена! Продолжить?' ) ) {

        $(this).parent().parent().fadeOut( 500, function() {

            $.ajax({
                url: `tasks/${taskId}`,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'DELETE',
                success: function() {

                }
            });

            setTimeout(location.reload(), 600);

        });

    }
});

// $('body').on('click', 'button[name="change"]', function() {
//
//     const taskId = parseInt ( $(this).attr('data-task').replace( /\D+/g, "" ) );
//
//     if ( confirm ( 'ВНИМАНИЕ! Задача будет изменена! Продолжить?' ) ) {
//
//         let title = $('input[name="title"]').val(),
//             body = $('textarea[name="body"]').text(),
//             responsible = $('select[name="responsible"]').val(),
//             status = $('select[name="statuses"]').val(),
//             priorities = $('select[name="priorities"]').val();
//
//         $.ajax({
//             url: `/tasks/${taskId}`,
//             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//             type: 'PUT',
//             data: {title:title, body:body, responsible:responsible, status:status, priorities:priorities},
//             success: function() {
//
//             }
//         });
//
//         //location.reload('/');
//
//     }
// });
