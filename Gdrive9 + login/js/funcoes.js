window.onload = function () {
    var div = document.getElementById('preload');
    preload(div, 50);
};

function preload(el, interval) {
    var op = 1;
    var timer = setInterval(function () {
        if (op <= 0.1) {
            clearInterval(timer);
            el.style.display = 'none';
            el.className = '';
        }
        el.style.opacity = op;
        op -= op * 0.1;
    }, interval);
};

var body = document.querySelector("body");
var validacao = document.querySelector("#validacao");
var validacao2 = document.querySelector("#validacao2");
var feedback2 = document.querySelector('#feedback2');
var first_column_primary = document.getElementById("first-column-primary");
var first_column_second = document.getElementById("first-column-second");
var first_column_second_feedback_positive = document.getElementById("first-column-second-feedback-positive");
var first_column_second_feedback_negative = document.getElementById("first-column-second-feedback-negative");
var first_column_second_feedback_negative_two = document.getElementById("first-column-second-feedback-negative-two");
var first_column_second_feedback_negative_three = document.getElementById("first-column-second-feedback-negative-three");
var verifyInt = ("^[A-Za-z0-9]*");

function logar(){
    body.className = "logar-js";
    $("#registrar-se").hide();
    setTimeout(function(){ $("#registrar-se").fadeIn(); }, 3000);
}

function criar() {
    body.className = "criar-js";
    $("#logar-se").hide();
    setTimeout(function(){ $("#logar-se").fadeIn(); }, 3000);
}

function valid() {
    if(validacao.value.length != 0 || validacao2.value.length != 0) {
        first_column_primary.style.display = "none";
        first_column_second.style.display = "block";
        first_column_second_feedback_positive.style.display = "none";
        first_column_second_feedback_negative.style.display = "none";
        first_column_second_feedback_negative_two.style.display = "none";
    }else {
        first_column_primary.style.display = "block";
        first_column_second.style.display = "none";
        first_column_second_feedback_positive.style.display = "none";
        first_column_second_feedback_negative.style.display = "none";
        first_column_second_feedback_negative_two.style.display = "none";
    }

    if (validacao.value.length < 8){
        validacao.className = "form-control is-invalid";

        first_column_second_feedback_negative.style.display = "block";
        return false;
    }
    else if($("#validacao").val().match(verifyInt) >= 1){
        validacao.className = "form-control is-invalid";

        first_column_second_feedback_negative_two.style.display = "block";
        return false;
    }
    else if(validacao.value != validacao2.value){
        validacao.className = "form-control is-valid";
        validacao2.className = "form-control is-invalid";

        first_column_second_feedback_negative_three.style.display = "block";
        return false;
    }
    else{
        validacao.className = "form-control is-valid";
        validacao2.className = "form-control is-valid";

        first_column_second_feedback_negative.style.display = "none";
        first_column_second_feedback_negative_two.style.display = "none";
        first_column_second_feedback_negative_three.style.display = "none";
        first_column_second_feedback_positive.style.display = "block";
        return true;
    }
}

function ocultar(){
    if (first_column_second.style.display == "none"){
        first_column_second.style.display == "block";
    }else {
        first_column_second.style.display == "none";
    }
}

function exibirSenha(){
    if(validacao.type == "password" || validacao2.type == "password"){
        validacao.type = "text";
        validacao2.type = "text";
    }else{
        validacao.type = "password";
        validacao2.type = "password";
    }
}