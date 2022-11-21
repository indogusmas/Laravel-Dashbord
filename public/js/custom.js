/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function sendRequest(method, url, data, callback, async = true)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type : method,
        url: url,
        data: data,
        async: async,
        error: function (error)
        {
            console.log(error);
        },
        success: callback
    });
}
