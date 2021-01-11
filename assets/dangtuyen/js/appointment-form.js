// JavaScript Document
$(document).ready(function() {

    "use strict";

    $(".appointment-form").submit(function(e) {
        e.preventDefault();
        var type = $(".type");
        var name = $(".name");
        var phone = $(".phone");
        /*var doctor = $(".doctor");
        var patient = $(".patient");
        var date = $(".date");
        var email = $(".email");
        var msg = $(".message");*/
        var flag = false;

        if (type.val() == "") {
            type.closest(".form-control").addClass("error");
            type.focus();
            flag = false;
            return false;
        } else {
            type.closest(".form-control").removeClass("error").addClass("success");
        }
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
        } else {
            phone.closest(".form-control").removeClass("error").addClass("success");
        }
        /*if (department.val() == "") {
            department.closest(".form-control").addClass("error");
            department.focus();
            flag = false;
            return false;
        } else {
            department.closest(".form-control").removeClass("error").addClass("success");
        } if (doctor.val() == "") {
            doctor.closest(".form-control").addClass("error");
            doctor.focus();
            flag = false;
            return false;
        } else {
            doctor.closest(".form-control").removeClass("error").addClass("success");
        } if (patient.val() == "") {
            patient.closest(".form-control").addClass("error");
            patient.focus();
            flag = false;
            return false;
        } else {
            patient.closest(".form-control").removeClass("error").addClass("success");
        } if (date.val() == "") {
            date.closest(".form-control").addClass("error");
            date.focus();
            flag = false;
            return false;
        } else {
            date.closest(".form-control").removeClass("error").addClass("success");
        } if (name.val() == "") {
            name.closest(".form-control").addClass("error");
            name.focus();
            flag = false;
            return false;
        } else {
            name.closest(".form-control").removeClass("error").addClass("success");
        }/* if (email.val() == "") {
            email.closest(".form-control").addClass("error");
            email.focus();
            flag = false;
            return false;
        } else {
            email.closest(".form-control").removeClass("error").addClass("success");
        }if (phone.val() == "") {
            phone.closest(".form-control").addClass("error");
            phone.focus();
            flag = false;
            return false;
        } else {
            phone.closest(".form-control").removeClass("error").addClass("success");
        } if (msg.val() == "") {
            msg.closest(".form-control").addClass("error");
            msg.focus();
            flag = false;
            return false;
        } else {
            msg.closest(".form-control").removeClass("error").addClass("success");
            flag = true;
        }*/
        //var dataString = "department=" + department.val() + "&doctor=" + doctor.val() + "&patient=" + patient.val() + "&date=" + date.val() + "&name=" + name.val() + "&email=" + email.val() + "&phone=" + phone.val() + "&msg=" + msg.val();
        var dataString = "name=" + name.val() + "&phone=" + phone.val() + "&type=" + type.val();
        $(".loading").fadeIn("slow").html("Loading...");
        $.ajax({
            type: "POST",
            data: dataString,
            url: "/vi/booking",
            cache: false,
            success: function (d) {
                $(".form-control").removeClass("success");
                    if(d == 'success') // Message Sent? Show the 'Thank You' message and hide the form
                        $('.loading').fadeIn('slow').html('<font color="#48af4b">Thông tin đã được ĐẶNG TUYỀN tiếp nhận, ĐẶNG TUYỀN sẽ liên hệ với quý khách trong thời gian sớm nhất.</font>').delay(3000).fadeOut('slow');
                         else
                        $('.loading').fadeIn('slow').html('<font color="#ff5607">Đã xảy ra lõi, vui lòng thử lại ít phút.</font>').delay(3000).fadeOut('slow');
                                }
        });
        return false;
    });
    $("#reset").on('click', function() {
        $(".form-control").removeClass("success").removeClass("error");
    });

})
