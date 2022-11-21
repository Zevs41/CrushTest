$(function () {
    $('.slider_inner, .news_slider_inner').slick({
        nextArrow: '<button type = "button" class = "slick_btn slick_next"></button>',
        prevArrow: '<button type = "button" class = "slick_btn slick_prev"></button>',
        infinite: false
    });

    $('.header_btn_menu').on('click', function () {
        $('.menu ul').slideToggle();
    })
});

<---Прокрутка страницы до элемента "Записи"--->
function scrollToRecords() {
    const el = document.getElementById('records');
    el.scrollIntoView({ behavior: "smooth" });
}

<---Прокрутка страницы до элемента "Новости"--->
function scrollToNews() {
    const el = document.getElementById('news');
    el.scrollIntoView({ behavior: "smooth" });
}

<---Высчитывание индекса массы тела--->
function calculateBmi(){
    var bmi = 0.0;
    var weight = parseFloat(document.getElementById("weight").value);
    var height = parseFloat(document.getElementById("height").value);

    var bmi= (weight / Math.pow( (height/100), 2 )).toFixed(1);

    if(bmi < 16){
        alert("У вас значительный дефицит массы тела.");
    }

    else if( bmi >= 16 && bmi <= 18.4 ){
        alert("У вас дефицит массы тела.");
    }

    else if( bmi >= 18.5 && bmi <= 24.9 ){
        alert("У вас нормальная масса тела.");
    }

    else if( bmi >= 25 && bmi <= 29.9 ){
        alert("У вас есть лишний вес.");
    }

    else if( bmi >= 30 && bmi <= 34.9 ){
        alert("У вас ожирение первой степени.");
    }

    else if( bmi >= 35 && bmi <= 39,9 ){
        alert("У вас ожирение второй степени.");
    }

    else{
        alert("У вас ожирение третьей степени.");
    }
}   
