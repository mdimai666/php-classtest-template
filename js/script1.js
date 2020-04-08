/// <reference path="jquery.min.js"/>

var search_indicator = '<div class="text-center" style="padding:20px;color: #cacaca;"><i class="fa fa-refresh fa-spin"></i></div>';
var search_indicator2 = '<div class="text-center m-5"><div class="spinner-border text-primary"></div></div>';

$(document).ready(function () {


    $('#btn0').click(function () {
        let url = "/someclass?action=Test";
        let info = $('#info');

        justShowResult(url, info);
        
    });

    $('#btn1').click(function () {
        let url = "/someclass?action=GetPostData";
        let info = $('#info');

        justShowResult(url, info);
        
    });

    $('#btn2').click(function () {
        let url = "/someclass?action=ConfigValue";
        let info = $('#info');

        justShowResult(url, info);
        
    });

    $('#btn3').click(function () {
        let url = "/someclass?action=Increment";
        let info = $('#info');

        justShowResult(url, info);
        
    });

    $('#btn4').click(function () {
        let url = "/someclass?action=Decrement";
        let info = $('#info');

        justShowResult(url, info);
        
    });

    function justShowResult(url,$el){
        $el.html(search_indicator2);
        $.get(url)
            .done(d => {
                console.log(d)
                try {
                    let j = beauityJSON(d)
                    $el.html(j);
                } catch (error) {
                    $el.html(d);
                }
            })
            .fail((xhr, status, err) => {
                console.warn(xhr);
                
                try {
                    if(xhr.responseJSON && xhr.responseJSON.xdebug_message){
                        $el.html(xhr.responseJSON.xdebug_message);
                    }
                    else 
                        $el.html(beauityJSON(xhr.responseText));
                } catch (error) {
                    $el.html(xhr.responseText)
                }
            })
    }

})