$(function() {
    $.each($('.active'), function(){
        $(this).bind('click', function(){
            var letter = $(this).text();
            $.ajax({
                url: location.href,
                type: "POST",
                data: {'letter': letter, 'ajax': 1},
                dataType: 'JSON',
                success: function(listObjects) {
                    if (listObjects) { //console.log(listObjects);
                        $('div.list > *').remove();
                        $('.used').toggleClass('active');
                        $(this).toggleClass('used');

                        $.each(listObjects, function(key, obj){ console.log(key, obj);
                           $('.list').append($('<div/>').addClass('book').html(obj.title));
                        });
                    }
                }
            });
        })
    });
});
