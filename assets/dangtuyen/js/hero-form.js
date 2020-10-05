// JavaScript Document
var base_url = 'http://localhost:8010/';
$(document).ready(function() {

    "use strict";

    $(".hero-form").submit(function(e) {
        e.preventDefault();        
        var name = $(".name");
        var phone = $(".phone");
        var flag = false;
        if (name.val() == "") {
            name.closest(".form-control").addClass("error");
            name.focus();
            flag = false;
            return false;
        } else {
            name.closest(".form-control").removeClass("error").addClass("success");
        } 
        if (phone.val() == "") {
            phone.closest(".form-control").addClass("error");
            phone.focus();
            flag = false;
            return false;
        } 
        var dataString = "name=" + name.val() +  "&phone=" + phone.val();
        $(".loading").fadeIn("slow").html("Loading...");
        $.ajax({
            type: "POST",
            data: dataString,
            url: base_url + "vi/bookingappointments/booking",
            cache: false,
            success: function (d) {
                $(".form-control").removeClass("success");
                console.log(d);
                    if(d == 'success') // Message Sent? Show the 'Thank You' message and hide the form
                        $('.loading').fadeIn('slow').html('<font color="#fff">Thông tin đã được Đặng Tuyền tiếp nhận.</font>').delay(5000).fadeOut('slow');
                         else
                        $('.loading').fadeIn('slow').html('<font color="#f00">Mail not sent.</font>').delay(3000).fadeOut('slow');
                                }
        });
        return false;
    });
    $("#reset").on('click', function() {
        $(".form-control").removeClass("success").removeClass("error");
    });
    
})



